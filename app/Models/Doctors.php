<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    public function checkemail($email) {
        $checkemail = Doctors::where('email', $email)->first();
        if($checkemail) {
            return 'already exist';
        } else {
            return 'unique';
        }
    }
    public function checkauth($email, $password) {
        $checkauth = Doctors::where([['email', $email],['password', md5($password)]])->first();
        if($checkauth) {
            return $checkauth;
        } else {
            return 'failed';
        }
    }
}
