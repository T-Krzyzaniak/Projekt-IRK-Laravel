<x-layouts.app :title="__('patients')">
@can('create', App\Models\patients::class)
        <a href="{{ route('patients.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">Dodaj Pacjenta</a>
    @endcan    
<livewire:patients-table />

</x-layouts.app>