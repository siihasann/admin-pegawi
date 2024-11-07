<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeFilesResource\Pages;
use App\Models\Employee_files;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class EmployeeFilesResource extends Resource
{
    protected static ?string $model = Employee_files::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    
    protected static ?string $navigationLabel = 'Berkas Pegawai';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Select::make('employee_id')
                            ->relationship('employees', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Nama Pegawai'),
                        Forms\Components\Select::make('file_type')
                            ->required()
                            ->label('Jenis Dokumen')
                            ->options([
                                'photo' => 'Foto Pegawai',
                                'ktp' => 'KTP',
                                'npwp' => 'NPWP',
                                'other' => 'Dokumen Lainnya'
                            ]),
                        Forms\Components\FileUpload::make('file_path')
                            ->required()
                            ->label('File')
                            ->directory('employee_files')
                            ->preserveFilenames()
                            ->storeFileNamesIn('original_name')
                            ->acceptedFileTypes(['application/pdf', 'image/*', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->maxSize(5120) // 5MB
                            ->enableDownload()
                            ->enableOpen(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employees.name')
                    ->label('Nama Pegawai')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('file_type')
                    ->label('Jenis Dokumen')
                    ->colors([
                        'primary' => 'photo',
                        'success' => 'ktp',
                        'warning' => 'npwp',
                        'danger' => 'other',
                    ]),
                Tables\Columns\TextColumn::make('original_name')
                    ->label('Nama File')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mime_type')
                    ->label('Tipe File'),
                Tables\Columns\TextColumn::make('file_size')
                    ->label('Ukuran File')
                    ->formatStateUsing(fn ($state) => number_format($state / 1024, 2) . ' KB'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('employees')
                    ->relationship('employees', 'name')
                    ->label('Filter Pegawai'),
                Tables\Filters\SelectFilter::make('file_type')
                    ->options([
                        'photo' => 'Foto Pegawai',
                        'ktp' => 'KTP',
                        'npwp' => 'NPWP',
                        'other' => 'Dokumen Lainnya'
                    ])
                    ->label('Jenis Dokumen'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEmployeeFiles::route('/'),
            'create' => Pages\CreateEmployeeFiles::route('/create'),
            'edit' => Pages\EditEmployeeFiles::route('/{record}/edit'),
        ];
    }
}