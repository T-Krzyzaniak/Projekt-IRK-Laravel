<?php

namespace App\Livewire;

use App\Models\Pracownik;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

final class WorkerTable extends PowerGridComponent
{
    use AuthorizesRequests;
    public string $tableName = 'workerTable';
    

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
        return Pracownik::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
           // ->add('name_lower', fn (Pracownik $model) => strtolower(e($model->name)))
            ->add('surname')
           // ->add('surname_lower', fn (Pracownik $model) => strtolower(e($model->surname)))
            ->add('position')
           // ->add('position_lower', fn (Pracownik $model) => strtolower(e($model->position)))
            ->add('telNumb')
           // ->add('telNumb_lower', fn (Pracownik $model) => strtolower(e($model->telNumb)))
            ->add('created_at');
          //  ->add('created_at_formatted', fn (Pracownik $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))

    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Surname', 'surname')
                ->searchable()
                ->sortable(),
                Column::make('Position', 'position')
                ->searchable()
                ->sortable(),
                Column::make('Number', 'telNumb')
                ->searchable()
                ->sortable(),
            

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->searchable(),

            Column::action('Action')
        ];
    }

  public function actions(Pracownik $pracownik): array
{
    return [
        Button::add('edit')
            ->slot('Edytuj')
            ->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs')
            ->route('pracowniks.edit', ['pracownik' => $pracownik->id]),

        Button::add('delete')
            ->slot('Usuń')
            ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs ml-2')
            ->dispatch('delete', ['id' => $pracownik->id])
    ];
}



    public function filters(): array
    {
        return [
            Filter::inputText('name'),
            Filter::inputText('surname'),
            Filter::inputText('position'),
            Filter::inputText('telNumb'),
        ];
    }
    
    #[\Livewire\Attributes\On('delete')]
public function delete($id): void
{
    
    $pracownik = Pracownik::findOrFail($id);

    $this->authorize('delete', $pracownik);

    $pracownik->delete();

$this->js('alert("Pracownik usunięty")');}




    
    public function actionRules(Pracownik $row): array
    {
            $user = auth()->user();

       return [
        
           \PowerComponents\LivewirePowerGrid\Facades\Rule::button('edit')
            ->when(fn($row) => !$user->hasRole('admin') && $row->user_id !== $user->id)
            ->hide(),

    
        \PowerComponents\LivewirePowerGrid\Facades\Rule::button('delete')
            ->when(fn($row) => !$user->hasRole('admin') && $row->user_id !== $user->id)
            ->hide(),
        ];
    }

}
