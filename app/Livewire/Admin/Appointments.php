<?php

namespace App\Livewire\Admin;
use App\Models\appointment as Appointment ;
use Livewire\Component;

class Appointments extends Component
{
    public $appointments;

    public function mount()
    {
        // Fetch appointments when the component is mounted
        $this->appointments = Appointment::all();
    }

    public function approve($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {

            $appointment->status = 'Approved';
            if ($appointment->save()) {
          flash( 'Appointment approved successfully!');
            } else {
            flash( 'Failed to approve appointment.');
            }

            $this->appointments = Appointment::all();
        }
    }

    public function decline($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {

            $appointment->status = 'Declined';
            if ($appointment->save()) {
              flash( 'Appointment declined successfully!');
            } else {
           flash( 'Failed to decline appointment.');
            }

            $this->appointments = Appointment::all();
        }
    }
    public function render()
    {
        return view('livewire.admin.appointments');
    }
}
