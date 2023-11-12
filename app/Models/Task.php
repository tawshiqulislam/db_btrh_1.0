<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];


    public function assigned_by_user()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }
}
