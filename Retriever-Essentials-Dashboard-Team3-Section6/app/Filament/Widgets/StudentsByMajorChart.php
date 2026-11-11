<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;

class StudentsByMajorChart extends ChartWidget
{
    protected static ?int $sort = 3;

    protected ?string $heading = 'Top Majors';

    protected ?string $description = 'The 10 most common majors';

    protected ?string $emptyStateDescription = 'No students have a major on file yet.';

    private const LIMIT = 10;

    protected function getType(): string
    {
        return 'bar';
    }

    public function isEmpty(): bool
    {
        return ! Student::whereNotNull('major')->where('major', '!=', '')->exists();
    }

    protected function getData(): array
    {
        $majors = Student::query()
            ->whereNotNull('major')
            ->where('major', '!=', '')
            ->selectRaw('major, COUNT(*) as total')
            ->groupBy('major')
            ->orderByDesc('total')
            ->orderBy('major')
            ->limit(self::LIMIT)
            ->get();

        return [
            'labels' => $majors->pluck('major')->all(),
            'datasets' => [[
                'label' => 'Students',
                'data' => $majors->pluck('total')->map(fn ($n) => (int) $n)->all(),
                'backgroundColor' => '#3b82f6',
            ]],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
            'plugins' => ['legend' => ['display' => false]],
            'scales' => ['x' => ['beginAtZero' => true, 'ticks' => ['precision' => 0]]],
        ];
    }
}
