<div class="max-w-4xl mx-auto py-10">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Nazwa Kursu</label>
                    <input type="text" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Collegium</label>
                    <input type="text" wire:model="collegium" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Tryb</label>
                    <input type="text" wire:model="tryb" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Semestry</label>
                    <input type="text" wire:model="semestry" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Opłata</label>
                    <input type="text" wire:model="oplata" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

            </div>

            <div class="mt-8 flex justify-end">
                <button type="button" onclick="history.back()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Anuluj
                </button>
                <button type="submit" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs">
                {{ $Course ? 'Update Course' : 'Create Course' }}
                </button>
            </div>
        </form>
    </div>
</div>