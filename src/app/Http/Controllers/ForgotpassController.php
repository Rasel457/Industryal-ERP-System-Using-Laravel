<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Common\ForgotpassEmailRequest;
use App\Http\Requests\Common\ForgotpassConfirmRequest;
use App\Models\Finance\User;
require_once 'Common/MailSender.php';

class ForgotpassController extends Controller
{
    public function index(){
        return view('common.forgotpass.index');
    }

    public function verify(ForgotpassEmailRequest $req){
        $user = User::where('email',$req->email)->first();
        if($user){
            $otp = rand(100000,999999);
            $req->session()->put('otp', $otp);
            $req->session()->put('id', $user->id);
            sendOtpEmail($user->firstname." ".$user->lastname, $user->email, $otp);
            return redirect()->route('forgotpass.confirm');
        }
        return redirect()->route('signin.index');
    }

    public function confirm(){
        return view('common.forgotpass.confirm');
    }

    public function confirm_verify(ForgotpassConfirmRequest $req){
        $user = User::find($req->session()->get('id'));
        $user->pass = $req->pass;
        if($user->save()){
            $req->session()->flash('msg', 'Password Reset Successfull, Please Login.');
            $req->session()->forget(['id', 'otp']);
            return redirect()->route('signin.index');
        }
    }
}
