<?php

namespace App\Filament\Resources\EmployeesResource\Pages;

use App\Filament\Resources\EmployeesResource;
use App\Models\Employees;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('print')
                ->label('Print Daftar Pegawai')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function () {
                    $employees = Employees::with(['jabatan', 'units', 'eselon', 'work_locations', 'ranks'])
                        ->get();

                    // Generate PDF dengan konfigurasi landscape
                    $pdf = Pdf::loadView('pdf.employees-pdf', [
                        'employees' => $employees,
                        'date' => now()->format('d/m/Y'),
                    ]);

                    // Set paper orientation ke landscape dan ukuran A4
                    $pdf->setPaper('A4', 'landscape');
                    
                    // Set beberapa opsi tambahan untuk memperbaiki rendering
                    $pdf->setOptions([
                        'dpi' => 150,
                        'defaultFont' => 'sans-serif',
                        'isHtml5ParserEnabled' => true,
                        'isRemoteEnabled' => true,
                    ]);

                    // Display PDF in browser
                    return response()->stream(
                        function () use ($pdf) {
                            echo $pdf->output();
                        },
                        200,
                        [
                            'Content-Type' => 'application/pdf',
                            'Content-Disposition' => 'inline; filename="daftar-pegawai-' . now()->format('Y-m-d') . '.pdf"',
                        ]
                    );
                }),
        ];
    }
}