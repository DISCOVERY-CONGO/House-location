<a
    href="{{ route('house.show', $apartment->id) }}"
    class="w-full flex flex-col p-1 rounded-xl border hover:shadow-lg hover:rounded-2xl hover:border-transparent group transition duration-200">
    <div class="w-full rounded-t-md relative">
        <img
            src="{{ asset('storage/'. $apartment->image->first()->images) }}"
            width="300"
            alt="{{ $apartment->town ?? "" }}"
            class="w-full h-44 object-cover rounded-lg group-hover:!rounded-xl group:transition duration-200">
        <span
            class="text-pink-600 absolute right-2 top-2 p-2 rounded-full bg-gray-100 bg-opacity-70">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor">
                <path
                    fill-rule="evenodd"
                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                    clip-rule="evenodd" />
            </svg>
        </span>
    </div>
    <div class="flex flex-col px-3 py-4 gap-4">
        <div class="flex flex-col gap-2">
            <h1 class="flex text-lg leading-none text-gray-600 line-clamp-1 font-semibold">
                @foreach($apartment->categories as $category)
                    {{ ucfirst($category->name) ?? "" }}
                @endforeach
                 {{ $apartment->detail->number_pieces ?? 0 }} pieces
            </h1>
            <div class="flex items-center gap-3 text-sm text-gray-400">
                <span class="text-purple-600">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            fill-rule="evenodd"
                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="line-clamp-1">
                    {{ ucfirst($apartment->address->district) ?? "" }}, {{ ucfirst($apartment->address->town) }}
                </span>
            </div>
        </div>
        <div class="w-full justify-between flex items-center">
            @if($apartment->type->id === 1)
                <div class="flex items-center gap-1 text-sm">
                    <h5 class="text-2xl uppercase  leading-none md:text-right font-bold text-purple-500">
                        $ {{ $apartment->warranty_price ?? 0 }}
                    </h5>
                </div>
            @elseif($apartment->type->id === 2)
                <div class="flex items-center gap-1 text-sm">
                    <span>{{ $apartment->warranty_price ?? 0 }} $ Garantie</span>
                </div>
                <div class="flex items-center">
                    <h5 class="text-2xl uppercase  leading-none md:text-right font-bold text-purple-500">
                        {{ $apartment->prices ?? 0 }} $
                    </h5>
                    <span class="text-xs md:text-sm">/mois</span>
                </div>
            @else
                <div class="flex items-center gap-1 text-sm">
                    <span>$ {{ $apartment->warranty_price ?? 0 }}</span>
                </div>
                <div class="flex items-center">
                    <h5 class="text-2xl uppercase  leading-none md:text-right font-bold text-purple-500">
                        {{ $apartment->prices ?? 0 }} $
                    </h5>
                    <span class="text-xs md:text-sm">/mois</span>
                </div>
            @endif
        </div>
    </div>
    <div class="py-3 px-3 border-t border-gray-300 flex justify-between">
        <div class="flex items-center">
            <span class="line-clamp-1 text-sm">{{ $apartment->detail->number_pieces ?? 0 }} Pieces, {{ $apartment->detail->number_rooms ?? 0 }} Chambres ....</span>
        </div>
        <div class="flex items-center min-w-max">
            <span class="px-2 py-0.5 rounded-full bg-purple-200 text-gray-600 text-sm">{{ ucfirst($apartment->type->name) ?? '' }}</span>
        </div>
    </div>
</a>
