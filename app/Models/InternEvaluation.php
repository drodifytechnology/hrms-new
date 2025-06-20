<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternEvaluation extends Model
{
    protected $fillable = ['internship_id', 'evaluator_id', 'score', 'feedback'];
    public function internship() {
        return $this->belongsTo(Internship::class);
    }
}
