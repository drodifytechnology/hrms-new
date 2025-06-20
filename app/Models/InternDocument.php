<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternDocument extends Model
{
     protected $fillable = ['internship_id', 'type', 'file_path'];
    public function internship() {
        return $this->belongsTo(Internship::class);
    }   
}
