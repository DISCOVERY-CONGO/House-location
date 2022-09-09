@php use App\Enums\ElectricityEnum;use App\Enums\ToiletEnum; @endphp
@extends('frontend.layouts.app')

@section('title')
    Detail de la maison
@endsection

@section('content')
    <section class="w-full flex justify-center overflow-hidden pt-24 pb-20">
        <div class="relative w-full max-w-screen-lg lg:max-w-screen-2xl px-4 xs:px-6 sm:px-10 lg:px-12 xl:px-16 gap-6 lg:gap-8">
            <div class="fixed bottom-0 left-0 w-full px-10 py-3 bg-transparent md:hidden  z-[1000]">
                <button
                    id="btnTogFrmReser"
                    class=" w-full text-sm py-3 px-4 rounded-xl text-center text-white  bg-gradient-to-br from-green-400 to-purple-600 z-[1000]">
                    Reserver maintenant
                </button>
            </div>
            <div class="md:grid md:grid-cols-3 gap-4">
                <div class="md:col-span-2 overflow-hidden">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2 max-h-72 md:max-h-80 lg:max-h-96 overflow-hidden mb-5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide rounded-xl overflow-hidden">
                                <a
                                    href="{{ asset('storage/'. $apartment->images) }}"
                                    title="{{ $apartment->commune }}"
                                    data-fslightbox="houseGallery"
                                   class="w-full h-full">
                                    <img
                                        src="{{ asset('storage/'. $apartment->images) }}"
                                        alt="{{ $apartment->commune }}"
                                        class="rounded-xl w-full h-full object-cover transition-all hover:scale-105 duration-300" />
                                </a>
                            </div>
                            @if($apartment->image)
                                @foreach($apartment->image as $image)
                                    <div class="swiper-slide rounded-xl overflow-hidden">
                                            <a
                                                href="{{ asset('storage/'. $image->images) }}"
                                                data-fslightbox="houseGallery"
                                                title="{{ $apartment->town ?? "" }}"
                                                class="w-full h-full">
                                                <img
                                                    src="{{ asset('storage/'. $image->images) }}"
                                                    title="{{ $apartment->town ?? "" }}"
                                                    alt="{{ $apartment->town ?? "" }}"
                                                    class="rounded-xl w-full h-full object-cover transition-all hover:scale-105 duration-300"/>
                                            </a>
                                        </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper pt-1 max-h-24 overflow-hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img
                                    src="{{ asset('storage/'. $apartment->images) }}"
                                    alt="{{ $apartment->commune }}"
                                    class="rounded-xl w-full h-full object-cover" />
                            </div>
                            @if($apartment->image)
                                @foreach($apartment->image as $image)
                                    <div class="swiper-slide">
                                        <img
                                            src="{{ asset('storage/'. $image->images) }}"
                                            alt="{{ $apartment->commune }}"
                                            class="rounded-xl w-full h-full object-cover" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="py-7 flex flex-col gap-5 z-30">
                        <div class="flex flex-wrap gap-2">
                            <div class="flex items-center sm:w-max w-full">
                                <a href="tel:+243990416691" class="flex justify-center w-full gap-4 px-8 py-3 rounded-full bg-purple-600 text-white">
                                    <span class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                          </svg>
                                    </span>
                                    <span>Nous contactez</span>
                                </a>
                            </div>
                            <div class="grid grid-cols-2 sm:flex items-center sm:w-max w-full gap-2">
                                <div class="p-2 sm:px-3 sm:py-2 text-white md:text-base text-sm bg-green-600 flex items-center justify-center rounded-md ">
                                    {{ ucfirst($apartment->type->name) ?? "" }}
                                </div>
                                @php
                                    $reservations = \App\Models\House::query()
                                        ->where('id', '=', $apartment->id)
                                        ->withCount(['reservations' => function($builder) {
                                            $builder->where('status', false);
                                        }])
                                        ->firstOrFail()
                                @endphp
                                <div class="p-2 sm:px-3 sm:py-2  text-white bg-orange-600 flex items-center justify-center rounded-md">
                                    {{ $reservations->reservations_count }} En attente
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 relative before:absolute before:w-1 before:h-6 before:bg-purple-600 before:top-1 before:left-0 z-20">
                        <h1 class="flex font-semibold text-gray-600 text-xl">Descriptions</h1>
                        <div class="flex py-4">
                            <p class="text-gray-500 font-light text-base text-justify">
                                {{ $apartment->detail->description ?? "" }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col mt-4 pl-4 relative before:absolute before:w-1 before:h-6 before:bg-purple-600 before:top-1 before:left-0">
                        <h1 class="flex font-semibold text-gray-600 text-xl">Details appartement</h1>
                        <div class="flex py-4 w-full">
                            <table class="w-full rounded-lg table-fixed bg-gray-100">
                                <tbody>
                                <tr>
                                    <td class="p-2 bg-gray-50 text-gray-700">Code Reference</td>
                                    <td class="p-2 rounded">{{ $apartment->reference ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td class="p-2 bg-gray-50 text-gray-700">Chambres</td>
                                    <td class="p-2 rounded">{{ $apartment->detail->number_rooms ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td class="p-2 bg-gray-50 text-gray-700">Nombre des pieces</td>
                                    <td class="p-2 rounded">{{ $apartment->detail->number_pieces }}</td>
                                </tr>
                                <tr>
                                    <td class="p-2 bg-gray-50 text-gray-700">Toilette interieur</td>
                                    <td class="p-2 rounded">
                                        @if($apartment->detail->toilet == ToiletEnum::INTERNE)
                                            Toilete Interne
                                        @elseif($apartment->detail->toilet == ToiletEnum::EXTERNE)
                                            Toilete Externe
                                        @else
                                            Interne/Externe
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-2 bg-gray-50 text-gray-700">Prix Mensuel</td>
                                    <td class="p-2 rounded">{{ $apartment->prices ?? 0 }} $</td>
                                </tr>
                                <tr>
                                    <td class="p-2 bg-gray-50 text-gray-700">Garatie</td>
                                    <td class="p-2 rounded">{{ $apartment->warranty_price ?? 0 }} $</td>
                                </tr>
                                <tr>
                                    <td class="p-2 bg-gray-50 text-gray-700">Electricité</td>
                                    <td class="p-2 rounded">
                                        @if($apartment->detail->electrity  == ElectricityEnum::EXIST_ELECTRICITY)
                                            Disponible
                                        @else
                                            Non Disponible
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex mt-4 flex-col pl-4 relative before:absolute before:w-1 before:h-6 before:bg-purple-600 before:top-1 before:left-0">
                        <h1 class="flex font-semibold text-gray-600 text-xl">Localisation</h1>
                        <div class="flex py-4 w-full gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                      clip-rule="evenodd" />
                            </svg>
                            <span id="location"></span>
                        </div>
                    </div>

                </div>

                <div id="reservaForm" class="z-[1140] md:z-30 invisible transition-all opacity-0 md:opacity-100  bg-transparent md:p-0 p-4 items-center justify-center w-full h-full md:visible md:h-auto fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 md:left-0 md:top-0 md:-translate-y-0 md:-translate-x-0 md:relative hidden md:block lg:col-span-1">
                    <div id="closeModalReserF" class="z-[1040] fixed inset-0 bg-gray-600 bg-opacity-60 md:hidden md:invisible"></div>
                    <div class="z-[1140] relative md:max-w-none max-w-lg w-full md:sticky md:top-16 space-y-6 lg:mt-8 bg-white shadow-lg rounded-xl md:w-full p-4">
                        <div class="flex md:hidden md:invisible pb-2 border-b border-b-gray-200">
                            <div class="flex w-full justify-end items-center">
                                <button data-close-reserv-form class="outline-none p-2 border-gray-200 text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @include('frontend.components._reservation-form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/fslightbox.js') }}"></script>
@endsection
