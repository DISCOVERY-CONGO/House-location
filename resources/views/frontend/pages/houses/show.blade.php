@php use App\Enums\ElectricityEnum; @endphp
@extends('frontend.layouts.app')

@section('title')
    Nos Maison
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
            <div id="reservaForm"
                 class="fixed w-full h-full top-0 left-0 z-[1001] md:hidden flex justify-center transition-all duration-1000 -translate-y-full opacity-0">
                <div class="w-5/6 sm:w-80 pt-5">
                    <div class="w-full bg-white p-4 rounded-xl transition-all relative">
                        <div class="absolute -top-3 -right-3 z-[1004] ">
                            <button
                                id="closeModalReserF"
                                class="text-gray-100 rounded-full flex items-center justify-center w-7 h-7 bg-gray-700 bg-opacity-80">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 gap-4">
                <div class="md:col-span-2 overflow-hidden">
                    <div
                        style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2 max-h-72 md:max-h-80 lg:max-h-96 overflow-hidden mb-5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide rounded-xl overflow-hidden">
                                <a
                                    href="{{ asset('storage/'. $apartment->images) }}"
                                    data-fslightbox="houseGallery"
                                    title="{{ $apartment->town ?? "" }}"
                                    class="w-full h-full">
                                    <img
                                        src="{{ asset('storage/'. $apartment->images) }}"
                                        title="{{ $apartment->town ?? "" }}"
                                        alt="{{ $apartment->town ?? "" }}"
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
                                                class="rounded-xl w-full h-full object-cover transition-all hover:scale-105 duration-300" />
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
                                    title="{{ $apartment->town ?? "" }}"
                                    class="rounded-xl w-full h-full object-cover" />
                            </div>
                            @if($apartment->image)
                                @foreach($apartment->image as $image)
                                    <div class="swiper-slide">
                                        <img
                                            src="{{ asset('storage/'. $image->images) }}"
                                            title="{{ $apartment->town ?? "" }}"
                                            class="rounded-xl w-full h-full object-cover" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div
                        class="flex flex-col pl-4 relative before:absolute before:w-1 before:h-6 before:bg-purple-600 before:top-1 before:left-0 z-20">
                        <h1 class="flex font-semibold text-gray-600 text-xl">Descriptions</h1>
                        <div class="flex py-4">
                            <p class="text-gray-500 font-light text-base text-justify">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores illo similique reprehenderit odit.
                                Sequi rem ipsam autem, minima consequuntur, exercitationem quae doloremque cumque officiis similique,
                                corporis illo nesciunt iusto enim.
                                Harum rerum, magnam suscipit quae aut quis eos, odio, voluptates atque doloremque vero?
                                Doloribus quam laudantium, atque quia optio dolore ut. Reprehenderit, doloribus veniam.
                                Quidem sapiente voluptas ab distinctio ad.
                                Soluta vero quaerat officiis corrupti, numquam rem minima illo modi doloribus quia optio
                                commodi laborum. Laborum ratione, nostrum eveniet id ex consectetur suscipit ducimus
                                officiis tenetur quae a eius reprehenderit.
                            </p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col mt-4 pl-4 relative before:absolute before:w-1 before:h-6 before:bg-purple-600 before:top-1 before:left-0">
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
                                        <td class="p-2 rounded">{{ $apartment->detail->room_number ?? 0 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 bg-gray-50 text-gray-700">Nombre des pieces</td>
                                        <td class="p-2 rounded">{{ $apartment->detail->number_pieces }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 bg-gray-50 text-gray-700">Toilette interieur</td>
                                        <td class="p-2 rounded">{{ $apartment->detail->toilet ?? "" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 bg-gray-50 text-gray-700">Prix Mensuel</td>
                                        <td class="p-2 rounded">{{ $apartment->prices ?? 0 }} $</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 bg-gray-50 text-gray-700">Guaratie</td>
                                        <td class="p-2 rounded">{{ $apartment->guarantees ?? 0 }} $</td>
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
                    <div
                        class="flex mt-4 flex-col pl-4 relative before:absolute before:w-1 before:h-6 before:bg-purple-600 before:top-1 before:left-0">
                        <h1 class="flex font-semibold text-gray-600 text-xl">Localisation</h1>
                        <div class="flex py-4 w-full gap-2">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>A 2 Heures de votre position actuelle</span>
                        </div>
                    </div>
                    <div class="w-full">
                        here the map
                    </div>
                </div>

                <div class="hidden lg:block lg:col-span-1">
                    <div class="lg:sticky top-16 space-y-6 lg:mt-8 bg-white shadow-lg rounded-xl w-full p-4">
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
    <script>
        new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        })
        new Swiper(".mySwiper2", {
            spaceBetween: 10,
            thumbs: {
                swiper: swiper,
            },
        })


        const reservaForm = document.querySelector('#reservaForm')

        document.querySelector('#btnTogFrmReser').addEventListener('click', (e) => {
            e.preventDefault()
            reservaForm.classList.remove('-translate-y-full', 'opacity-0')
        })

        document.querySelector('#closeModalReserF').addEventListener('click', (e) => {
            e.preventDefault()
            reservaForm.classList.add('-translate-y-full', 'opacity-0')
        })
    </script>
@endsection
