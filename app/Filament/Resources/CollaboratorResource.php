<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollaboratorResource\Pages;
use App\Filament\Resources\CollaboratorResource\RelationManagers;
use App\Models\Collaborator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CollaboratorResource extends Resource
{
    protected static ?string $model = Collaborator::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Collaborators';
    
    protected static ?string $navigationGroup = 'Media';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('Collaborator Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Collaborator Name')
                        ->required()
                        ->maxLength(255),
                    
                    Forms\Components\FileUpload::make('logo')
                        ->label('Logo')
                        ->image()
                        ->directory('collaborators')
                        ->visibility('public')
                        ->required(),
                    
                    Forms\Components\TextInput::make('website_url')
                        ->label('Website URL')
                        ->url()
                        ->nullable(),
                    
                    Forms\Components\Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),
                    
                    Forms\Components\TextInput::make('sort_order')
                        ->label('Sort Order')
                        ->numeric()
                        ->minValue(0)
                        ->nullable()
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\ImageColumn::make('logo')
                ->circular(),
            
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            
            Tables\Columns\TextColumn::make('website_url')
                ->label('Website')
                ->toggleable(isToggledHiddenByDefault: true),
            
            Tables\Columns\ToggleColumn::make('is_active'),
            
            Tables\Columns\TextColumn::make('sort_order')
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\TernaryFilter::make('is_active'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ])
        ->defaultSort('sort_order', 'asc');
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
            'index' => Pages\ListCollaborators::route('/'),
            'create' => Pages\CreateCollaborator::route('/create'),
            'edit' => Pages\EditCollaborator::route('/{record}/edit'),
        ];
    }
}
