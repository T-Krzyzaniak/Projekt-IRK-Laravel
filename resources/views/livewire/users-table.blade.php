<div>
<table class="min-w-full text-left text-sm whitespace-nowrap">
    <tbody>
        @foreach ($users as $user)
            <tr class="border-b">
                <td class="px-6 py-3">{{ $user->id }}</td>
                <td class="px-6 py-3">{{ $user->name }}</td>
                <td class="px-6 py-3">{{ $user->email }}</td>

                <td class="px-6 py-3">
                    <div class="inline-flex">
                        <flux:button
                            wire:click="assignRole({{ $user->id }}, 'admin')"
                        >
                            Admin
                        </flux:button>

                        <flux:button
                            wire:click="assignRole({{ $user->id }}, 'reception')"
                        >
                            Reception
                        </flux:button>

                        <flux:button
                            wire:click="assignRole({{ $user->id }}, 'service')"
                        >
                            Service
                        </flux:button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
