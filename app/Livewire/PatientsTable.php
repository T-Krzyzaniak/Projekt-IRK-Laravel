<?php

namespace App\Livewire;

use App\Models\patients;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class PatientsTable extends PowerGridComponent
{
    public string $tableName = 'patientsTable';

    public function setUp(): array
    {

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
        return patients::query();
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
            ->add('pracownik_id')
            ->add('created_at');
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

            Column::make('Contact', 'telNumb')
                ->sortable()
                ->searchable(),

            Column::make('PESEL', 'PESEL')
                ->sortable()
                ->searchable(),
            Column::make('Age','age')
                ->sortable()
                ->searchable(),

            Column::make('Worker id', 'pracownik_id'), 

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name'),
            Filter::inputText('surname'),
            Filter::inputText('age'),
            Filter::inputText('pracownik_id'),

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
    $patients = patients::findOrFail($id);

    $this->authorize('delete', $patients);

    $patients->delete();
}

    public function actions(patients $row): array
    {
        return [
            Button::add('edit')
            ->slot('Edytuj')
            ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs')
            ->route('patients.edit', ['patients' => $row->id]),
            Button::add('delete')
            ->slot('Usuń')
            ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs ml-2')
            ->dispatch('delete', ['id' => $row->id])
    ];
        
    }

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
