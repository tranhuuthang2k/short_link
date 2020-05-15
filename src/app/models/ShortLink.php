<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    //
    protected $fillable = [
        'code', 'link','user_id'
    ]; 
    public function user(){
        return $this->belongsTo('App\User');
    }
}
