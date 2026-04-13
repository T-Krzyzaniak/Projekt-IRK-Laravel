<div class="max-w-xl mx-auto p-6 bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-800">
    <form wire:submit="save" class="space-y-6">
        <flux:field>
            <flux:label>Imię</flux:label>
            <flux:input wire:model="name" placeholder="np. Jan" />
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Nazwisko</flux:label>
            <flux:input wire:model="surname" placeholder="np. Kowalski" />
            <flux:error name="surname" />
        </flux:field>

        <flux:field>
            <flux:label>Stanowisko</flux:label>
            <flux:input wire:model="position" placeholder="np. Kierownik" />
            <flux:error name="position" />
        </flux:field>

        <flux:field>
            <flux:label>Numer Telefonu</flux:label>
            <flux:input wire:model="telNumb" icon="phone" placeholder="123 456 789" />
            <flux:error name="telNumb" />
        </flux:field>

        <div class="flex items-center gap-3">
            <flux:button type="submit" variant="primary" class="w-full">
                Zapisz zmiany
            </flux:button>
            <flux:button href="{{ route('pracowniks.index') }}" variant="ghost">
                Anuluj
            </flux:button>
        </div>
    </form>
</div>