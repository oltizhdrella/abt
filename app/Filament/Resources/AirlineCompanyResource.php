<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AirlineCompanyResource\Pages;
use App\Filament\Resources\AirlineCompanyResource\RelationManagers;
use App\Models\AirlineCompany;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AirlineCompanyResource extends Resource
{
    protected static ?string $model = AirlineCompany::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)->autocomplete('off'),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(255)->autocomplete('off'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('country'),
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
            'index' => Pages\ListAirlineCompanies::route('/'),
            'create' => Pages\CreateAirlineCompany::route('/create'),
            'edit' => Pages\EditAirlineCompany::route('/{record}/edit'),
            'planes' => Pages\ShowPlanes::route('/planes'),
        ];
    }    
}
