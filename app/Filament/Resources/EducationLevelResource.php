<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationLevelResource\Pages;
use App\Filament\Resources\EducationLevelResource\RelationManagers;
use App\Models\EducationLevel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationLevelResource extends Resource
{
    protected static ?string $model = EducationLevel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Academic Management';
    protected static ?string $navigationLabel = 'Education Levels';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Education Level Details')
                ->columns(1)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Education Level')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignorable: fn ($record) => $record)
                        ->placeholder('e.g., High School, Diploma, Bachelors'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Education Level')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Created On')
                ->date()
                ->sortable(),

            Tables\Columns\TextColumn::make('students_count')
                ->label('Number of Students')
                ->counts('students')
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
            'index' => Pages\ListEducationLevels::route('/'),
            'create' => Pages\CreateEducationLevel::route('/create'),
            'edit' => Pages\EditEducationLevel::route('/{record}/edit'),
        ];
    }

       // Optional: Add any additional methods or customizations
       public static function getNavigationBadge(): ?string
       {
           return static::getModel()::count();
       }
}
