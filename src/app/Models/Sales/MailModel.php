<?php

namespace App\Models\sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailModel extends Model
{
    protected $table = 'customer_emails';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
