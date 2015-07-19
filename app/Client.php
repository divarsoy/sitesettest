<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'email', 'email_notification', 'sms_notification', 'is_active'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function sites()
    {
        return $this->hasMany('App\Sites');
    }

    public function pages()
    {
        return $this->hasMany('App\Pages');
    }
}
