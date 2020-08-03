<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'birthday', 'address', 'phone', 'possition', 'salary', 'role', 'image', 'user_id'
    ];
    public function user(){
        return $this->belongsTo('User');
      }
}
