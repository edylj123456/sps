<?php

namespace App\Livewire\User;

use App\Models\Appointment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Status extends Component
{
    public $appointmentStatus, $dogname;

    public function mount()
    {

        $appointment = Appointment::where('user_id', Auth::id())->latest()->first();


        if ($appointment) {
            $this->appointmentStatus = $appointment->status;
            $this->dogname = $appointment->dog_name;
        } else {
            $this->appointmentStatus = 'No appointment found';
        }
    }

    public function render()
    {
        return view('livewire.user.status', [
            'status' => $this->appointmentStatus
        ]);
    }
}