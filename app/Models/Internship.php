<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
     protected $fillable = [
        'internship_id', 'intern_id', 'primary_mentor_id', 'secondary_mentor_id',
        'internship_type', 'stipend_type', 'stipend_amount', 'payment_frequency',
        'bank_account_no', 'bank_ifsc', 'branch', 'department', 'start_date',
        'end_date', 'flexible_duration', 'status'
    ];

    public function intern() {
        return $this->belongsTo(Employee::class, 'intern_id');
    }
    public function primaryMentor() {
        return $this->belongsTo(Employee::class, 'primary_mentor_id');
    }
    public function secondaryMentor() {
        return $this->belongsTo(Employee::class, 'secondary_mentor_id');
    }
    public function tasks() {
        return $this->hasMany(InternTask::class);
    }
    public function documents() {
        return $this->belongsTo(InternDocument::class);
    }
    public function evaluations() {
        return $this->hasMany(InternEvaluation::class);
    }
      public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'id', 'branch');
    }
    public function department()
    {
        return $this->hasOne('App\Models\Department' , 'id' , 'department');
    }

}
