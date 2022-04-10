<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;
    public function checkauth($username, $password) {
        $checkauth = Admins::where([['username', $username],['password', md5($password)]])->first();
        if($checkauth) {
            return $checkauth;
        } else {
            return 'failed';
        }
    }
}
