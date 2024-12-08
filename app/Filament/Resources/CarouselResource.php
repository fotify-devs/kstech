<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselResource\Pages;
use App\Models\Carousel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class CarouselResource extends Resource
{
    protected static ?string $model = Carousel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Carousels';
    
    protected static ?string $navigationGroup = 'Media';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Carousel Details')
            ->schema([
                Forms\Components\Section::make('Carousel Details')
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Carousel Image')
                            ->directory('carousels')
                            ->image()
                            ->required()
                            ->preserveFilenames()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->maxSize(5120), // 5MB


                        Forms\Components\TextInput::make('heading')
                            ->label('Heading')
                            ->required()
                            ->maxLength(100),


                        Forms\Components\Textarea::make('subheading')
                            ->label('Subheading')
                            ->rows(3)
                            ->maxLength(250),


                        Forms\Components\TextInput::make('button_text')
                            ->label('Button Text')
                            ->maxLength(50),


                        Forms\Components\TextInput::make('button_link')
                            ->label('Button Link')
                            ->url()
                            ->suffixIcon('heroicon-m-link'),


                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),


                        Forms\Components\TextInput::make('order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                    ])
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\ImageColumn::make('image_path')
                ->label('Image'),
            
            Tables\Columns\TextColumn::make('heading')
                ->searchable(),
            
            Tables\Columns\TextColumn::make('order')
                ->sortable(),
            
            Tables\Columns\ToggleColumn::make('is_active')
                ->label('Active')
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
            'index' => Pages\ListCarousels::route('/'),
            'create' => Pages\CreateCarousel::route('/create'),
            'edit' => Pages\EditCarousel::route('/{record}/edit'),
        ];
    }
}
