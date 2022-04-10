<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    public function filterlist($email) {
        $filters = Appointments::where('email', $email)->get();
        return $filters;
    }
    public function filterdoctorlist($name) {
        $filters = Appointments::where('doctor', $name)->get();
        return $filters;
    }
    public function patientdeletecurrent($email) {
        $filters = Appointments::where('email', $email)->delete();
        return $filters;
    }
}
