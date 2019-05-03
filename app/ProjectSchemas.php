<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSchemas extends Model
{
    protected $fillable = ['project_id', 'filename','originalFileNames'];

}
