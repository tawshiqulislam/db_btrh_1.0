<?php

namespace App\Models;

use App\Models\ProjectInitiation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];



    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }
}