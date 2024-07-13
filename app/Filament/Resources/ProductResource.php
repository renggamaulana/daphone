<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required() // cannot empty
                ->maxLength(255), // max char 255

                Forms\Components\Textarea::make('description')
                                ->required(),

                Forms\Components\TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->integer()
                                ->minValue(1),

                Forms\Components\Select::make('condition')
                                ->options([
                                    'Fair' => 'Fair',
                                    'Good' => 'Good',
                                    'Very Good' => 'Very Good',
                                    'Like New' => 'Like New',
                                    'New' => 'New',
                                ])
                                ->required(),
                Forms\Components\Select::make('category')
                                ->options([
                                    'Smartphone' => 'Smartphone',
                                ])
                                ->required(),
                Forms\Components\TextInput::make('brand')
                                ->required(),
                Forms\Components\TextInput::make('model')
                                ->required(),
                Forms\Components\Select::make('color')
                                ->options([
                                    'Black' => 'Black',
                                    'Blue' => 'Blue',
                                    'Deep Purple' => 'Deep Purple',
                                    'Gold' => 'Gold',
                                    'Graphite' => 'Graphite',
                                    'Purple' => 'Purple',
                                    'Red' => 'Red',
                                    'Silver' => 'Silver',
                                    'Space Gray' => 'Space Gray',
                                    'White' => 'White',
                                ])
                                ->required(),
                Forms\Components\Select::make('storage')
                                ->options([
                                    '32 GB' => '32 GB',
                                    '64 GB' => '64 GB',
                                    '128 GB' => '128 GB',
                                    '256 GB' => '256 GB',
                                    '512 GB' => '512 GB',
                                    '1 TB' => '1 TB',
                                ])
                                ->required(),
                Forms\Components\Select::make('memory')
                                ->options([
                                    '2 GB' => '2 GB',
                                    '4 GB' => '4 GB',
                                    '8 GB' => '8 GB',
                                    '16 GB' => '16 GB',
                                    '12 GB' => '12 GB',
                                ])
                                ->required(),
                Forms\Components\Select::make('operating_system')
                                ->options([
                                    'android' => 'Android',
                                    'ios' => 'iOS',
                                ])
                                ->required(),
                Forms\Components\Select::make('signal_status')
                                ->options([
                                    'IMEI Verified' => 'IMEI Verified',
                                    'Signal On' => 'Signal On',
                                ])
                                ->required(),
                Forms\Components\FileUpload::make('image')
                                ->image()
                                ->directory('uploads/images/products')
                                ->required(),
                Forms\Components\DatePicker::make('release_date')
                                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('description')->searchable(),
                Tables\Columns\TextColumn::make('price')->searchable(),
                Tables\Columns\TextColumn::make('category')->searchable(),
                Tables\Columns\TextColumn::make('brand')->searchable(),
                Tables\Columns\TextColumn::make('model')->searchable(),
                Tables\Columns\TextColumn::make('storage')->searchable(),
                Tables\Columns\TextColumn::make('memory')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
