<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['name', 'url', 'client_id', 'is_active'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function pages()
    {
        return $this->hasMany('App\Pages');
    }
}
