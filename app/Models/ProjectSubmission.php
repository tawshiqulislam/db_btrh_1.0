<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProjectInitiation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectSubmission extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];



    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'project_submitted_by');
    }
    public function project_approved_by_user()
    {
        return $this->belongsTo(User::class, 'project_approved_by');
    }
    public function disburse_project_payment()
    {
        return $this->hasOne(DisburseProjectPayment::class);
    }
}