<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $fillable = ['name', 'description','difficulty','about'];


public function is_published(){

   return $this->is_publish;
}

public function hasPermission(){
    return $this->permission;

}

public function user(){
    return $this->belongsTo('App\User');
}

public function getCode(){
    return $this->hasMany('App\ProjectCodeFiles','project_code_id','id');

}

public function getSchemas(){
    return $this->hasMany('App\ProjectSchemas');

}

public function comments(){
    return $this->hasMany('App\Comment');

}





public function getCodeFileContents(){
    $arr=array();
    $arrr=array();
    $projectCodeFiles=$this->hasMany('App\ProjectCodeFiles','project_code_id','id')->get();

    for($i=0; $i<count($projectCodeFiles); $i++){
        $filepath = $projectCodeFiles[$i]->filename;
      
        foreach(file('storage/projects/code_files/'.$filepath) as $line) {
            $string = trim(preg_replace('/\s\s+/', ' ', $line));

            if(!empty($string)){
                array_push($arr,$string);
            }
          
         
         
          }
          array_push($arrr,$arr);
       

          $arr=array();
    }
        
       return $arrr;
    
  
}

}
