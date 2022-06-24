<div class="p-4">
    <h1 class="text-xl mb-4">
        Nova categoria
    </h1>
    <div class="">
        <x-jet-label for="name" > Nome</x-jet-label>
        <x-jet-input id="name" wire:model.lazy="name" class="block mt-1 w-full" type="text" autofocus></x-jet-input>
    </div>
    <div class="mb-2">
        <x-filepond accept="image/*" wire:model.lazy="image">
            Imagem
        </x-filepond>
    </div>
    <div class="flex gap-2 justify-end mt-4">
        <x-jet-secondary-button wire:click="$emit('closeModal')">Cancelar</x-jet-secondary-button>
        <x-jet-button wire:click="save()">Salvar</x-jet-button>
    </div>
</div>
