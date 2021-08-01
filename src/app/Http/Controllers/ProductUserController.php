<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\UserChangePasswordRequest;
use App\Http\Requests\Product\UserEditProfileRequest;
use App\Http\Requests\Product\UserProfilePicUpdateRequest;
use App\Http\Requests\Product\UserCodeRequest;
use App\Http\Requests\Product\LeaveRequest;
use App\Http\Requests\Product\ContactRequest;
use App\Models\Product\activities_table;
use App\Models\User;
use App\Models\Leave;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Mail;

class ProductUserController extends Controller
{
    // show activities
    public function activities(Request $req)
    {
        $allActivities = activities_table::all();
        return view('product.user.activities.index')->with('allActivities', $allActivities);
    }

    // leave request
    public function leave()
    {
        return view('product.user.leave.index');
    }
    public function verifyLeave(LeaveRequest $req)
    {
        $leave_type = $req->leave_type;
        $leave_start_date = $req->leave_start_date;
        $leave_end_date = $req->leave_end_date;
        $leave_description = $req->leave_description;

        $username = $req->session()->get('username');
        $user = User::where('username', $username)->first();
        $emp_id = $user->id;
        
        $leave = new Leave;

        $leave->employee_id = $emp_id;
        $leave->type = $leave_type;
        $leave->request_description = $leave_description;
        $leave->start_time = $leave_start_date;
        $leave->end_time = $leave_end_date;
        $leave->request_made = date("Y-m-d H:i:s");
        $leave->status = "Pending";

        $leave->save();
        $req->session()->flash('msg', 'Leave request sent to HR');
        return back();
    }

    public function myLeave()
    {
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        $emp_id = $user->id;
        $listLeave = Leave::where('employee_id', $user->id)->get();
        //print_r($listLeave);
        return view('product.user.leave.mylist')->with('myList',$listLeave);
    }

    // contact administration
    public function administration()
    {
        return view('product.user.administration.index');
    }
    public function verifyAdministration(ContactRequest $req)
    {
        $contact = new Contact();
        $contact->issue_name = $req->issue_name;
        $contact->description = $req->message;
        $contact->issued_by = $req->session()->get('username');
        $contact->issue_time = date('Y-m-d H:i:s');
        $contact->status = "Pending";
        $contact->save();
        $req->session()->flash('msg', "Issue sent to Administration Panel");
        return back();
    }

    public function myIssue()
    {
        $issues = Contact::where('issued_by', session()->get('username'))->get();
        return view('product.user.administration.list')->with('issueList', $issues);
    }

    // show profile
    public function profile()
    {
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        return view('product.user.profile.index')->with('userDetails', $user);
    }

    // edit profile
    public function editProfile()
    {
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        return view('product.user.profile.edit')->with('userDetails', $user);
    }
    public function editProfileVerify(UserEditProfileRequest $req)
    {
        $curr_pass = $req->current_password;
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        if($curr_pass == $user->pass)
        {
            $user->firstname = $req->firstname;
            $user->lastname = $req->lastname;
            $user->phone = $req->phone;
            $user->email = $req->email;
            $user->address = $req->address;
            $user->save();
            $req->session()->flash('msg','Profile Updated!');
            return redirect()->route('userProfile.index');
        }
        else
        {
            $req->session()->flash('msg','Wrong Current Password!');
            return back();
        }
    }

    // edit profile picture
    public function editProfilePicture()
    {
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        return view('product.user.profile.editProfilePicture')->with('userDetails', $user);
    }
    public function editProfilePictureVerify(UserProfilePicUpdateRequest $req)
    {
        $curr_pass = $req->current_password;
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        if($curr_pass == $user->pass)
        {
            $img = $req->file('profile_pic');
            $user->profile_pic = $username.'.'.$img->getClientOriginalExtension();
            $user->save();
            $img->move('upload/Users', $username.'.'.$img->getClientOriginalExtension());
            $req->session()->flash('msg','Profile Updated!');
            return redirect()->route('userProfile.index');
        }
        else
        {
            $req->session()->flash('msg','Wrong Current Password!');
            return back();
        }
    }

    // change password
    public function changePassword()
    {
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        return view('product.user.profile.changePassword')->with('userDetails', $user);
    }
    public function changePasswordVerify(UserChangePasswordRequest $req)
    {
        // reCAPTCHA validation
        $messages = [
            'g-recaptcha-response.required' => 'You must check the reCAPTCHA.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];
 
        $validator = Validator::make($req->all(), [
            'g-recaptcha-response' => 'required|captcha'
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()->route('userChangePassword.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $curr_pass = $req->current_password;
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        if($curr_pass == $user->pass)
        {
            // email verification
            $v_code = $this->gen_verify_code();
            $data = ['username'=>$username, 'code' => $v_code];
            $curr_user['to'] = $user->email;
            Mail::send('product.user.profile.mail',$data,function($messages) use ($curr_user){
                $messages->to($curr_user['to']);
                $messages->subject('Change Password - Industryal');
            });

            $req->session()->put('v_code', $v_code);
            $req->session()->put('pass', $req->new_password);
            return redirect()->route('userChangeProfileVerication.index');
        }
        else
        {
            $req->session()->flash('msg','Wrong Current Password!');
            return back();
        }
    }

    // verfication code
    public function verification()
    {
        $username = session()->get('username');
        $user = User::where('username', $username)->first();
        return view('product.user.profile.verificationCode')->with('userDetails', $user);
    }
    public function verificationVerify(UserCodeRequest $req)
    {
        $v_code_form = strval($req->verification_code);
        $v_code_send = strval(session()->get('v_code'));

        if($v_code_form == $v_code_send)
        {
            // change password
            $req->session()->forget('v_code');
            $username = session()->get('username');
            $user = User::where('username', $username)->first();
            $user->pass = session()->get('pass');
            $user->save();
            $req->session()->forget('pass');
            $req->session()->flash('msg','Profile Updated!');
            return redirect()->route('userProfile.index');
        }
        else
        {
            $req->session()->flash('msg','Wrong Verification Code!');
            return back();
        }
    }

    // logout
    public function logout()
    {
        session()->flush();
        return redirect()->route('signin.index');
    }

    public function gen_verify_code()
    {
        $verifucation_code = random_int(100000, 999999);
        return $verifucation_code;
    }

    public function searchActivity(Request $req)
    {
        $activity = activities_table::where('type','like','%'.$req->get('searchQuery').'%')->get();
        return json_encode($activity);
    }
}
