@extends('frontend.layouts.app')

@section('title')
    Liste des maison par categories
@endsection

@section('content')
    <main class="h-max min-h-max pt-24">
        <section class="w-full flex justify-center overflow-hidden sticky top-0 h-16 bg-white items-center bg-opacity-95 backdrop-filter backdrop-blur-sm z-500">
            <div class="relative w-full h-full flex items-center max-w-screen-lg overflow-hidden overflow-x-auto lg:max-w-screen-2xl px-4 xs:px-6 sm:px-10 lg:px-12 xl:px-16">
                @if($categories->count() > 0)
                    <div class="flex h-full items-center gap-3 w-full">
                        <form action="" class="flex">
                            <input type="hidden" name="category" value="all">
                            <button class="min-w-max px-3 py-2 text-sm rounded hover:text-purple-600 transition activeCategorie">
                                Toutes les categories
                            </button>
                        </form>
                        @foreach($categories as $category)
                            <form action="" class="flex">
                                <input type="hidden" name="category"  value="{{ $category->name }}">
                                <button
                                    href="#"
                                    class="min-w-max px-3 py-2 text-sm rounded hover:text-purple-600 transition">
                                    {{ ucfirst($category->name) ?? "" }}
                                </button>
                            </form>
                        @endforeach
                    </div>
                @else
                @endif
            </div>
        </section>

        @if($apartment_notes->count() > 0)
        <section class="w-full flex justify-center overflow-hidden py-10">
            <div class="relative w-full max-w-screen-lg lg:max-w-screen-2xl px-4 xs:px-6 sm:px-10 lg:px-12 xl:px-16 flex flex-col gap-6 lg:gap-8">
                <div class="w-full flex justify-between items-center">
                    <h1 class="text-2xl md:text-3xl font-semibold text-gray-600">Maisons recentes</h1>
                    <div class="flex items-center gap-3">
                        <div
                            class="swip-prev-bestrate z-500 p-2 transition  hover:bg-purple-700 focus:bg-purple-500 focus:border-transparent rounded bg-purple-100 text-purple-600 hover:text-white border-2 border-gray-100 hover:border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                        <div
                            class="swip-next-bestrate z-500 p-2 transition  hover:bg-purple-700 focus:bg-purple-500 focus:border-transparent rounded bg-purple-100 text-purple-600 hover:text-white border-2 border-gray-100 hover:border-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <div class="swiper swiperBestrate">
                        <div class="swiper-wrapper">
                            @foreach($apartment_notes as $key => $apartment_note)
                                <turbo-frame id="{{$apartment_notes}}">
                                <div class="swiper-slide">
                                    <a href="{{ route('house.show', $apartment_note->house->id) }}">
                                        <div
                                            class="w-full flex flex-col p-1 rounded-xl border hover:shadow-lg hover:rounded-2xl hover:border-transparent group transition duration-200">
                                            <div class="w-full rounded-t-md relative">
                                                <img
                                                    src="{{ asset('storage/'. $apartment_note->house->images) }}"
                                                    width="300"
                                                    title="{{ $apartment_note->house->town }}"
                                                    alt="{{ $apartment_note->house->commune }}"
                                                    class="w-full h-44 sm:h-52 lg:h-60 object-cover rounded-lg group-hover:!rounded-xl group:transition duration-200">
                                                <span class="text-pink-600 absolute right-2 top-2 p-2 rounded-full bg-gray-100 bg-opacity-70">
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
                                                        Maison
                                                        {{ $apartment_note->house->detail->number_pieces ?? 0 }} pieces
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
                                                            {{ ucfirst($apartment_note->house->district) ?? "" }}, {{ ucfirst($apartment_note->house->town) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="w-full justify-between flex items-center">
                                                    <div class="flex items-center gap-1 text-sm">
                                                        <span>{{ $apartment_note->house->warranty_price ?? 0 }} $ Garantie</span>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <h5 class="text-2xl uppercase  leading-none md:text-right font-bold text-purple-500">
                                                            {{ $apartment_note->house->prices ?? 0 }} $
                                                        </h5>
                                                        <span class="text-xs md:text-sm">/mois</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-3 px-3 border-t border-gray-300 flex justify-between">
                                                <div class="flex items-center">
                                                    @if($apartment_note->note)
                                                        @for($i = 1; $i <= $apartment_note->note; $i++)
                                                            <img
                                                                src="{{ asset('images/icons/star.svg') }}"
                                                                width="10"
                                                                alt="star"
                                                                class="w-5 h-5 lg:w-6 lg:h-6">
                                                        @endfor
                                                    @endif
                                                </div>
                                                <div class="flex items-center min-w-max">
                                                    <a
                                                        href="{{ route('house.show', $apartment_note->house->id) }}"
                                                        class="px-5 py-2 rounded bg-purple-600 text-white transition hover:bg-purple-700 text-sm">
                                                        Voir plus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                </turbo-frame>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <section class="w-full flex justify-center overflow-hidden py-10 sticky top-0">
            @if($apartments->count() > 0)
                <div class="relative w-full max-w-screen-lg lg:max-w-screen-2xl px-4 xs:px-6 sm:px-10 lg:px-12 xl:px-16 flex flex-col gap-6 lg:gap-8">
                    <div class="w-full flex justify-between items-center">
                        <h1 class="text-2xl md:text-3xl font-semibold text-gray-600">Maisons disponibles</h1>
                    </div>
                    <div class="flex flex-col gap-5">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5 md:gap-6 ">

                            @foreach($apartments as $apartment)
                                <turbo-frame id="{{$apartment->id}}">
                                @include('frontend.components._service', with($apartment))
                                </turbo-frame>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </main>
@endsection
