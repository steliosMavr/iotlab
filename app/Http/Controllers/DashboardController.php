<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

use App\User;


class DashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
       
        return view('dashboard')->with('projects',$user->projects);
    }

    public function update_avatar(Request $request){
            //handle user upload avatar

           
            $this->validate($request, [
                'avatar' => 'mimes:jpeg,png|max:3096',
            ],
                $messages = [
                    'required' => 'Επιλέξτε φωτογραφία',
                    'avatar.mimes' => 'Λάθος τύπος αρχείου (jpeg, png)',
                    'max'=>'Επιλέξτε φωτογραφία < 3096 kb'
                ]
            );



        
            if($request->hasFile('avatar')){    
              
                
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300,300)->save( storage_path('app/public/users_avatars/' . $filename ));

                $user = auth()->user();
                $user->avatar = $filename;
                $user->save();


            }

            

            $user_id=auth()->user()->id;
            $user=User::find($user_id);
            return view('dashboard')->with('projects',$user->projects);


    }


}
