<div class="p-4">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editando categoria <b>{{ $category->name }}</b></h2>
    <div class="mb-3">
        <x-jet-label for="name">Nome</x-jet-label>
        <x-jet-input id="name" wire:model.lazy="category.name" class="block mt-1 w-full" type="text"
                     autofocus></x-jet-input>
    </div>
    <div class="mb-3">
        <x-switch :checked="$category->active" value="1" wire:model="category.active">
            Ativa
        </x-switch>
    </div>

    <div class="mb-3">
        <x-filepond accept="image/*" wire:model.lazy="image">
            Para editar a imagem faça upload de uma nova
        </x-filepond>
    </div>

    <div class="flex gap-2 justify-end mt-4">
        <x-jet-secondary-button wire:click="$emit('closeModal')">Cancelar</x-jet-secondary-button>
        <x-jet-button :disabled="!$category->isDirty()" class="transition" wire:click="save()">
            Salvar
        </x-jet-button>
    </div>



</div>
