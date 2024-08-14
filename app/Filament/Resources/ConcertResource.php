<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Concert;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\ConcertResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ConcertResource\RelationManagers;

class ConcertResource extends Resource
{
    protected static ?string $model = Concert::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create a new Concert')
                    ->schema([
                        TextInput::make('title')
                            ->minLength(2)
                            ->maxLength(255)
                            ->live()
                            ->debounce(100)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug'),
                        TextInput::make('place')->label('Place')->helperText(str('Ex. Ramada Resort and Spa')),
                        TextInput::make('program')->label('Prormam')->helperText(str('Separate values with comma. Ex. Vivaldi, Bach')),
                        TextInput::make('global_event')->label('Global Event')->helperText(str('Ex. Ελευθέρια')),
                        
                    ])->columnSpan(2)->columns(2),
                Group::make()->schema([
                    Section::make('Image')
                        ->schema([
                            FileUpload::make('image')->disk('public')->directory('concert_images'),
                        ])->columnSpan(1),
                    Section::make('Concert Info')->schema([
                        DateTimePicker::make('date')->label('Concert Date'),
                        Checkbox::make('have_ticket')->label('Have Ticket'),
                        TextInput::make('ticket_link')->hidden(fn (Get $get): bool => ! $get('have_ticket'))->label('Link to buy tickets')->helperText(str('ex. https://more.com - Full url with https')),


                    ]),

                ]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListConcerts::route('/'),
            'create' => Pages\CreateConcert::route('/create'),
            'edit' => Pages\EditConcert::route('/{record}/edit'),
        ];
    }
}
