<?php

namespace App\Filament\Widgets;

use App\Models\Lecture;
use Guava\Calendar\Enums\CalendarViewType;
use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Support\Facades\Auth;

class MyCalendarWidget extends CalendarWidget
{
    protected CalendarViewType $calendarView = CalendarViewType::ResourceTimeGridWeek;
    
    protected string $view = 'filament.widgets.my-calendar-widget';

    protected array $options = [
        'headerToolbar' => [
            'start' => 'prev,next today',
            'center' => 'title',
            'end' => 'dayGridMonth,timeGridWeek,timeGridDay'
        ],
        'height' => 'auto',
        'nowIndicator' => true,
        'views' => [
            'dayGridMonth' => ['buttonText' => 'Month'],
            'timeGridWeek' => ['buttonText' => 'Week'],
            'timeGridDay' => ['buttonText' => 'Day'],
        ],
    ];

    protected function getEvents(FetchInfo $info): Collection|array|Builder
    {
        return Lecture::query()
            ->where('user_id', Auth::id())
            ->whereBetween('start_time', [$info->start, $info->end])
            ->with(['subject', 'stream'])
            ->get()
            ->map(function (Lecture $lecture) {
                return CalendarEvent::make()
                    ->title($this->formatLectureTitle($lecture))
                    ->start($lecture->start_time)
                    ->end($lecture->end_time)
                    ->backgroundColor($this->getLectureColor($lecture))
                    ->textColor('#ffffff')
                    ->url(route('filament.admin.resources.lectures.edit', $lecture));
            })
            ->toArray();
    }

    /**
     * Format the lecture title for display on calendar
     */
    private function formatLectureTitle(Lecture $lecture): string
    {
        $subject = $lecture->subject->name ?? 'Unknown Subject';
        $unit = $lecture->unit ? " - {$lecture->unit}" : '';
        $classNo = $lecture->class_no ? " ({$lecture->class_no})" : '';

        return $subject . $unit . $classNo;
    }

    /**
     * Get color for lecture based on delivery mode or stream
     */
    private function getLectureColor(Lecture $lecture): string
    {
        return match ($lecture->delivery_mode) {
            'Online' => '#3b82f6', // Blue
            'Offline' => '#10b981', // Green
            'Hybrid' => '#f59e0b', // Amber
            'Practical' => '#8b5cf6', // Purple
            'Theory' => '#06b6d4', // Cyan
            default => '#6b7280', // Gray
        };
    }

    /**
     * Get the calendar heading
     */
    public function getHeading(): ?string
    {
        return 'My Lectures Calendar';
    }

    /**
     * Determine if the calendar should be visible
     */
    public static function canView(): bool
    {
        return Auth::check();
    }
}
