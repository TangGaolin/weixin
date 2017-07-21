<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserShare extends Model
{
    //
    protected $table = 'user_share';

    public $timestamps = false;

    /**
     * 不允许被赋值的属性
     * @var array
     */
    protected $guarded = [];
}
