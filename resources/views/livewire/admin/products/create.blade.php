<div class="p-4">
    <h1 class="text-xl mb-4">
        Novo produto
    </h1>
    <div class="flex gap-6">
        <div class="w-3/5">
            <div class="mb-2">
                <x-jet-label for="name">Nome</x-jet-label>
                <x-jet-input id="name" type="text" wire:model.lazy="product.name"
                             class="block mt-1 w-full"></x-jet-input>
            </div>

            <div class="mb-2">
                <x-jet-label for="description">Descrição</x-jet-label>
                <x-textarea id="description" wire:model.lazy="product.description"
                            class="block mt-1 w-full"></x-textarea>
            </div>

            <div class="mb-2">
                <x-filepond accept="image/*" wire:model.lazy="image">
                    Imagem
                </x-filepond>
            </div>
        </div>
        <div class="w-2/5 p-4 flex items-center justify-center">
            @if (!$image instanceof \Livewire\TemporaryUploadedFile)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180.119 139.794">
                    <g transform="translate(-13.59 -66.639)" paint-order="fill markers stroke">
                        <path fill="#d0d0d0" d="M13.591 66.639H193.71v139.794H13.591z"/>
                        <path d="m118.507 133.514-34.249 34.249-15.968-15.968-41.938 41.937H178.726z" opacity=".675"
                              fill="#fff"/>
                        <circle cx="58.217" cy="108.555" r="11.773" opacity=".675" fill="#fff"/>
                        <path fill="none" d="M26.111 77.634h152.614v116.099H26.111z"/>
                    </g>
                </svg>
            @else
                <img src="{{ $image->temporaryUrl() }}" class="shadow-lg" style="max-height: 250px" alt="image">
            @endif
        </div>
    </div>
    <div class="flex gap-6">
        <div class="w-1/2">
            <div class="mb-2">
                <x-jet-label for="price">Preço para venda</x-jet-label>
                <x-jet-input id="price" type="number" wire:model.lazy="product.price"
                             class="block mt-1 w-full"></x-jet-input>
            </div>
        </div>
        <div class="w-1/2">
            <div class="mb-2">
                <x-jet-label for="market_price">Preço de mercado</x-jet-label>
                <x-jet-input id="market_price" type="number" wire:model.lazy="product.market_price"
                             class="block mt-1 w-full"></x-jet-input>
            </div>
        </div>
    </div>
    <div class="mb-2">
        <x-jet-label for="categories_id">Categoria</x-jet-label>
        <x-select id="categories_id" wire:model.lazy="product.categories_id" class="block mt-1 w-full">
            @forelse($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @empty

            @endforelse
        </x-select>
    </div>
    <div class="flex gap-2 justify-end mt-4">
        <x-jet-secondary-button wire:click="$emit('closeModal')">Cancelar</x-jet-secondary-button>
        <x-jet-button wire:click="save()">Salvar</x-jet-button>
    </div>
</div>
