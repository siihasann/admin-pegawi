<?php

namespace App\Filament\Widgets;

use App\Models\Employees;
use App\Models\Jabatan;
use App\Models\Units;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {

        $totalPegawai = Employees::count();
        $totalJabatan = Jabatan::count();
        $totalUnitKerja = Units::count();

        return [
            Card::make('Daftar Pegawai', $totalPegawai)
                ->description('32k increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Daftar Jabatan', $totalJabatan),
            Card::make('Daftar Unit Kerja', $totalUnitKerja),
        ];
    }
}
