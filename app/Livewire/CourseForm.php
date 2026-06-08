<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseForm extends Component
{
    public ?Course $Course = null;

    public string $name = '';
    public string $collegium = '';
    public string $tryb = '';
    public string $semestry = '';
    public string $oplata = '';


    protected function rules(): array
    {
        return [
            'name' => 'required',
            'collegium' => 'required',
            'tryb' => 'required',
            'semestry' => 'required',
            'oplata' => 'required',
        ];
    }

    public function mount(?Course $Course = null): void
    {
        if ($Course) {
            $this->authorize('update', $Course);
            $this->Course = $Course;
            $this->fill($Course->toArray());
        } else {
            $this->authorize('create', Course::class);
        }
    }

    public function save(): void
    {
        $this->validate();

        Course::updateOrCreate(
            ['id' => $this->Course?->id],
            $this->only(['name', 'collegium', 'tryb','semestry', 'oplata'])
        );
        $this->redirectRoute('course.index');
    }


    public function render()
    {
        return view('livewire.course-form');
    }

}
