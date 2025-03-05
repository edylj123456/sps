<?php

namespace App\Livewire\User;
use App\Models\appointment as Appointments;
use Flasher\Prime\FlasherInterface;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Appointment extends Component
{
    use WithFileUploads;

    public $owner_name;
    public $owner_phone;
    public $owner_address;
    public $date_schedule;
    public $dog_name;
    public $dog_breed;
    public $dog_age;
    public $dog_sex;
    public $dog_photo;

    protected $rules = [
        'owner_name' => 'required|string|max:255',
        'owner_phone' => 'required|string|max:20',
        'owner_address' => 'required|string|max:255',
        'date_schedule' => 'required|date',
        'dog_name' => 'required|string|max:255',
        'dog_breed' => 'nullable|string|max:255',
        'dog_age' => 'required|integer|min:0',
        'dog_sex' => 'required|in:male,female',
        'dog_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        $photoPath = $this->dog_photo ? $this->dog_photo->store('dog_photos', 'public') : null;

        Appointments::create([
            'user_id' => Auth::id(),
            'owner_name' => $this->owner_name,
            'owner_phone_number' => $this->owner_phone,
            'owner_address' => $this->owner_address,
            'date_schedule' => $this->date_schedule,
            'dog_name' => $this->dog_name,
            'dog_breed' => $this->dog_breed,
            'dog_age' => $this->dog_age,
            'dog_sex' => $this->dog_sex,
            'dog_photo' => $photoPath,
        ]);

        $this->reset();

    flash( 'Appointment created successfully!');
    }

    public function render()
    {
        return view('livewire.user.appointment');
    }


}
