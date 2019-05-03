<?php


namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;


class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be resent if the user did not receive the original email message.
    |
    */

    public function verify($token){
       $user = User::where('token',$token)->firstOrFail();

        $user->update(['token'=>null]);

return redirect()
        ->route('dashboard')->with("status","Ο λογαριασμός σας ενεργοποιήθηκε");

    }

}
