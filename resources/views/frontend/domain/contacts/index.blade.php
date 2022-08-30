@extends('frontend.layouts.app')

@section('title', "Les apartements par categorie")

@section('content')
    <section class="lg:px-28 md:px-12 px-6 pt-16 bg-gray-50 pb-16">
        <div class="lg:max-w-screen-xl mx-auto flex flex-col gap-10">
            <div class="flex justify-center mx-auto lg:w-5/6">
                <h1 class="text-gray-600 font-semibold text-3xl text-center">
                    Pour tout besoin, n'hesitez pas de nous contactactez
                </h1>
            </div>
            <div class="grid md:grid-cols-3 gap-6 lg:gap-8">
                <div class="flex flex-col gap-4 bg-white shadow-lg shadow-purple-100 rounded-md p-4">
                    <div class="block mx-auto">
                        <img src="{{ asset('app/images/icon_phone.png') }}" alt="" class="w-14">
                    </div>
                    <div class="w-full text-center block text-xl font-semibold text-gray-500">
                        <span>Numero telephone</span>
                    </div>
                    <div class="w-full text-center block font-semibold text-gray-400 text-base">
                        <span>+ 243 990 416 691</span>
                    </div>
                </div>

                <div class="flex flex-col gap-4 bg-white shadow-lg shadow-purple-100 rounded-md p-4">
                    <div class="block mx-auto">
                        <img src="{{ asset('app/images/icon_map.png') }}" alt="" class="w-14">
                    </div>
                    <div class="w-full text-center block text-xl font-semibold text-gray-500">
                        <span>Adresse physique</span>
                    </div>
                    <div class="w-full text-center block font-semibold text-gray-400 text-base">
                        <span>7680, Avenue des Roches, Q/Ludo Golf, Lubumbashi</span>
                    </div>
                </div>

                <div class="flex flex-col gap-4 bg-white shadow-lg shadow-purple-100 rounded-md p-4">
                    <div class="block mx-auto">
                        <img src="{{ asset('app/images/icon_mail.png') }}" alt="" class="w-14">
                    </div>
                    <div class="w-full text-center block text-xl font-semibold text-gray-500">
                        <span>Adresse mail</span>
                    </div>
                    <div class="w-full text-center block font-semibold text-gray-400 text-base">
                        <span>info@karibukwako.com</span>
                    </div>
                </div>
            </div>
            <div class="py-10"></div>
            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
                <div class="relative lg:col-span-2  after:absolute after:w-1 after:rounded-full after:h-6 after:top-1.5 after:left-0 after:bg-purple-600">
                    <div class="flex flex-col pl-4 gap-5">
                        <h1 class="text-3xl font-semibold text-gray-500">Besoin d'aide ?</h1>
                        <p class="text-base font-normal text-gray-400">
                            Pour tout probleme, suggestion, laissez nous un message en completant ce formulaire.
                            Echangez avec vous est pour nous, un réel plaisir
                        </p>
                    </div>
                </div>
                <div class="bg-white shadow-2xl rounded-md p-4 sm:p-6 lg:p-12 col-span-1 lg:col-span-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="post" class="flex flex-col gap-4">
                        @csrf
                        <div class="flex flex-col gap-1.5">
                            <label for="username" class="text-lg font-medium text-gray-400">Nom complet</label>
                            <input
                                type="text"
                                placeholder="Votre nom complet"
                                name="username"
                                id="username"
                                value="{{ old('username') }}"
                                class="bg-gray-100 focus:bg-white text-sm font-normal text-gray-500 px-4 py-3 rounded-md border-[3px] border-gray-100 outline-none transition duration-300 focus:border-purple-400 focus:shadow-2xl focus:shadow-purple-200">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="email" class="text-lg font-medium text-gray-400">Adresse mail</label>
                            <input
                                type="email"
                                placeholder="Votre adresse email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                class="bg-gray-100 focus:bg-white text-sm font-normal text-gray-500 px-4 py-3 rounded-md border-[3px] border-gray-100 outline-none transition duration-300 focus:border-purple-400 focus:shadow-2xl focus:shadow-purple-200">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="subject" class="text-lg font-medium text-gray-400">Objet</label>
                            <input
                                type="text"
                                placeholder="Objet du message"
                                name="subject"
                                id="subject"
                                value="{{ old('subject') }}"
                                class="bg-gray-100 focus:bg-white text-sm font-normal text-gray-500 px-4 py-3 rounded-md border-[3px] border-gray-100 outline-none transition duration-300 focus:border-purple-400 focus:shadow-2xl focus:shadow-purple-200">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="message" class="text-lg font-medium text-gray-400">Message</label>
                            <textarea
                                name="message"
                                id="message"
                                class="bg-gray-100 focus:bg-white text-sm resize-none h-20 font-normal text-gray-500 px-4 py-3 rounded-md border-[3px] border-gray-100 outline-none transition duration-300 focus:border-purple-400 focus:shadow-2xl focus:shadow-purple-200">{{ old('message') }}</textarea>
                        </div>
                        <div class="flex">
                            <button class="md:w-4/12 text-center bg-gradient-to-tr from-green-400 to-purple-600 text-sm font-semibold px-6 text-white py-3 rounded-md">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
