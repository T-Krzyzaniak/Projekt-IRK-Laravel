<div class="max-w-4xl mx-auto py-10">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Imie</label>
                    <input type="text" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Nazwisko</label>
                    <input type="text" wire:model="surname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-purple-700">Numer Telefonu</label>
                    <input type="number" wire:model="telNumb" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">PESEL</label>
                    <input type="text" wire:model="PESEL" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Wiek</label>
                    <input type="text" wire:model="age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Matematyka</label>
                    <input type="number" step="any" wire:model="math" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                 <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">J.Polski</label>
                    <input type="number" step="any" wire:model="polish" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">J.Angielski</label>
                    <input type="number" step="any" wire:model="english" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

            </div>

            <div class="mt-8 flex justify-end">
                <button type="button" onclick="history.back()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Anuluj
                </button>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ $Candidate ? 'Update Candidate' : 'Create Candidate' }}
                </button>
            </div>
        </form>
    </div>
</div>