<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blood extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function patients()
    {
        return $this->HasToMany(Patient::class);
    }
}
