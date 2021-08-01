<?php

namespace App\Http\Controllers;

use App\Models\sales\Mail;
use App\Models\sales\CustomerModel;
use App\Models\sales\MailModel;
use Illuminate\Http\Request;


class SalesMailController extends Controller
{   
    public function sendEmail()
    {
        return view('sales.mail.send');
    }

    public function allMail()
    {
        $mails = MailModel::all();
        // $customers = CustomerModel::all();
        return view('sales.mail.all')->with('mails', $mails);//->with('customers', $customers);
        //return view('sales.mail.all');
    }
    public function sentMail()
    {
        return view('sales.mail.sent');
    }
    public function receivedMail()
    {
        return view('sales.mail.received');
    }
    public function spamMail()
    {
        return view('sales.mail.spam');
    }
}
