<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Section;
use App\Models\Single_Invoice;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use Translatable , HasFactory;

    public $translatedAttributes = ['name' , 'appointments'];

    protected $guarded = [];

     public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class , 'id' , 'section_id');
    }

    public function single_invoices()
    {
        return $this->hasMany(Single_Invoice::class);
    }
    
}
