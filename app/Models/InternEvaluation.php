<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternEvaluation extends Model
{  
    protected $fillable = [
        'internship_id', 'evaluator_id', 'task_id', 'score', 'feedback', 'status'
    ];

    public function internship() {
        return $this->belongsTo(Internship::class);
    }

    public function task() {
        return $this->belongsTo(InternTask::class, 'task_id');
    }

    public function evaluator() {
        return $this->belongsTo(User::class, 'evaluator_id');
    }
}
