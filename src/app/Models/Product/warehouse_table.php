<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouse_table extends Model
{
    protected $table = 'warehouse_table';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
