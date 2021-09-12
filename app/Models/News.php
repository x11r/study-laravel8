<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;

    // このクラスでは論理削除を利用する
    use SoftDeletes;

    protected $guarded = ['id'];

    public static $rules = [
        'title' => 'required',
        'body' => 'required',
    ];

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
