<?php

namespace App\Filament\Resources\Lectures\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Models\Subject;

class LectureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Main course information in two columns
                Grid::make(4)
                    ->schema([
                        Select::make('stream_id')
                            ->label('Stream')
                            ->relationship('stream', 'name')
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn($state, $set) => $set('subject_id', null)),
                        Select::make('semester')
                            ->label('Semester')
                            ->options(config('constants.SEMESTERS')),
                        Select::make('subject_id')
                            ->label('Subject')
                            ->options(
                                fn($get) => Subject::query()
                                    ->when(
                                        $get('stream_id'),
                                        fn($query, $streamId) => $query->where('stream_id', $streamId)
                                    )
                                    ->pluck('name', 'id')
                                    ->toArray()
                            )
                            ->columnSpan(2)
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),

                // Course details in four columns for compact layout
                Grid::make(4)
                    ->schema([

                        TextInput::make('unit')
                            ->label('Unit')
                            ->maxLength(255)
                            ->nullable(),
                        Select::make('delivery_mode')
                            ->label('Delivery Mode')
                            ->options(config('constants.LECTURE_DELIVERY_MODES'))
                            ->nullable(),
                        TextInput::make('class_no')
                            ->label('Class No.')
                            ->maxLength(255)
                            ->placeholder('e.g., 101'),
                        TextInput::make('no_of_students')
                            ->label('Students Count')
                            ->integer()
                            ->nullable()
                            ->minValue(0)
                            ->maxValue(999),
                    ]),

                // Schedule information in three columns
                Grid::make(2)
                    ->schema([
                        DateTimePicker::make('start_time')
                            ->label('Start Time')
                            ->required()
                            ->displayFormat('d/m/Y h:i A')
                            ->format('Y-m-d H:i')
                            ->seconds(false)
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $endTime = \Carbon\Carbon::parse($state)->addHour();
                                    $set('end_time', $endTime->format('Y-m-d H:i'));
                                }
                            }),
                        DateTimePicker::make('end_time')
                            ->label('End Time')
                            ->required()
                            ->displayFormat('d/m/Y h:i A')
                            ->format('Y-m-d H:i')
                            ->seconds(false),

                    ]),

                // Content takes full width
                RichEditor::make('topic')
                    ->label('Topic/Content')
                    ->maxLength(65535)
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'bulletList',
                        'orderedList',
                        'link',
                        'undo',
                        'redo',
                    ]),

                // References as a simple textarea
                Textarea::make('references')
                    ->label('References')
                    ->maxLength(255)
                    ->rows(2)
                    ->placeholder('Books, articles, or other reference materials...'),
            ])->columns(1);
    }
}
