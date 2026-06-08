<x-layouts.app :title="Edytuj Zapis">
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edytuj Zapis</h1>
        <livewire:zapisy-form :zapisy="$zapisy" />
    </div>
</x-layouts.app>