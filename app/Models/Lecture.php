<?php

namespace App\Models;

use Guava\Calendar\Contracts\Eventable;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model implements Eventable
{
    protected $fillable = [
        'user_id',
        'stream_id',
        'subject_id',
        'semester',
        'title',
        'unit',
        'topic',
        'references',
        'delivery_mode',
        'class_no',
        'start_time',
        'end_time',
        'no_of_students',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function toCalendarEvent(): CalendarEvent
    {
        return CalendarEvent::make()
            ->title($this->title)
            ->start($this->start_time)
            ->end($this->end_time)
            ->allDay(false);
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
