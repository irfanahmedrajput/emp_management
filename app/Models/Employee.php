<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'employees';
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
