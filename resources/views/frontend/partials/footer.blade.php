@if(request()->getPathInfo() == '/users/users')
@else
    <footer class="mt-16 w-full py-16 bg-gray-100">
        <div class="lg:px-28 md:px-12">
            <div class="container m-auto space-y-8">
                <div class="flex justify-center items-center gap-4">
                    <a href="{{ route('home.index') }}" class="md:hidden lg:block text-xl font-semibold text-gray-700">
                        <img src="{{ asset('app/images/logo.png')  }}" class="h-12 sm:h-10 md:h-14" alt="">
                    </a>
                </div>
                info@karibu.com <br>
                7680, Avenue des Roches, Q/ Lido Golf
                <ul class="py-4 flex sm:flex-row flex-col sm:gap-8 gap-4 items-center justify-center">
                    <li><a href="{{ route('home.index') }}" class="hover:text-blue-500">Accueil</a></li>
                    <li><a href="{{ route('categories.index') }}" class="hover:text-blue-500">Catégories</a></li>
                    <li><a href="{{ route('location.index') }}" class="hover:text-blue-500">Carte</a></li>
                    <li><a href="{{ route('abouts.index') }}" class="hover:text-blue-500">A propos</a></li>
                    <li><a href="{{ route('abouts.index') }}" class="hover:text-blue-500">Place Event</a></li>
                    <li><a href="{{ route('abouts.index') }}" class="hover:text-blue-500">Discovery Congo</a></li>
                    <li><a href="{{ route('abouts.index') }}" class="hover:text-blue-500">Link DRC</a></li>
                </ul>

                <div class="text-center">
                    <span class="text-sm tracking-wide">Copyright &copy; Discovery Congo  {{ now()->format('Y') }} | Tous droits reservés</span>
                </div>
            </div>
        </div>
    </footer>
@endif
