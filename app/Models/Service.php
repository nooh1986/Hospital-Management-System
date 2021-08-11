<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Single_Invoice;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory , Translatable ;

    public $translatedAttributes = ['name' , 'description'];

    protected $guarded = [];

    public function groups()
    {
        return $this->belongsToMany(Group::class , 'group_service');
    }

    public function single_invoices()
    {
        return $this->hasMany(Single_Invoice::class);
    }
}
