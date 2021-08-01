<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HR\ProfileEditRequest;
use App\Http\Requests\HR\ChangePassRequest;
use App\Http\Requests\HR\UploadRequest;

use App\Models\User;

class HRuserProfileController extends Controller
{
    public function details()
    {
        $user_name= session()->get('username');
        $user = User::where('username', $user_name)->first();
        return view('HR.User.profile.index')->with('userinfo', $user);
    }

    public function profileEdit()
    {
        $user_name= session()->get('username');
        $user = User::where('username', $user_name)->first();
        return view('HR.User.profile.profileEdit')->with('userinfo', $user);
    }
    public function profileUpdate(Request $req)
    {
        $user_name= session()->get('username');
        $user = User::where('username', $user_name)->first();
        $user->firstname = $req->firstname;
        $user->lastname = $req->lastname;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->save();
        $req->session()->flash('msg','Profile Updated successfully');
        return redirect()->route('HRuserProfile.details');
    }
    public function changePassword()
    {
        $user_name= session()->get('username');
        $user = User::where('username', $user_name)->first();
        return view('HR.User.profile.changePass')->with('userinfo', $user);
    }
    public function PasswordUpdate(ChangePassRequest $req)
    {
        $old_pass=$req->old_password;
        $user_name= session()->get('username');
        $user = User::where('username', $user_name)->first();
        $curr_pass=$user->pass;
        if($old_pass==$curr_pass)
        {
            $user->pass=$req->new_password;
            $user->save();
            $req->session()->flash('msg','Password Change successfully');
            return redirect()->route('HRuserProfile.details');
        }
        else
        {
            $req->session()->flash('msg','Wrong password!');
            return back();
        }
    }
    public function uploadImage()
    {
        $user_name= session()->get('username');
        $user = User::where('username', $user_name)->first();
        return view('HR.User.profile.upload')->with('userinfo', $user);;
    }
    public function VerifyUploadImage(UploadRequest $req)
    {
        $curr_pass = $req->current_password;
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        if($curr_pass == $user->pass)
        {
            $img = $req->file('profile_image');
            $user->profile_pic = $username.'.'.$img->getClientOriginalExtension();
            $user->save();
            $img->move('upload/Users', $username.'.'.$img->getClientOriginalExtension());
            $req->session()->flash('msg','Profile pictute Updated!');
            return redirect()->route('HRuserProfile.details');
        }
        else
        {
            $req->session()->flash('msg','Wrong Current Password!');
            return back();
        }

        
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('signin.index');
    }

}
