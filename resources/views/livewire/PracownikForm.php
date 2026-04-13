<?php

namespace App\Livewire;

use App\Models\Pracownik;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PracownikForm extends Component
{
    use AuthorizesRequests;

    public ?Pracownik $pracownik = null;

    public string $name = '';
    public string $surname = '';
    public string $position = '';
    public string $telNumb = '';

    protected function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'position' => 'required',
            'telNumb' => 'required|unique:pracowniks,telNumb,' . ($this->pracownik->id ?? 'NULL'),
        ];
    }

    public function mount(?Pracownik $pracownik = null): void
    {
        if ($pracownik && $pracownik->exists) {
            $this->authorize('update', $pracownik);
            $this->pracownik = $pracownik;
            
            $this->name = $pracownik->name;
            $this->surname = $pracownik->surname;
            $this->position = $pracownik->position;
            $this->telNumb = $pracownik->telNumb;
        } else {
            $this->authorize('create', Pracownik::class);
        }
    }

    public function save(): void
{
    $this->validate();

    Pracownik::updateOrCreate(
        ['id' => $this->pracownik?->id],
        [
            'name' => $this->name,
            'surname' => $this->surname,
            'position' => $this->position,
            'telNumb' => $this->telNumb,
        ]
    );

    session()->flash('success', 'Pracownik zapisany pomyślnie!');
    
    $this->redirectRoute('pracowniks.index'); 
}

    public function render()
    {
        return view('livewire.pracownik-form');
    }
}