<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $fillable = [
        'name',
        'department',
        'hod',
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
