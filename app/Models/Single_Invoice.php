<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Single_Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $table = 'single_invoices';

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    
}
