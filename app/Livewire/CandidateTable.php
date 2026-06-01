<?php

namespace App\Livewire;

use App\Models\Candidate;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CandidateTable extends PowerGridComponent
{
    public string $tableName = 'candidateTable';

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

   public function datasource(): \Illuminate\Database\Eloquent\Builder
{
    $user = auth()->user();

    if ($user && $user->hasRole('admin')) {
        return Candidate::query();
    } else{
    return Candidate::query()->where('user_id', $user->id);
    }
}

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('surname')
            ->add('telNumb')
            ->add('PESEL')
            ->add('age')
            ->add('math')
            ->add('polish')
            ->add('english')
            ->add('created_at')
            ->add('user_id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Surname', 'surname')
                ->sortable()
                ->searchable(),

            Column::make('TelNumb', 'telNumb')
                ->sortable()
                ->searchable(),

            Column::make('PESEL', 'PESEL')
                ->sortable()
                ->searchable(),

            Column::make('Age', 'age')
                ->sortable()
                ->searchable(),

            Column::make('Math', 'math')
                ->sortable()
                ->searchable(),

            Column::make('Polish', 'polish')
                ->sortable()
                ->searchable(),

            Column::make('English', 'english')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),
            Column::make('User_id', 'user_id'),

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
    $candidates = Candidate::findOrFail($id);

    $this->authorize('delete', $candidates);

    $candidates->delete();
}

    public function actions(Candidate $row): array
    {
        return [
            Button::add('edit')
            ->slot('Edytuj')
            ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs')
            ->route('candidate.edit', ['candidate' => $row->id]),
            Button::add('delete')
            ->slot('Usuń')
            ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs ml-2')
            ->dispatch('delete', ['id' => $row->id])
    ];
        
    }
    public function actionRules(): array
{
    $user = auth()->user();

    return [
        \PowerComponents\LivewirePowerGrid\Facades\Rule::button('edit')
            ->when(fn($row) => !$user->hasRole('ADMIN') && $row->user_id !== $user->id)
            ->hide(),

    
        \PowerComponents\LivewirePowerGrid\Facades\Rule::button('delete')
            ->when(fn($row) => !$user->hasRole('ADMIN') && $row->user_id !== $user->id)
            ->hide(),
    ];
}
    /*
    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    
    public function actions(Candidate $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }
        */
    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
