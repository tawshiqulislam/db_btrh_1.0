<?php

namespace App\Models\Resource;

use App\Models\ProjectInitiation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceManagement extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }
    public function assigned_by_user()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
