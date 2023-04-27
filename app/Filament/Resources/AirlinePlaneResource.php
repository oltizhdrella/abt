<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AirlinePlaneResource\Pages;
use App\Filament\Resources\AirlinePlaneResource\RelationManagers;
use App\Models\AirlineCompany;
use App\Models\AirlinePlane;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;

class AirlinePlaneResource extends Resource
{
    protected static ?string $model = AirlinePlane::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('airline_id')->label('Airline')->searchable()->getSearchResultsUsing(fn (string $search) => AirlineCompany::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id'))
                ->getOptionLabelUsing(fn ($value): ?string => AirlineCompany::where('id', $value)->first()?->name),
                Forms\Components\TextInput::make('airplane_type')
                    ->required()
                    ->maxLength(255)->autocomplete('off'),
                Forms\Components\TextInput::make('economy_seats')->autocomplete('off')->numeric()->integer(),
                Forms\Components\TextInput::make('business_seats')->autocomplete('off')->numeric()->integer(),
                Forms\Components\TextInput::make('first_class_seats')->autocomplete('off')->numeric()->integer(),
                Forms\Components\TextInput::make('all_seats_capacity')
                    ->required()->autocomplete('off'),
                Forms\Components\TextInput::make('airplane_weight_in_kg')
                    ->required()
                    ->maxLength(255)->autocomplete('off'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')->label('Airline'),
                Tables\Columns\TextColumn::make('airplane_type'),
                Tables\Columns\TextColumn::make('economy_seats'),
                Tables\Columns\TextColumn::make('business_seats'),
                Tables\Columns\TextColumn::make('first_class_seats'),
                Tables\Columns\TextColumn::make('all_seats_capacity'),
                Tables\Columns\TextColumn::make('airplane_weight_in_kg'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                ->mutateRecordDataUsing(function (array $data): array {
                    return $data;
                })->label('Sheet')->icon('heroicon-o-information-circle')->slideOver(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAirlinePlanes::route('/'),
            'create' => Pages\CreateAirlinePlane::route('/create'),
            'edit' => Pages\EditAirlinePlane::route('/{record}/edit'),
        ];
    }    
}
