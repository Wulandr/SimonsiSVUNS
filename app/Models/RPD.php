<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPD extends Model
{
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'rpd';
    protected $guarded = [];
}
