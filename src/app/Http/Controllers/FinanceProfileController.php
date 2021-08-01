<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Finance\ProfileUpdateRequest;
use App\Models\Finance\User;

class FinanceProfileController extends Controller
{
    public function index(){
        $user_finance = User::where('id',session('id'))->first();
        return view('finance.profile.index')->with('user_finance',$user_finance);
    }

    public function update(ProfileUpdateRequest $req){
        $user_finance = User::find(session('id'));
        $img = $req->file('pp');
        $user_finance->profile_pic = uniqid().".".$img->getClientOriginalExtension();
        $img->move('upload/Users', $user_finance->profile_pic);
        $user_finance->save();
        return view('finance.profile.index')->with('user_finance',$user_finance);
    }
}
