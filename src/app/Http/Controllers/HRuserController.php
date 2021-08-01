<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HR\HRuserCreateRequest;
use Illuminate\Support\Facades\File;
use App\Models\User;

class HRuserController extends Controller
{
    public function create(){
        return view('HR.User.userCreate');
    }
    public function index(Request $req){
        if($req->searchUser)
        {
            $searchUser=User::where('username',$req->searchUser)->get();
            return view('HR.User.userList')->with('userList',$searchUser);
        }
        else{
            $users=User::all();
            return view('HR.User.userList')->with('userList',$users);
        }
        
    }
    public function verify(HRuserCreateRequest $req)
    {
        $img = $req->file('profile_image');

        $user=new User;
        $user->firstname=$req->first_name;
        $user->lastname=$req->last_name;
        $user->username=$req->user_name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->address=$req->present_address;
        $user->gender=$req->gender;
        $user->position=$req->job_position;
        $user->type=$req->user_type;
        $user->pass=$req->password;
        $user->work_hour=$req->hour_worked;
        //$user->organization_id=$req->organization_id;
        $user->profile_pic = $req->user_name.'.'.$img->getClientOriginalExtension();
        $img->move('upload/Users', $req->user_name.'.'.$img->getClientOriginalExtension());

       
        $user->save();
        $req->session()->flash('msg','User create successfully');
        return redirect()->route('HRuser.index');
    }
    public function userEdit($id)
    {
        $user = User::find($id);
        return view('HR.User.userEdit')->with('user',$user);
    }
    public function userUpdate(Request $req,$id)
    {
       
        $user=User::find($id);
        $user->firstname=$req->first_name;
        $user->lastname=$req->last_name;
        $user->username=$req->user_name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->address=$req->present_address;
        $user->gender=$req->gender;
        $user->position=$req->job_position;
        $user->type=$req->user_type;
        $user->pass=$req->password;
        $user->work_hour=$req->hour_worked;
        //$user->organization_id=$req->organization_id;
        

       
        $user->save();
        $req->session()->flash('msg','User update successfully');
        return redirect()->route('HRuser.index');

    }
    public function userDelete($id)
    {
        $user=User::find($id);
        return view('HR.User.userDelete')->with('user',$user);
    }
    public function userDestroy(Request $req,$id)
    {
        $user=User::where('id', $id)->first();
        $imgpath = "upload/Users/".$user['profile_pic'];
        if(File::exists($imgpath)) 
        {
            File::delete($imgpath);
        }
        User::where('id', $id)->delete();
        $req->session()->flash('msg','Delete successfully');
        return redirect()->route('HRuser.index');
    }

}
