<?php

namespace App\Models;

use App\Models\ProjectCategory;
use App\Models\ProjectDocument;
use App\Models\Resource\ResourceManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInitiation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];


    public function project_category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
    public function project_documents()
    {
        return $this->hasMany(ProjectDocument::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function verified_by_user()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function unverified_by_user()
    {
        return $this->belongsTo(User::class, 'unverified_by');
    }

    public function activated_by_user()
    {
        return $this->belongsTo(User::class, 'activated_by');
    }

    public function inactivated_by_user()
    {
        return $this->belongsTo(User::class, 'inactivated_by');
    }


    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assigned_by_user()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
    public function project_initiation_overviews()
    {
        return $this->hasMany(ProjectInitiationOverview::class);
    }

    public function resource_managements()
    {
        return $this->hasMany(ResourceManagement::class);
    }
    public function time_duration()
    {
        return $this->hasOne(TimeDuration::class);
    }
    public function key_deliveres()
    {
        return $this->hasMany(KeyDeliverable::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
