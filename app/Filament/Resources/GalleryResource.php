<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $navigationLabel = 'Gallery';
    
    protected static ?string $navigationGroup = 'Media';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('file_path')
                    ->label('Image')
                    ->image()
                    ->required()
                    ->directory('gallery')
                    ->visibility('public')
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        // Generate slug from filename if not set
                        $set('slug', Str::slug(pathinfo($state->getClientOriginalName(), PATHINFO_FILENAME)));
                    }),
                
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Auto-generated from filename, can be modified'),
                
                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured Image')
                    ->default(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\ImageColumn::make('file_path')
                ->label('Image')
                ->square(),
            
            Tables\Columns\TextColumn::make('slug')
                ->searchable(),
            
            Tables\Columns\IconColumn::make('is_featured')
                ->boolean()
                ->label('Featured')
        ])
        ->filters([
            Tables\Filters\Filter::make('is_featured')
                ->label('Featured Images')
                ->query(fn ($query) => $query->where('is_featured', true))
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageGalleries::route('/'),
            // 'index' => Pages\ListGalleries::route('/'),
            // 'create' => Pages\CreateGallery::route('/create'),
            // 'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
