<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignOffProject extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];


    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }
    public function signoff_by()
    {
        return $this->belongsTo(User::class, 'project_signoff_by');
    }
}
