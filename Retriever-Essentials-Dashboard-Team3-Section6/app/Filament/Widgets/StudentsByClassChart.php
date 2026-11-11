<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;

class StudentsByClassChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $heading = 'Students by Class';

    protected ?string $emptyStateDescription = 'No students have been added yet.';

    private const CLASSES = [
        'freshman' => 'Freshman',
        'sophomore' => 'Sophomore',
        'junior' => 'Junior',
        'senior' => 'Senior',
    ];

    protected function getType(): string
    {
        return 'doughnut';
    }

    public function isEmpty(): bool
    {
        return Student::count() === 0;
    }

    protected function getData(): array
    {
        $counts = Student::query()
            ->selectRaw('student_class, COUNT(*) as total')
            ->groupBy('student_class')
            ->pluck('total', 'student_class');

        $labels = [];
        $data = [];

        foreach (self::CLASSES as $value => $label) {
            $labels[] = $label;
            $data[] = (int) ($counts[$value] ?? 0);
        }

        $unset = $counts->except(array_keys(self::CLASSES))->sum();

        if ($unset > 0) {
            $labels[] = 'Not set';
            $data[] = (int) $unset;
        }

        return [
            'labels' => $labels,
            'datasets' => [[
                'label' => 'Students',
                'data' => $data,
                'backgroundColor' => ['#f59e0b', '#3b82f6', '#10b981', '#8b5cf6', '#9ca3af'],
            ]],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => ['display' => false],
                'y' => ['display' => false],
            ],
        ];
    }
}
