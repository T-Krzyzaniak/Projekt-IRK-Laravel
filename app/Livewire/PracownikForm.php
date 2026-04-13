<?php

// app/Livewire/PracownikForm.php
namespace App\Livewire;

use App\Models\Pracownik;
use Livewire\Component;

class PracownikForm extends Component
{
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
            'telNumb' => 'required|unique:pracowniks,telNumb,' . $this->pracownik?->id,
        ];
    }

    public function mount(?Pracownik $pracownik = null): void
    {
        if ($pracownik) {
            $this->authorize('update', $pracownik);
            $this->pracownik = $pracownik;
            $this->fill($pracownik->toArray());
        } else {
            $this->authorize('create', Pracownik::class);
        }
    }

    public function save(): void
    {
        $this->validate();

        Pracownik::updateOrCreate(
            ['id' => $this->pracownik?->id],
            $this->only(['name', 'surname', 'position', 'telNumb'])
        );

        session()->flash('success', 'Pracownik zapisany');
        $this->redirectRoute('pracowniks.index');
    }

    public function render()
    {
        return view('livewire.pracownik-form');
    }
}
