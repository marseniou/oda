<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Musician;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MusicianResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MusicianResource\RelationManagers;

class MusicianResource extends Resource
{
    protected static ?string $model = Musician::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create a Musician')
                    ->schema([
                        TextInput::make('name')
                            ->minLength(2)
                            ->maxLength(255)
                            ->live()
                            ->debounce(250)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->required()->unique(ignoreRecord:true),
                        TextInput::make('instrument')->required()->columnSpan(2),
                        RichEditor::make('bio')
                            ->required()
                            ->columnSpan(2)
                            ->columns(2),
                        RichEditor::make('excerpt')

                            ->columnSpan(2)
                            ->columns(2)
                    ])->columnSpan(2)->columns(2),
                Group::make()->schema([
                    Section::make('Image')
                        ->schema([
                            FileUpload::make('image')->disk('public')->directory('musician_images')->image()->optimize('webp')->imageEditor()->imageCropAspectRatio('1:1'),
                        ])->columnSpan(1),
                    Section::make('Meta')->schema([

                        Checkbox::make('active')->label('Is Active'),

                    ]),

                ]),

                Section::make('Meta')->schema([
                    TextInput::make('meta_keywords'),
                    Textarea::make('meta_description')
                ])->collapsed()->columnSpan(2)

            ])->columns(3);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('image')
                    ->width(50)
                    ->height(50)
                    ->circular(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('instrument')->searchable(),
                
                TextColumn::make('updated_at')->dateTime(),
                
                
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
            'index' => Pages\ListMusicians::route('/'),
            'create' => Pages\CreateMusician::route('/create'),
            'edit' => Pages\EditMusician::route('/{record}/edit'),
        ];
    }
}
