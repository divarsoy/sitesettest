<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'content', 'client_id', 'site_id', 'is_active'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function site()
    {
        return $this->belongsTo('App\Site');
    }
}
