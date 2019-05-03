<?php

namespace App\Http\Controllers;
use App\Project;

use Illuminate\Http\Request;

class PagesController extends Controller
{
     
    public function index(){
        $project = Project::all();
        return view('index')->with('projects', $project);

    }

   public function show($lessonName){
   
    if (view()->exists('lessons/'.$lessonName)) {
        return view('lessons/'.$lessonName);
    }else{
        abort(404);

    }

   

   }




}
