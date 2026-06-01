<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;


class CandidateForm extends Component
{
        public ?Candidate $Candidate = null;

        public string $name ='';
        public string $surname ='';
        public string $telNumb ='';
        public string $PESEL ='';
        public string $age ='';
        public string $math ='';
        public string $polish ='';
        public string $english ='';

         protected function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'telNumb' => 'required',
            'PESEL' => 'required',
            'age' => 'required',
            'math'=> 'required',
            'polish'=> 'required',
            'english'=> 'required',
        ];
    }
    public function mount(?Candidate $Candidate = null): void
    {
        if ($Candidate) {
            $this->authorize('update', $Candidate);
            $this->Candidate = $Candidate;
            $this->fill($Candidate->toArray());
        } 
        else {
            $this->authorize('create', Candidate::class);
        }
    }

    public function save(): void
    {
       $this->validate();

    $data = $this->only(['name', 'surname', 'telNumb', 'PESEL', 'age', 'math', 'polish', 'english']);
    
    if (!$this->Candidate?->exists) {
        $data['user_id'] = auth()->id();
    }
    Candidate::updateOrCreate(
        ['id' => $this->Candidate?->id],
        $data
    );

    $this->redirectRoute('candidate.index');
    }


    public function render()
    {
        return view('livewire.candidate-form');
    }
}
