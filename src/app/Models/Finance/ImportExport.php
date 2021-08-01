<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportExport extends Model
{
    protected $table = 'finance_import_history';
    public $timestamps = false;
}
