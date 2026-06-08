<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Zapisy;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CourseTable extends PowerGridComponent
{
    public string $tableName = 'courseTable';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Course::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields();
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Collegium', 'collegium')
                ->sortable()
                ->searchable(),

            Column::make('Tryb', 'tryb')
                ->sortable()
                ->searchable(),

            Column::make('Semestry', 'semestry')
                ->sortable()
                ->searchable(),

            Column::make('Opłata', 'oplata')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }
    #[\Livewire\Attributes\On('delete')]
public function delete($id): void
{
    $courses = Course::findOrFail($id);

    $this->authorize('delete', $courses);

    $courses->delete();
}
#[\Livewire\Attributes\On('handleEnrollment')]
    public function handleEnrollment(int $courseId, string $courseName): void
    {
        $user = Auth::user();
        $candidate = $user?->candidate;

        if (!$candidate) {
            session()->flash('error', 'Nie znaleziono profilu kandydata dla zalogowanego użytkownika.');
            return;
        }

        $alreadyEnrolled = Zapisy::where('course_id', $courseId)
            ->where('candidate_id', $candidate->id)
            ->exists();

        if ($alreadyEnrolled) {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Jesteś już zapisany na ten kurs!']);
            return;
        }

        Zapisy::create([
            'course_id'         => $courseId,
            'course_name'       => $courseName,
            'candidate_id'      => $candidate->id,
            'candidate_name'    => $candidate->name,   
            'candidate_surname' => $candidate->surname, 
            'status' => 'pending',
            'user_id' => $candidate->user_id,
        ]);

    }



    public function actions(Course $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->class('bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs')
                ->route('course.edit', ['course' => $row->id]),
            Button::add('delete')
                ->slot('Usuń')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs ml-2')
                ->dispatch('delete', ['id' => $row->id]),
                Button::add('zapisz')
                ->slot('Zapisz')
                ->id()
                ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs')
                ->dispatch('handleEnrollment', ['courseId' => $row->id, 'courseName' => $row->name]),

        ];
    }

    
    public function actionRules($row): array
    {
        $user = Auth::user();
        $candidate = $user?->candidate;
        
        $currentEnrollmentCount = 0;
        if ($candidate) {
            $currentEnrollmentCount = \App\Models\Zapisy::where('candidate_id', $candidate->id)->count();
        }

        return [
            \PowerComponents\LivewirePowerGrid\Facades\Rule::button('zapisz')
                ->when(fn() => $currentEnrollmentCount >= 3)
                ->hide(),

                 \PowerComponents\LivewirePowerGrid\Facades\Rule::button('edit')
            ->when(fn($row) => !$user->hasRole('admin') && $row->user_id !== $user->id)
            ->hide(),

    
        \PowerComponents\LivewirePowerGrid\Facades\Rule::button('delete')
            ->when(fn($row) => !$user->hasRole('admin') && $row->user_id !== $user->id)
            ->hide(),
        ];
    }
    
}
