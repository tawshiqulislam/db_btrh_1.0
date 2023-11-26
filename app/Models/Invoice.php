<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }

    public function invoice_generated_by()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
