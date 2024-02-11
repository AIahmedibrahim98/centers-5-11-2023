<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function instractor()
    {
        return $this->belongsTo(User::class,'instructor_id','id');
    }
}
