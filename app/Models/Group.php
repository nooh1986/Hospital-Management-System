<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use Translatable , HasFactory;

    public $translatedAttributes = ['name' , 'description'];

    protected $guarded = [];

    public function services()
    {
        return $this->belongsToMany(Service::class , 'group_service');
    }
}
