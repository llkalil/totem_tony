<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white p-8 rounded-md w-full">
                    <div class=" flex items-center justify-between pb-6">
                        <div>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categorias</h2>
                            <span class="text-sm">Todas as categorias</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="lg:ml-40 ml-10 space-x-8">
                                <x-jet-button onclick="Livewire.emit('openModal', 'admin.categories.create')">
                                    Nova Categoria
                                </x-jet-button>
                            </div>
                        </div>
                    </div>
                    @livewire('admin.categories.table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
