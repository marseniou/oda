<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Set;
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
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create a new Post')
                    ->schema([
                        TextInput::make('title')
                            ->minLength(2)
                            ->maxLength(255)
                            ->live()
                            ->debounce(250)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug'),
                        RichEditor::make('description')
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
                            FileUpload::make('featured_image')->disk('public')->directory('featured_images'),
                        ])->columnSpan(1),
                    Section::make('Meta')->schema([
                        DateTimePicker::make('published_at')->label('Publish At'),
                        Checkbox::make('active')->label('Published'),

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
                TextColumn::make('title'),
                TextColumn::make('updated_at')->dateTime(),
                ImageColumn::make('featured_image')->label('image')
                    ->width(50)
                    ->height(50)
                    ->circular(),
                ToggleColumn::make('active')
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
