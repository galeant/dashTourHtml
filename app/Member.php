<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\MemberResetPasswordNotification;

class Member extends Authenticatable
{
    use Notifiable;
    protected $table = 'member';
    protected $guard = 'member';
    
    protected $primaryKey = 'memberId';
    protected $fillable = [
        'email'
    ];

    protected $hidden = ['password','remember_token'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MemberResetPasswordNotification($token));
    }
}
