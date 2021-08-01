<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Common\LoginRequest;

class SigninController extends Controller
{
    public function index(){
        if(session()->has('login'))
        {
            return back();
        }
        return view('common.signin.index');
    }
    //Dummy Verifcation
    public function verify(LoginRequest $req){

        $user = User::where('email',$req->email)->where('pass',$req->pass)->first();
        if($user)
        {
            if($user->type == 'admin'){
                $req->session()->put('id', $user->id);
                $req->session()->put('email', $user->email);
                $req->session()->put('type', $user->type);
                return redirect()->route('admin.index');
            }
            elseif ($user->type == 'sales') {
                $req->session()->put('id', $user->id);
                $req->session()->put('email', $user->email);
                $req->session()->put('type', $user->type);
                $req->session()->put('username', $user->username);
                return redirect()->route('sales.dashboard.index');
            }
            elseif ($user->type == 'product') {
                $req->session()->put('login','1');
                $username = $user->username;
                $req->session()->put('username',$username);
                return redirect()->route('productHome.index');
            }
            elseif ($user->type == 'hr') {
                //Redirect to HR Dashboard
                $req->session()->put('id', $user->id);
                $req->session()->put('email', $user->email);
                $req->session()->put('type', $user->type);
                $req->session()->put('username',$user->username);
                return redirect()->route('HRhome.index');
            }
            elseif ($user->type == 'finance') {
                $req->session()->put('id', $user->id);
                $req->session()->put('email', $user->email);
                $req->session()->put('type', $user->type);
                return redirect()->route('finance.dashboard.index');
            }
        }
        else
        {
            $req->session()->flash('msg', 'Invaild Username or Password');
            return redirect()->route('signin.index');
        }
    }
}