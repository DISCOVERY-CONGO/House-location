@extends('frontend.layouts.app')

@section('title', "Les apartements par categorie")

@section('content')
    <div class="w-full flex justify-center overflow-hidden pt-20">
        <div class="relative w-full max-w-screen-lg lg:max-w-screen-2xl px-4 xs:px-6 sm:px-10 lg:px-12 xl:px-16">
            <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8 pt-10">
                <div class="col-span-1 xl:col-span-2">
                    <div class="max-w-[570px] mb-12 lg:mb-0 flex flex-col gap-9">
                        <div class="flex flex-col gap-6">
                            <h2 class="flex text-gray-600 font-bold text-3xl md:text-4xl lg:text-5xl leading-snug ">
                                Prendre contact avec nous
                            </h2>
                            <p class="text-sm md:text-base leading-relaxed">
                                Vous avez un probleme ou une suggestion veillez nous laissez un message en utilisant notre mail ou nous appeler direction a partir de notre numero
                            </p>
                        </div>
                        <div class="flex w-full flex-col gap-8">
                            <div class="flex max-w-sm w-full gap-6">
                                <div class="max-w-[2rem] sm:max-w-[3rem] w-full
                                h-[2rem] sm:h-[3rem] flex items-center justify-center
                                overflow-hidden bg-purple-600 bg-opacity-5 text-purple-600 rounded ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h4 class="font-bold text-gray-600 text-xl mb-1">Adresse physique</h4>
                                    <p class="text-base text-gray-500">
                                        Golf Lido, Avenue Des Roches au croisement avec Bd Kilwa
                                    </p>
                                </div>
                            </div>

                            <div class="flex max-w-sm w-full gap-6">
                                <div class="max-w-[2rem] sm:max-w-[3rem] w-full
                                h-[2rem] sm:h-[3rem] flex items-center justify-center
                                overflow-hidden bg-purple-600 bg-opacity-5 text-purple-600 rounded ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h4 class="font-bold text-gray-600 text-xl mb-1">Numero telephone</h4>
                                    <p class="text-base text-gray-500">
                                        +243990416691
                                    </p>
                                </div>
                            </div>

                            <div class="flex max-w-sm w-full gap-6">
                                <div class="max-w-[2rem] sm:max-w-[3rem] w-full
                                h-[2rem] sm:h-[3rem] flex items-center justify-center
                                overflow-hidden bg-purple-600 bg-opacity-5 text-purple-600 rounded ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M2.94 6.412A2 2 0 002 8.108V16a2 2 0 002 2h12a2 2 0 002-2V8.108a2 2 0 00-.94-1.696l-6-3.75a2 2 0 00-2.12 0l-6 3.75zm2.615 2.423a1 1 0 10-1.11 1.664l5 3.333a1 1 0 001.11 0l5-3.333a1 1 0 00-1.11-1.664L10 11.798 5.555 8.835z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h4 class="font-bold text-dark text-xl mb-1">
                                        Adresse mail
                                    </h4>
                                    <p class="text-base text-body-color">info@karibukwako.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 w-full">
                    <div class="bg-white w-full relative rounded-lg p-5 m-3 sm:p-10 sm:m-6 shadow-lg">
                        <form class="w-full flex flex-col gap-6">
                            <div class="w-full flex">
                                <input type="text" placeholder="John Kat"
                                       class="w-full rounded py-3 px-5 text-gray-600 text-base border border-gray-100 outline-none focus-visible:shadow-none focus:border-purple-600 " />
                            </div>
                            <div class="w-full flex">
                                <input type="email" placeholder="johndoe@gmail.com"
                                       class="w-full rounded py-3 px-5 text-gray-600 text-base border border-gray-100 outline-none focus-visible:shadow-none focus:border-purple-600 " />
                            </div>
                            <div class="w-full flex">
                                <input type="text" placeholder="+243 97 24 44 966"
                                       class="w-full rounded py-3 px-5 text-gray-600 text-base border border-gray-100 outline-none focus-visible:shadow-none focus:border-purple-600 " />
                            </div>
                            <div class="w-full flex">
                                <textarea placeholder="Dites quelque chose"
                                          class="h-44 w-full rounded py-3 px-5 text-gray-600 text-base border border-gray-100 resize-none outline-none focus-visible:shadow-none focus:border-purple-600"></textarea>
                            </div>
                            <div>
                                <button type="submit"
                                        class="w-full  text-white bg-purple-600 rounded border-2 border-purple-600 py-3 px-6 transition hover:bg-opacity-90 ">
                                    Envoyer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
