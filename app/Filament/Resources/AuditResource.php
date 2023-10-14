<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuditResource\Pages;
use App\Filament\Resources\AuditResource\RelationManagers;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Rmsramos\Activitylog\Resources\ActivitylogResource;

class AuditResource extends ActivitylogResource
{

//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                //
//            ])->columns([
//                'sm' =>4,
//                'lg' =>null
//            ]);
//    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                static::getLogNameColumnCompoment(),
                static::getEventColumnCompoment(),
                static::getSubjectTypeColumnCompoment(),
                static::getCauserNameColumnCompoment(),
                static::getPropertiesColumnCompoment(),
                static::getCreatedAtColumnCompoment(),
            ])
            ->filters([
                static::getDateFilterComponent(),
                static::getEventFilterCompoment(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAudits::route('/'),
            'view' => Pages\ViewAudit::route('/{record}/view'),
        ];
    }
}
