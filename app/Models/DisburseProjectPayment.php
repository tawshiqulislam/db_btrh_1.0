<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisburseProjectPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function project_initiation()
    {
        return $this->belongsTo(ProjectInitiation::class);
    }

    public function disburse_project_payment_send_by()
    {
        return $this->belongsTo(User::class, 'send_by');
    }
    public function disburse_project_payment_disbursed_by()
    {
        return $this->belongsTo(User::class, 'disbursed_by');
    }
    public function project_submission()
    {
        return $this->belongsTo(ProjectSubmission::class);
    }
}
