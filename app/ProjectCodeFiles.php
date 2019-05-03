<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCodeFiles extends Model
{
    protected $fillable = ['project_code_id', 'filename','originalFileNames'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

}
