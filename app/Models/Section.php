<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Single_Invoice;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use Translatable , HasFactory;

    public $translatedAttributes = ['name' , 'description'];

    protected $guarded = [];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function single_invoices()
    {
        return $this->hasMany(Single_Invoice::class);
    }

    
}
