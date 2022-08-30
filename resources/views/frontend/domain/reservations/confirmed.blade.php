@extends('frontend.layouts.app')

@section('title', "Merci d'avoir choisie notre plateforme")

@section('content')

    <section class="w-full h-screen flex items-center relative overflow-hidden">
        <div class="absolute w-screen h-80 top-1/2 -translate-y-1/2">
            <svg width="407" height="408" viewBox="0 0 407 408" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.698236" d="M365.474 102.147C380.763 123.373 403.29 140.892 406.203 168.577C409.17 196.771 403.454 232.347 381.48 254.239C357.854 277.775 315.107 258.633 291.822 282.526C263.025 312.077 277.927 368.132 245.74 393.53C218.359 415.137 177.491 408.366 151.577 393.194C125.307 377.813 128.833 334.87 107.937 312.848C89.8088 293.742 56.7714 294.773 39.3801 274.947C19.8138 252.642 -6.42542 225.23 2.6508 192.824C12.3866 158.064 57.7403 144.882 83.384 117.837C101.42 98.8149 111.484 73.5722 131.537 56.8921C151.692 40.1278 175.377 30.7209 198.987 21.681C224.161 12.0418 251.182 -4.20534 274.968 1.97412C298.887 8.18784 307.578 36.2018 323.741 54.0906C338.133 70.0208 352.856 84.6292 365.474 102.147Z" fill="#6842FF" fill-opacity="0.13" />
            </svg>
        </div>
        <div class="w-full mx-auto relative max-w-screen-lg lg:max-w-screen-2xl px-4 xs:px-6 sm:px-10 lg:px-12 xl:px-16 ">
            <div class="grid md:grid-cols-2 gap-2 items-center">
                <div class="flex flex-col gap-7">
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-semibold text-gray-600">
                        Merci d'avoir choisi Karibukuako
                    </h1>
                    <p class="text-gray-500 text-base text-lg text-2xl xl:leading-snug">
                        Votre reservation est effectuée avec succes, le code de votre reservation est :
                        <span class="font-semibold text-purple-600">
                            {{ $reservation->house->reference ?? "" }}
                        </span> <br>
                    </p>
                    <div class="flex flex-col gap-2">
                        <p class="text-gray-500 text-base text-lg text-2xl xl:leading-snug">
                            Pour confirmez votre reservation; Veillez nous contacter en cliquant sur le bouton ci-après
                        </p>

                        <div class="flex">
                            <a href="https://wa.me/message/H2V6EE3ZNRCVM1" class="flex items-center gap-2 rounded-md px-6 py-3 bg-green-600 text-white transition hover:bg-opacity-80">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                                <span>Appellez maintenant</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex items-end justify-end align-bottom">
                    <img src="" alt="" class="flex">
                </div>
            </div>
        </div>
    </section>
@endsection
