<?php

namespace App\Filament\Resources\Students\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentStatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $totalStudents = Student::count();

        $percent = fn (int $count): string => $totalStudents > 0
            ? round($count / $totalStudents * 100).'%'
            : '0%';

        $students = fn (int $count): string => $count.' '.($count === 1 ? 'student' : 'students');

        $firstGen = Student::where('first_gen', true)->count();
        $international = Student::where('international', true)->count();
        $transfer = Student::where('transfer_status', true)->count();
        $inAnOrg = Student::has('studentOrgs')->count();

        return [
            Stat::make('Students in an Org', $percent($inAnOrg))
                ->description($students($inAnOrg).' in at least one org')
                ->icon('heroicon-o-link'),

            Stat::make('First-Generation Students', $percent($firstGen))
                ->description($students($firstGen))
                ->icon('heroicon-o-academic-cap'),

            Stat::make('International Students', $percent($international))
                ->description($students($international))
                ->icon('heroicon-o-globe-americas'),

            Stat::make('Transfer Students', $percent($transfer))
                ->description($students($transfer))
                ->icon('heroicon-o-arrows-right-left'),
        ];
    }
}
