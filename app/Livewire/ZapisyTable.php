<?php

namespace App\Livewire;

use App\Models\Zapisy;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ZapisyTable extends PowerGridComponent
{
    public string $tableName = 'zapisyTable';

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

    if ($user && $user->hasRole('pracownik')) {
        return Zapisy::query();
    } else{
    return Zapisy::query()->where('user_id', $user->id);
    }
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
            Column::make('Identyfikator Kandydatury', 'id'),
            Column::make('Numer kierunku', 'course_id')
                ->sortable()
                ->searchable(),

            Column::make('Nazwa kierunku', 'course_name')
                ->sortable()
                ->searchable(),
            Column::make('Numer kandydata', 'candidate_id')
                ->sortable()
                ->searchable(),

            Column::make('Imie', 'candidate_name')
                ->sortable()
                ->searchable(),

            Column::make('Nazwisko', 'candidate_surname')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable()
                ->editOnClick(auth()->user()?->can('worker access') ?? false),

            Column::action('')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }
     #[\Livewire\Attributes\On('delete')]
public function delete($id): void
{
    $zapisy = Zapisy::findOrFail($id);

    $this->authorize('delete', $zapisy);

    $zapisy->delete();
}

    

    public function actions(Zapisy $row): array
    {
        return [
            Button::add('delete')
                ->slot('Usuń')
                ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs ml-2')
                ->dispatch('delete', ['id' => $row->id]),
        ];
    }
    public function onUpdatedEditable(string|int $id, string $field, string $value): void
{
    if (!auth()->user()?->can('worker manage')) {
        abort(403, 'Brak autoryzacji.');
    }

    Zapisy::query()->find($id)->update([
        $field => $value
    ]);

    $this->dispatch('alert', ['type' => 'success', 'message' => 'Pole zaktualizowane pomyślnie!']);
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
