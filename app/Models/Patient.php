<?php

namespace App\Models;

use App\Models\Blood;
use App\Models\Payment;
use App\Models\Receipt;
use App\Models\Single_Invoice;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory , Translatable;

    public $translatedAttributes = ['name' , 'address'];

    protected $guarded = [];

    public function blood()
    {
        return $this->belongsTo(Blood::class);
    }

    public function getGenderAttribute($value)
    {
        return ($value === 1)? trans('backend/patiens.male') : trans('backend/patiens.female');
    }

    public function single_invoices()
    {
        return $this->hasMany(Single_Invoice::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
