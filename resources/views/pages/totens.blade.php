<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white p-8 rounded-md w-full">
                    <div class=" flex items-center justify-between pb-6">
                        <div>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Totens</h2>
                            <span class="text-sm">Todos os totens</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="lg:ml-40 ml-10 space-x-8">
                                <x-jet-button onclick="Livewire.emit('openModal', 'admin.categories.create')">
                                    {{ __('Novo totem') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </div>
                    @livewire('admin.totens.table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
