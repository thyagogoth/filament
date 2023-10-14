<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //    protected function beforeSave() : void
    //    {
    //
    //        Notification::make()
    ////            ->about($this->record)
    //            ->title('User Updated')
    ////            ->message('The user was updated successfully!')
    //            ->sendToDatabase(auth()->user());
    //
    //    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User Updated')
            ->body('The user was updated successfully!');
        //            ->sendToDatabase(auth()->user());
    }
}
