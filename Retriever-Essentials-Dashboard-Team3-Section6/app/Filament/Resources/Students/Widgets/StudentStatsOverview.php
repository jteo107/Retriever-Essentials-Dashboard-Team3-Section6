<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\StudentOrg;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Students', Student::count())
                ->description('Registered students')
                ->icon('heroicon-o-user-group'),

            Stat::make('Total Student Organizations', StudentOrg::count())
                ->description('Registered organizations')
                ->icon('heroicon-o-building-office-2'),
        ];
    }
}
