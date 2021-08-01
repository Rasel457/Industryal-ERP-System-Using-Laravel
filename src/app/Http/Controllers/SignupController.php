<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Common\SignupRequest;
use App\Models\Finance\User;
use App\Models\Organization;

require_once 'Common/MailSender.php';

class SignupController extends Controller
{
    //Admin View
    public function index(){
        return view('common.signup.index');
    }
    public function verify(SignupRequest $req){
        $img = $req->file('pp');
        $user=new User;
        $user->firstname = $req->firstname;
        $user->lastname = $req->lastname;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->gender = $req->gender;
        $user->position = $req->position;
        $user->type = 'admin';
        $user->pass = $req->pass;
        $user->work_hour = '0';
        $user->profile_pic = uniqid().".".$img->getClientOriginalExtension();
        //Organization
        $organization = new Organization;
        $organization->name = $req->org_name;
        $organization->email = $req->email;
        $organization->phone = $req->phone;
        $organization->fax = $req->fax;
        $organization->established = $req->established;
        if(!$organization->save()){
            $req->session()->flash('msg', 'Registration Failed');
            return redirect()->route('signin.index');
        }
        //Get Organization ID
        $organization = Organization::where('email',$req->email)->first();
        if($organization){
            $user->organization_id = $organization->id;
            $img->move('upload/Users', $user->profile_pic);
            if($user->save()){
                $req->session()->flash('msg', 'Registration Successfull, Please Login.');
                return redirect()->route('signin.index');
            }
        }
        
        $req->session()->flash('msg', 'Registration Failed');
        return redirect()->route('signin.index');
    }
}
