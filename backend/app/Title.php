<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'title1' => 'required',
    );

    public function contents()
    {
        return $this->hasMany('App\Content');
    }
}
 