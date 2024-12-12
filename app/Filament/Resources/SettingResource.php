<?php


namespace App\Filament\Resources;


use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;


class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;


    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationGroup = 'General Settings';
    
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->schema([
                                Forms\Components\Section::make('Site Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('site_name')
                                            ->label('Site Name')
                                            ->required()
                                            ->columnSpan(2),
                                        
                                        Forms\Components\Textarea::make('site_description')
                                            ->label('Site Description')
                                            ->rows(3)
                                            ->columnSpan(2),
                                    ])->columns(2),


                                Forms\Components\Section::make('Contact Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('contact_email')
                                            ->label('Contact Email')
                                            ->email()
                                            ->columnSpan(1),
                                        
                                        Forms\Components\TextInput::make('contact_phone')
                                            ->label('Contact Phone')
                                            ->tel()
                                            ->columnSpan(1),
                                    ])->columns(2),
                            ]),


                        Forms\Components\Tabs\Tab::make('Branding')
                            ->schema([
                                Forms\Components\Section::make('Visual Assets')
                                    ->schema([
                                        Forms\Components\FileUpload::make('site_logo')
                                            ->label('Site Logo')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('settings')
                                            ->visibility('public')
                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp'])
                                            ->columnSpan(1),
                                        
                                        Forms\Components\FileUpload::make('favicon')
                                            ->label('Favicon')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('settings')
                                            ->visibility('public')
                                            ->acceptedFileTypes(['image/png', 'image/ico', 'image/x-icon'])
                                            ->helperText('Recommended size: 32x32 pixels')
                                            ->columnSpan(1),
                                    ])->columns(2),
                            ]),


                        Forms\Components\Tabs\Tab::make('Social')
                            ->schema([
                                Forms\Components\Section::make('Social Links')
                                    ->schema([
                                        Forms\Components\Repeater::make('social_links')
                                            ->schema([
                                                Forms\Components\Select::make('platform')
                                                    ->options([
                                                        'facebook' => 'Facebook',
                                                        'twitter' => 'Twitter',
                                                        'instagram' => 'Instagram',
                                                        'linkedin' => 'LinkedIn',
                                                    ])
                                                    ->required()
                                                    ->columnSpan(1),
                                                
                                                Forms\Components\TextInput::make('url')
                                                    ->label('Social Media URL')
                                                    ->url()
                                                    ->required()
                                                    ->columnSpan(1),
                                            ])
                                            ->columns(2)
                                            ->addActionLabel('Add Social Link')
                                    ])
                            ])
                    ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')
                    ->searchable()
                    ->sortable()
                    ->label('Site Name'),


                TextColumn::make('contact_email')
                    ->searchable()
                    ->label('Contact Email'),


                ImageColumn::make('site_logo')
                    ->label('Logo')
                    ->circular(),


                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created At')
            ])
            ->filters([
                // Add any relevant filters
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}