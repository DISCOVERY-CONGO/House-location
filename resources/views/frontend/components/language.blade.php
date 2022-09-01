<div data-langues class="flex relative flex-col w-full">
    <div data-fetch-selected-lang class="flex items-center gap-2 cursor-pointer">
        <img src="{{ asset('images/icons/flagfrance.svg') }}" alt="langue"  width="30" class="h-auto w-5"/>
        <h3 class="text-lg text-gray-600 xl:flex">Fr</h3>
    </div>
    <div data-langues-listbox class="w-64 min-w-max origin-bottom bg-white shadow-lg py-3 absolute top-[calc(100%+10px)] right-0 invisible transition-all duration-300 translate-y-5 opacity-0">
        <div class="w-full flex flex-col min-w-max">
            @foreach($available_locales as $locale_name => $available_locale)
                @if($available_locale === $current_locale)
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
                            class="text-base text-gray-600">{{ $locale_name }}</h3>
                    </div>
                    <span class="ml-2 mr-2 text-gray-700"></span>
                @else
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
                        <a
                            href="language/{{ $available_locale }}"
                            lang-name
                            class="text-base text-gray-600">{{ $locale_name }}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
