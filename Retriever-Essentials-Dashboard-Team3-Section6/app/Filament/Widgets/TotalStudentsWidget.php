<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalStudentsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = -3;

    protected int|string|array $columnSpan = 1;

    protected int|array|null $columns = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Students', Student::count())
                ->description('Registered students')
                ->icon('heroicon-o-user-group'),
        ];
    }
}
