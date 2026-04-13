<x-layouts.app :title="__('Pracownik')">

    @can('create', App\Models\Pracownik::class)
        <a href="{{ route('pracowniks.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">Dodaj pracownika</a>
    @endcan

    <livewire:worker-table />

</x-layouts.app>
