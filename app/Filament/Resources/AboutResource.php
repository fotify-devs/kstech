<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Abouts';
    
    protected static ?string $navigationGroup = 'Media';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('heading')
                ->label('Heading')
                ->maxLength(255),
            
            Forms\Components\TextInput::make('sub_heading')
                ->label('Sub Heading')
                ->maxLength(255),
            
            Forms\Components\Textarea::make('about_text')
                ->label('About Text')
                ->rows(4),
            
            Forms\Components\TextInput::make('button_text')
                ->label('Button Text')
                ->maxLength(255),
            
            Forms\Components\FileUpload::make('image')
                ->label('Image')
                ->directory('about-images')
                ->image()
                ->imageResizeMode('cover')
                ->imageCropAspectRatio('16:9')
                ->preserveFilenames()
                ->nullable(),
            
            Forms\Components\TextInput::make('video_id')
                ->label('YouTube Video ID')
                ->helperText('Enter the YouTube video ID (e.g., dQw4w9WgXcQ)')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('heading')
                ->searchable(),
        
            Tables\Columns\ImageColumn::make('image')
                ->label('Image'),
            
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}