<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SPJSubKategoriController extends Controller
{
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'spj_subkategori';
    protected $guarded = [];
}
