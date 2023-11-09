<?php

namespace App\Models\Resource;

use App\Models\ProjectInitiation;
use App\Models\User;
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

    public function resource_managements()
    {
        return $this->hasMany(ResourceManagement::class);
    }
    public function added_by_user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
