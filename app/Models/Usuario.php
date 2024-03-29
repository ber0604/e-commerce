<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'id',
         'name',
         'username',
         'cpf',
         'email',
         'phone',
         'password'
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }
    public function getAuthIdentifier()
    {
        return $this->id;
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getRememberToken()
    {
    }
    public function setRememberToken($token)
    {
    }
    public function getRememberTokenName()
    {
    }

}
