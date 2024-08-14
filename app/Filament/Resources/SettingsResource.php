<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use App\Models\Setting;
use App\Models\Settings;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SettingsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingsResource\RelationManagers;

class SettingsResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';


    public static function canCreate(): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('value')
                    ->formatStateUsing(fn($state) => $state === null ? 'Empty' : $state)
                    ->limit(80)
                    ->sortable()
                    ->searchable(),
                    
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form(function (Setting $record) {
                        return match ($record->type) {
                            'select' => [
                                Select::make('value')
                                    ->label($record->label)
                                    ->options($record->attributes['options'])
                            ],
                            'number' => [
                                TextInput::make('value')
                                    ->label($record->label)
                                    ->type('number')
                            ],
                            default => [
                                TextInput::make('value')
                                    ->label($record->label)
                            ]
                        };
                    }),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSettings::route('/'),
        ];
    }
}
