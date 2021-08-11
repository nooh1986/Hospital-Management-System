<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
