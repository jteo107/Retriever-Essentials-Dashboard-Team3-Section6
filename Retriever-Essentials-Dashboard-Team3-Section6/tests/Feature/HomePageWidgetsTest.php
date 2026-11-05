<?php

namespace Tests\Feature;

use App\Filament\Widgets\StudentsByClassChart;
use App\Filament\Widgets\StudentsByMajorChart;
use App\Filament\Resources\Students\Widgets\StudentStatsOverview;
use App\Filament\Widgets\TotalStudentsWidget;
use App\Models\Student;
use App\Models\StudentOrg;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HomePageWidgetsTest extends TestCase
{
    use RefreshDatabase;

    private int $seq = 0;

    private function student(array $attrs = []): Student
    {
        $n = ++$this->seq;

        return Student::create($attrs + [
            'name' => "Student $n",
            'email' => "s$n@example.test",
            'studentID' => "ID$n",
            'first_gen' => false,
            'international' => false,
            'student_class' => 'freshman',
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    }

    public function test_stats_overview_shows_counts(): void
    {
        $org = StudentOrg::create(['name' => 'Chess', 'email' => 'c@example.test', 'OrgID' => 'O1', 'attendance' => 12]);
        $a = $this->student(['first_gen' => true, 'age' => 20]);
        $this->student(['international' => true, 'age' => 22]);
        $a->studentOrgs()->attach($org);

        Livewire::test(TotalStudentsWidget::class)
            ->assertSee('Total Students')
            ->assertSee('2');

        Livewire::test(StudentStatsOverview::class)
            ->assertDontSee('Total Students')
            ->assertSee('First-Generation Students')
            ->assertSee('Students in an Org')
            ->assertSee('50%')
            ->assertSee('1 student in at least one org');
    }

    public function test_stats_overview_handles_empty_database(): void
    {
        Livewire::test(StudentStatsOverview::class)
            ->assertOk()
            ->assertSee('0%')
            ->assertSee('0 students');
    }

    public function test_class_and_major_charts_render(): void
    {
        $this->student(['student_class' => 'junior', 'major' => 'Biology']);
        $this->student(['student_class' => 'junior', 'major' => 'Biology']);
        $this->student(['student_class' => 'senior', 'major' => 'History']);

        Livewire::test(StudentsByClassChart::class)->assertOk()->assertSee('Students by Class');
        Livewire::test(StudentsByMajorChart::class)->assertOk()->assertSee('Top Majors');
    }

    public function test_charts_render_when_empty(): void
    {
        Livewire::test(StudentsByClassChart::class)->assertOk();
        Livewire::test(StudentsByMajorChart::class)->assertOk();
    }
}
