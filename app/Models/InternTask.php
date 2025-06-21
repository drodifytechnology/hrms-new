<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternTask extends Model
{
       protected $fillable = ['internship_id', 'title', 'description', 'priority' , 'attachment' , 'url' , 'status', 'deadline'];
    public function internship() {  
        return $this->belongsTo(Internship::class);
    }
}
