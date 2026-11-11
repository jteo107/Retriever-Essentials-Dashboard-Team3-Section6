<?php

namespace App\Filament\Widgets;

use App\Models\StudentOrg;
use Filament\Widgets\ChartWidget;

class StudentOrgMembersChart extends ChartWidget
{
    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    protected ?string $heading = 'Members per Student Org';

    protected ?string $emptyStateDescription = 'No student orgs have been created yet.';

    protected function getType(): string
    {
        return 'bar';
    }

    public function isEmpty(): bool
    {
        return StudentOrg::count() === 0;
    }

    protected function getData(): array
    {
        $orgs = StudentOrg::withCount('students')->orderBy('name')->get();

        return [
            'labels' => $orgs->pluck('name')->all(),
            'datasets' => [[
                'label' => 'Members',
                'data' => $orgs->pluck('students_count')->all(),
                'backgroundColor' => '#f59e0b',
            ]],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => ['legend' => ['display' => false]],
            'scales' => ['y' => ['beginAtZero' => true, 'ticks' => ['precision' => 0]]],
        ];
    }
}
