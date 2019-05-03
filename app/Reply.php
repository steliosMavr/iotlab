<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	public function user(){
        return $this->belongsTo('App\User');
    }
	
	
    protected $fillable = [
    	'comment_id',
    	'name',
    	'reply',
    	'user_id'
    ];
}
