<x-layouts.app :title="Edytuj Pacjenta">
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edytuj Pacjenta</h1>
        <livewire:patients-form :patients="$patients" />
    </div>
</x-layouts.app>