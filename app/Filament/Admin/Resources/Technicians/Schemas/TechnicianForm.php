<?php

namespace App\Filament\Admin\Resources\Technicians\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class TechnicianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label('User'),

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->label('Category'),
            ]);
    }
}
