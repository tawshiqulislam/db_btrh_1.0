<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeyDeliverable extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
