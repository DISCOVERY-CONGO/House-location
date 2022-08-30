<header
    aria-label="navbar"
    class="w-full flex items-center justify-center  bg-white z-800 absolute top-0 left-0 border-b border-b-gray-200">
    <div class="w-full relative max-w-screen-lg lg:max-w-screen-2xl px-4 xs:px-6 sm:px-10 lg:px-12 xl:px-16 py-3">
        <nav class="w-full flex items-center justify-between">
            <div class="flex gap-4 items-center">
                <div
                    data-toggle-navigation
                    role="button"
                    aria-label="humburger"
                    id="hamburger"
                    class="lg:hidden relative transition-all py-3 pr-3 border-r border-r-gray-200  z-800">
                    <div
                        role="hidden"
                        id="line"
                        class="mx-auto z-800 h-0.5 w-6 rounded bg-gray-600 transition duration-300 "></div>
                    <div
                        role="hidden"
                        id="line2"
                        class="mx-auto z-800 mt-2 h-0.5 w-6 rounded bg-gray-600 transition duration-300 ">
                    </div>
                </div>
                <a href="{{ route('home.index') }}" class="sm:flex hidden">
                    <img src="{{ asset('app/images/logo.png') }}" alt="Karibukwako" width="100" class="w-auto h-10">
                </a>
            </div>
            <div
                data-overlay-navigation aria-istoggle="false"
                class="lg:hidden lg:invisible visible h-full hidden w-full fixed top-16 left-0 bg-gray-600 bg-opacity-50 z-780">
            </div>
            <div
                data-navigation
                class="flex lg:relative absolute left-0 lg:w-max w-full  lg:translate-x-0 -translate-y-full lg:-translate-y-0 lg:bg-transparent bg-white z-800 lg:px-0  px-4 xs:px-6 sm:px-10 transition-all duration-300" role="navigation">
                <ul class="flex flex-col lg:flex-row lg:items-center lg:gap-4 lg:w-max w-full">
                    @include('frontend.components._link', [
                         'title' => "Accueil",
                         'route' => route('home.index'),
                         'name' => "Accueil"
                    ])
                    @include('frontend.components._link', [
                        'title' => "Categories",
                        'route' => route('categories.index'),
                        'name' => "Categories"
                    ])
                    @include('frontend.components._link', [
                        'title' => "Cartes",
                        'route' => route('location.index'),
                        'name' => "Cartes"
                    ])

                    @include('frontend.components._link', [
                        'title' => "Contact",
                        'route' => route('contact.index'),
                        'name' => "Contact"
                    ])
                </ul>
            </div>
            <div class="flex items-center gap-2">
                <div class="flex items-center gap-2">
                    <div class="flex items-center">
                        <div data-langues class="flex relative flex-col w-full">
                            <div data-fetch-selected-lang class="flex items-center gap-2 cursor-pointer">
                                <img src="{{ asset('images/icons/flagfrance.svg') }}" alt="langue"  width="30" class="h-auto w-5"/>
                                <h3 class="text-lg text-gray-600 xl:flex">Fr</h3>
                            </div>
                            <div data-langues-listbox class="w-64 min-w-max origin-bottom bg-white shadow-lg py-3 absolute top-[calc(100%+10px)] right-0 invisible transition-all duration-300 translate-y-5 opacity-0">
                                <div class="w-full flex flex-col min-w-max">
                                    <div
                                        langue-abbrev="fr"
                                        default-lang
                                        data-lang
                                        class="min-w-max flex cursor-pointer items-center gap-3 px-5 py-2 transition hover:bg-gray-100 text-gray-600">
                                        <img
                                            lang-img
                                            src="{{ asset('images/icons/flagfrance.svg') }}"
                                            alt="langue name"
                                            width="30"
                                            class="h-auto w-5">
                                        <h3
                                            lang-name
                                            class="text-base text-gray-600">Francais</h3>
                                    </div>
                                    <div
                                        langue-abbrev="eng"
                                        data-lang
                                        class="min-w-max flex cursor-pointer items-center gap-3 px-5 py-2 transition hover:bg-gray-100 text-gray-600">
                                        <img
                                            lang-img
                                            src="{{ asset('images/icons/flagusa.svg') }}"
                                            alt="langue name"
                                            width="30"
                                            class="h-auto w-5">
                                        <h3
                                            lang-name
                                            class="text-base text-gray-600">Anglais</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-toggle-search
                         class="relative flex items-center gap-3 rounded-full md:rounded-md p-2.5 cursor-pointer border-2 border-gray-200 bg-gray-100 text-gray-600">
                            <span class="flex text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd" />
                                </svg>
                            </span>
                    </div>
                </div>
                <div class="flex items-center relative">
                    <input
                        type="checkbox"
                        name="toggleProfileBox"
                        id="toggleProfileBox"
                        class="hidden invisible peer">
                    <label
                        for="toggleProfileBox"
                        role="button"
                        class="hidden md:flex border-2 border-purple-200 items-center gap-2 px-5 py-2.5 bg-gradient-to-tr from-green-400 to-purple-600 hover:bg-gradient-to-tr hover:from-green-600 hover:to-purple-800 transition-all duration-300 text-white rounded-md">
                        <span>Connexion</span>
                        <span class="peer-checked:rotate-6">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                            </svg>
                        </span>
                    </label>
                    <label for="toggleProfileBox" role="button"
                           class="md:hidden border-2 border-purple-200 items-center rounded-full">
                        <img src="{{ asset('app/images/logo.svg') }}" width="100" class="w-10 h-10 rounded-full"
                             alt="avatar">
                    </label>
                    <div class="absolute right-0 top-[calc(100%+10px)] z-780 transition-all duration-500 invisible opacity-0 -translate-y-6 peer-checked:-translate-y-0 peer-checked:opacity-100 peer-checked:visible w-40 bg-white border border-gray-100 shadow-lg shadow-gray-200 border-t-4 border-t-gray-200 rounded-md py-3">
                        <ul class="flex w-full flex-col">
                            @auth
                                @if(auth()->user()->role_id == \App\Enums\UserRoleEnum::USERS_ROLE)
                                    <a href="{{ route('users.users.index') }}"
                                       class="flex w-full items-center px-6 py-2.5 transition hover:bg-gray-100 text-gray-600">
                                        Profile
                                    </a>
                                    <a
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="flex w-full items-center px-6 py-2.5 transition hover:bg-gray-100 text-gray-600">
                                        Deconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('register') }}"
                                   class="flex w-full items-center px-6 py-2.5 transition hover:bg-gray-100 text-gray-600">
                                    S'inscrire
                                </a>
                                <a href="{{ route('login') }}"
                                   class="flex w-full items-center px-6 py-2.5 transition hover:bg-gray-100 text-gray-600">
                                    Se connecter
                                </a>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
