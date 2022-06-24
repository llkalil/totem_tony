<div class="p-4">
    <h1 class="text-xl mb-4">
        Novo usuário
    </h1>
    <div class="mb-2">
        <x-jet-label for="name" > Nome</x-jet-label>
        <x-jet-input id="name" type="text" wire:model.lazy="user.name" class="block mt-1 w-full" type="text" autofocus></x-jet-input>
    </div>
    <div class="mb-2">
        <x-jet-label for="role" > Papel</x-jet-label>
        <x-select id="role" wire:model.lazy="user.role_id" class="block mt-1 w-full"  >
            @forelse($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @empty

            @endforelse
        </x-select>
    </div>
    <div class="mb-2">
        <x-jet-label for="email" > Email</x-jet-label>
        <x-jet-input id="email" type="email" wire:model.lazy="user.email" class="block mt-1 w-full"  ></x-jet-input>
    </div>
    <div class="mb-2">
        <x-jet-label for="password" > Senha</x-jet-label>
        <x-jet-input id="password" type="password" wire:model.lazy="user.password" class="block mt-1 w-full"  ></x-jet-input>
    </div>
    <div class="mb-2">
        <x-jet-label for="password_confirmation" > Confirme a senha</x-jet-label>
        <x-jet-input id="password_confirmation" type="password" wire:model.lazy="user.password_confirmation" class="block mt-1 w-full"  ></x-jet-input>
    </div>
    <div class="flex gap-2 justify-end mt-4">
        <x-jet-secondary-button wire:click="$emit('closeModal')">Cancelar</x-jet-secondary-button>
        <x-jet-button wire:click="save()">Salvar</x-jet-button>
    </div>
</div>
