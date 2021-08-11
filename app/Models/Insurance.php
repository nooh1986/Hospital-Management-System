<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Insurance extends Model
{
    use HasFactory , Translatable;

    public $translatedAttributes = ['name' , 'notes'];

    protected $guarded = [];

}
