<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model {
    protected $table = 'results';
    protected $primaryKey = 'id';
    protected $fillable = ['marks', 'user_id', 'subject_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    use HasFactory;
}
