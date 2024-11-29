<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentApprovedMail;
use App\Mail\StudentRejectedMail;


class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Academic Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->label('First Name')
                            ->required()
                            ->maxLength(50),

                        Forms\Components\TextInput::make('last_name')
                            ->label('Last Name')
                            ->required()
                            ->maxLength(50),

                        Forms\Components\TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->unique(ignorable: fn ($record) => $record),

                        Forms\Components\TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel()
                            ->required()
                            ->regex('/^(?:254|\+254|0)([7])([0-9]{8})$/')
                            ->validationAttribute('Kenyan phone number'),
                    ]),


                Forms\Components\Section::make('Academic Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('course_id')
                            ->relationship('course', 'name')
                            ->label('Preferred Course')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('education_level_id')
                            ->relationship('educationLevel', 'name')
                            ->label('Highest Education Level')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('mean_grade')
                            ->label('Mean Grade')
                            ->options([
                                'A' => 'A',
                                'A-' => 'A-',
                                'B+' => 'B+',
                                'B' => 'B',
                                'B-' => 'B-'
                            ])
                            ->required(),

                        Forms\Components\Select::make('course_level')
                            ->label('Course Level')
                            ->options([
                                'Certificate' => 'Certificate',
                                'Diploma' => 'Diploma',
                                'Degree' => 'Degree'
                            ])
                            ->required(),
                    ]),


                Forms\Components\Section::make('Additional Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('fee_sponsor')
                            ->label('Fee Sponsor')
                            ->options([
                                'Self' => 'Self',
                                'Parents' => 'Parents',
                                'Sponsor' => 'Sponsor'
                            ])
                            ->required(),

                        Forms\Components\Select::make('nationality')
                            ->label('Nationality')
                            ->options(['Kenyan' => 'Kenyan'])
                            ->required(),

                        Forms\Components\TextInput::make('next_of_kin_name')
                            ->label('Next of Kin Name')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('next_of_kin_number')
                            ->label('Next of Kin Phone')
                            ->tel()
                            ->regex('/^(?:254|\+254|0)([7])([0-9]{8})$/')
                            ->required(),

                        Forms\Components\Select::make('heard_about')
                            ->label('How did you hear about us?')
                            ->options([
                                'TV Advertisement' => 'TV Advertisement',
                                'Radio' => 'Radio',
                                'Social Media' => 'Social Media',
                                'Friend/Referral' => 'Friend/Referral'
                            ]),
                    ]),


                Forms\Components\Section::make('Application Status')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Application Status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected'
                            ])
                            ->default('pending')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, $record) {
                                if ($state === 'approved') {
                                    Mail::to($record->email)->send(new StudentApprovedMail($record));
                                } elseif ($state === 'rejected') {
                                    Mail::to($record->email)->send(new StudentRejectedMail($record));
                                }
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration_number')
                ->label('Reg. Number')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('first_name')
                ->label('First Name')
                ->searchable(),

            Tables\Columns\TextColumn::make('last_name')
                ->label('Last Name')
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable(),

            Tables\Columns\TextColumn::make('phone')
                ->label('Phone')
                ->searchable(),

            Tables\Columns\TextColumn::make('course.name')
                ->label('Course')
                ->searchable(),

            Tables\Columns\TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                    default => 'gray',
                }),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Applied On')
                ->date()
                ->sortable(),
        ])
        ->filters([
            SelectFilter::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected'
                ])
                ->label('Application Status'),

            SelectFilter::make('course')
                ->relationship('course', 'name')
                ->label('Course'),

            SelectFilter::make('education_level')
                ->relationship('educationLevel', 'name')
                ->label('Education Level'),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make()
                ->action(function ($record) {
                    // Optional: Add any additional logic before deletion
                    $record->delete();

                    Notification::make()
                        ->title('Student Deleted')
                        ->success()
                        ->send();
                }),
        ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $record->delete();
                        }
                        Notification::make()
                            ->title('Students Deleted')
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }

    // protected static function afterSave(Student $student): void
    // {
    //     // Send email based on the status
    //     if ($student->status === 'approved') {
    //         Mail::to($student->email)->send(new \App\Mail\StudentApprovedMail($student));
    //     } elseif ($student->status === 'rejected') {
    //         Mail::to($student->email)->send(new \App\Mail\StudentRejectedMail($student));
    //     }
    // }

}
