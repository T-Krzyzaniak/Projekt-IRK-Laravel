<?php

namespace App\Livewire;

use App\Models\patients;
use Livewire\Component;

class patientsForm extends Component
{
    public ?patients $patients = null;

    public string $name = '';
    public string $surname = '';
    public string $telNumb = '';
    public string $PESEL = '';
    public string $age = '';
    public string $pracownik_id = '';


    protected function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'telNumb' => 'required',
            'PESEL' => 'required',
            'age' => 'required',
            'pracownik_id'=> 'required|exists:pracowniks,id'
        ];
    }

    public function mount(?patients $patients = null): void
    {
        if ($patients) {
            $this->authorize('update', $patients);
            $this->patients = $patients;
            $this->fill($patients->toArray());
        } else {
            $this->authorize('create', patients::class);
        }
    }

    public function save(): void
    {
        $this->validate();

        patients::updateOrCreate(
            ['id' => $this->patients?->id],
            $this->only(['name', 'surname', 'telNumb', 'PESEL','age', 'pracownik_id'])
        );
        $this->redirectRoute('patients.index');
    }

    public function render()
{
    return view('livewire.patients-form', [
        'pracownicy' => \App\Models\Pracownik::all()
    ]);
}
}
