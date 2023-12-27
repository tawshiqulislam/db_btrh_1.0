<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMemberLog extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function removed_by_user()
    {
        return $this->belongsTo(User::class, 'removed_by');
    }

    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }
}
