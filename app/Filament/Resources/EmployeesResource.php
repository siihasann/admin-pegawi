<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeesResource\Pages;
use App\Filament\Resources\EmployeesResource\RelationManagers;
use App\Models\Employees;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeesResource extends Resource
{
    protected static ?string $model = Employees::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Pegawai';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Pribadi')
                    ->schema([
                        Forms\Components\TextInput::make('nip')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(20),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('birth_place')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('birth_date'),
                        Forms\Components\Radio::make('gender')
                            ->required()
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ]),
                        Forms\Components\Textarea::make('address')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('religion')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('npwp')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Kepegawaian')
                    ->schema([
                        Forms\Components\Select::make('jabatan_id')
                            ->relationship('jabatan', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('eselon_id')
                            ->relationship('eselon', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('unit_id')
                            ->relationship('units', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('rank_id')
                            ->relationship('ranks', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('work_location_id')
                            ->relationship('work_locations', 'name')
                            ->searchable()
                            ->preload(),
                    ])->columns(2),

                    Forms\Components\Repeater::make('Dokumen')
                    ->relationship('files')
                    ->schema([
                        Forms\Components\TextInput::make('original_name')
                            ->label('Nama File')
                            ->disabled(),
                        Forms\Components\FileUpload::make('file_path')
                            ->directory('employee_files')
                            ->preserveFilenames()
                            ->label('Upload File Baru'),
                        Forms\Components\Select::make('file_type')
                            ->label('Jenis Dokumen')
                            ->options([
                                'photo' => 'Foto Pegawai',
                                'ktp' => 'KTP',
                                'npwp' => 'NPWP',
                                'other' => 'Dokumen Lainnya'
                            ]),
                    

                    ]),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('eselon.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('units.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ranks.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_locations.name')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('eselon')
                    ->relationship('eselon', 'name'),
                Tables\Filters\SelectFilter::make('unit')
                    ->relationship('units', 'name'),
                Tables\Filters\SelectFilter::make('golongan')
                    ->relationship('ranks', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->headerActions([
                Action::make('print_preview')
                    ->label('Preview')
                    ->icon('heroicon-o-printer')
                    ->url(fn () => route('employees.print-preview'))
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployees::route('/create'),
            'edit' => Pages\EditEmployees::route('/{record}/edit'),
        ];
    }    
}
