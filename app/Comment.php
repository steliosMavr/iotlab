<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function replies(){
    	return $this->hasMany('App\Reply');
    }


    protected $fillable = array(
        'name',
        'comment',
        'project_id',
        'user_id'
    );

}
