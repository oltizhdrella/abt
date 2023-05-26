<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FlightResource\Pages;
use App\Filament\Resources\FlightResource\RelationManagers;
use App\Models\AirlinePlane;
use App\Models\City;
use App\Models\Flight;
use App\Models\FlightType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class FlightResource extends Resource
{
    protected static ?string $model = Flight::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('airplane_id')->label('Airplane')->searchable()->getSearchResultsUsing(fn (string $search) => AirlinePlane::where('airplane_type', 'like', "%{$search}%")->limit(50)->pluck('airplane_type', 'id'))
                ->getOptionLabelUsing(fn ($value): ?string => AirlinePlane::where('id', $value)->first()?->airplane_type)->required(),
                Select::make('from_city_id')->label('From')->searchable()->getSearchResultsUsing(fn (string $search) => City::where('city_country', 'like', "%{$search}%")->limit(50)->pluck('city_country', 'id'))
                ->getOptionLabelUsing(fn ($value): ?string => AirlinePlane::where('id', $value)->first()?->city_country)->required(),
                Select::make('to_city_id')->label('To')->searchable()->getSearchResultsUsing(fn (string $search) => City::where('city_country', 'like', "%{$search}%")->limit(50)->pluck('city_country', 'id'))
                ->getOptionLabelUsing(fn ($value): ?string => AirlinePlane::where('id', $value)->first()?->city_country)->required(),
                Select::make('flight_type_id')->label('Type')->options(FlightType::all()->pluck('type', 'id'))->required(),
                DatePicker::make('departure_date')->label('Departure')
                ->minDate(now())
                ->format('Y-m-d')->required(),
                DatePicker::make('return_date')->label('Return')
                ->minDate(now())
                ->format('Y-m-d'),
                Forms\Components\TextInput::make('economy_seat_price')
                    ->required()->integer()
                    ->maxLength(255)->autocomplete('off'),
                    Forms\Components\TextInput::make('business_seat_price')
                    ->required()->integer()
                    ->maxLength(255)->autocomplete('off'),
                    Forms\Components\TextInput::make('first_seat_price')
                    ->required()->integer()
                    ->maxLength(255)->autocomplete('off'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fromCity.city_country')->label('From'),
                Tables\Columns\TextColumn::make('toCity.city_country')->label('To'),
                Tables\Columns\TextColumn::make('flightType.type')->label('Flight Type'),
                Tables\Columns\TextColumn::make('departure_date')->label('Departure'),
                Tables\Columns\TextColumn::make('return_date')->label('Return'),
                Tables\Columns\TextColumn::make('economy_seat_price')->label('Economy Price'),
                Tables\Columns\TextColumn::make('business_seat_price')->label('Businnes Price'),
                Tables\Columns\TextColumn::make('first_seat_price')->label('First class Price'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFlights::route('/'),
            'create' => Pages\CreateFlight::route('/create'),
            'edit' => Pages\EditFlight::route('/{record}/edit'),
        ];
    }    
}
