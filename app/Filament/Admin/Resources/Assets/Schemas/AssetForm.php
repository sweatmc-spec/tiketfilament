<?php

namespace App\Filament\Admin\Resources\Assets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                TextInput::make('unit_id')
                    ->required()
                    ->numeric(),
                TextInput::make('vendor_id')
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('aktif'),
                DatePicker::make('purchase_date'),
                TextInput::make('purchase_price')
                    ->numeric(),
                DatePicker::make('warranty_expiry'),
            ]);
    }
}
