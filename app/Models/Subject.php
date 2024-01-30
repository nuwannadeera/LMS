<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    protected $table = 'subjects';
    protected $primaryKey = 'id';
    protected $fillable = ['subject', 'description'];

    public function result() {
        return $this->hasMany('App\Models\Result', 'subject_id', 'id');
    }

    use HasFactory;
}
