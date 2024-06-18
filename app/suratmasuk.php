<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suratmasuk extends Model
{
    protected $table = "suratmasuks";

    protected $fillable = [
        "nosurat",
        "tgl",
        "kirim",
        "brkas"
    ];
}
