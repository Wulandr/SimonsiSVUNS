<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSPJ extends Model
{
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'dokumen';
    protected $guarded = [];
}
