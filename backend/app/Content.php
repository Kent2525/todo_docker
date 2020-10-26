<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = ['id'];
    
    public static $rules = array(
        'heading' => 'required|max:300',
        'heading1' => 'required',
    );
}
