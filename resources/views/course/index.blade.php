<x-layouts.app :title="__('course')">
@can('create', App\Models\Course::class)
        <a href="{{ route('Course.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">Dodaj Kierunek</a>
    @endcan    
<livewire:course-table />

</x-layouts.app>