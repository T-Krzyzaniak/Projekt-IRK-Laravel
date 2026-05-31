<x-layouts.app :title="__('candidate')">
@can('create', App\Models\candidate::class)
        <a href="{{ route('candidate.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">Dodaj Kandydata</a>
    @endcan    
<livewire:candidate-table />

</x-layouts.app>