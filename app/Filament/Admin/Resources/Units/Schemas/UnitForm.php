<?php

namespace App\Filament\Admin\Resources\Units\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\Select::make('unit_location_id')
                    ->relationship('unitLocation', 'location_name')
                    ->label('Location')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->label('New Location Name')
                            ->required(),
                    ])
                    ->required(),
            ]);
    }
}
