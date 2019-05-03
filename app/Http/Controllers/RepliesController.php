<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;

class RepliesController extends Controller
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

            
            Reply::create([
                'comment_id' => $request->input('comment_id'),
                'name' => $request->input('name'),
                'reply' => $request->input('reply'),
                'user_id' => auth()->user()->id
            ]);

           
      return redirect()->route('project.show',$request->input('project_id'));

        }


    }




    
}
