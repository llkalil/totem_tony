<div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nome
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Descrição
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        preço de mercado
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        preço de venda
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Criado em
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        ações
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($totens as $totem)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $totem->name }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ \Illuminate\Support\Str::limit($totem->description) }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                R$ {{ number_format($totem->market_price,2) }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">R$ {{ number_format($totem->price,2) }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $totem->created_at->toFormattedDateString() }}
                                @if ($totem->created_at->diff(now())->days <= 7)
                                    <span class="text-sm text-gray-400">
                                   ({{ $totem->created_at->diffForHumans() }})
                                </span>
                                @endif
                            </p>
                        </td>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <button type="button"
                                    onclick="Livewire.emit('openModal', 'admin.totens.edit',{{json_encode(['product_id'=>$totem->id])}})"
                                    class="text-indigo-500 whitespace-no-wrap focus:bg-indigo-100 px-2 cursor-pointer py-1 hover:bg-indigo-50 transition rounded hover:text-indigo-600 font-semibold">
                                Editar
                            </button>
                        </td>
                    </tr>

                @empty
                @endforelse
                </tbody>
            </table>

            @if (!count($totens))
                <div class="flex justify-center flex-col gap-2 items-center my-8">
                    <x-empty-state></x-empty-state>
                    <h1 class="text-xl  p-3">
                        Nada encontrado, adicione um totem acima ou
                        <a
                                onclick="Livewire.emit('openModal', 'admin.totens.create')"
                                class="text-gray-800 whitespace-no-wrap cursor-pointer hover:underline transition rounded font-bold">
                            clicando aqui

                        </a>

                    </h1>
                </div>
            @endif
        </div>
    </div>
</div>
