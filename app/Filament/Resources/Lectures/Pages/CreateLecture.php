<?php

namespace App\Filament\Resources\Lectures\Pages;

use App\Filament\Resources\Lectures\LectureResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateLecture extends CreateRecord
{
    protected static string $resource = LectureResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        return $data;
    }
}
