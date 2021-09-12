<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'hobby' => 'required',
        'gender' => 'required',
        'introduction' => 'required',
    ];
}
