<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function show(Doctor $doctor)
    {
        abort_unless($doctor->is_active, 404);

        $doctor->load('publications');

        return view('front.doctors.show', compact('doctor'));
    }
}
