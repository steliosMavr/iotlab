<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
   
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request){

        if(!auth()->user()->verified()){
            return redirect() ->route('dashboard');

        }else{

            $this->validate($request, [
                'comment' => 'required',
            ],
                $messages = [
                    'required' => 'Γράψτε ένα σχόλιο',    
                ]
            );


            
        Comment::create([
            'name' =>  auth()->user()->name,
            'comment' => $request->input('comment'),
            'project_id' => $request->input('project_id'),
            'user_id' =>  auth()->user()->id
        ]);
      
        return redirect()->route('project.show',[$request->input('project_id') . '#comments']);

        }


    }


}
