<?php

namespace App\Filament\Admin\Resources\Assets\Schemas;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                TextInput::make('name')
                    ->required()
                    ->label('Asset Name'),

                // AUTO-GENERATE CODE → tidak perlu input manual
                TextInput::make('code')
                    ->disabled()
                    ->default(null)
                    ->label('Auto Code'),

                // CATEGORY DROPDOWN (relationship)
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required()
                    ->label('Category'),

                // UNIT DROPDOWN (relationship)
                Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->searchable()
                    ->required()
                    ->label('Unit'),

                // VENDOR DROPDOWN (nullable)
                Select::make('vendor_id')
                    ->relationship('vendor', 'name')
                    ->searchable()
                    ->nullable()
                    ->label('Vendor'),

                TextInput::make('status')
                    ->default('aktif')
                    ->required(),

                DatePicker::make('purchase_date')
                    ->label('Purchase Date'),

                TextInput::make('purchase_price')
                    ->numeric()
                    ->label('Purchase Price'),

                DatePicker::make('warranty_expiry')
                    ->label('Warranty Expiry'),
            ]);
    }
}
