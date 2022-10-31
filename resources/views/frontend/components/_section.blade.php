@if($apartments->count() > 0)
    <section class="lg:px-28 md:px-12 px-6 w-full overflow-hidden">
        <div class="overflow-hidden md:mx-0 relative">
            <div class="container mx-auto py-8 overflow-hidden">
                <div class="w-full h-auto rounded-2xl overflow-hidden md:h-full grid lg:grid-cols-12 lg:grid-rows-2 gap-2.5">
                    <div class="relative lg:col-span-6 col-span-12 lg:row-span-2 h-[40vh] lg:h-[31rem] md:h-[25rem] group transition">
                        <div class="absolute z-10 right-2 top-2 group opacity-0 group-hover:opacity-100 transition">
                            <label role="button" for="like" class="h-10 w-10 flex justify-center items-center rounded-full bg-gray-800 bg-opacity-75 backdrop-blur-lg cursor-pointer group active:scale-90 transition">
                                <input hidden type="checkbox" name="like" id="like" class="peer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto scale-75 opacity-0 text-pink-500 peer-checked:scale-100 peer-checked:opacity-100 transition ease-in" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto text-white peer-checked:opacity-0 transition" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </label>
                        </div>
                        <div class="absolute bottom-0 w-full h-full">
                            <div class="h-full sm:p-8 p-4 pt-2 flex items-end lg:rounded-l-2xl md:rounded-tl-2xl md:rounded-r-none rounded-2xl bg-gradient-to-t from-gray-900 overflow-hidden">
                                <div class="w-full translate-y-24 group-hover:translate-y-0 transition duration-500">
                                    <div class="md:flex justify-between pb-8">
                                        <div>
                                            <h4 class="text-xl text-white font-semibold">
                                                {{ $apartments[0]->address->address ?? "" }}
                                            </h4>
                                            <span class="text-sm text-gray-200">
                                                A 56 minutes de votre position actuelle.
                                            </span>
                                        </div>

                                        <div class="md:mt-0 mt-4">
                                            <h3 class="text-3xl md:text-right font-bold text-purple-400">{{ $apartments[0]->prices ?? "" }} $</h3>
                                            <span class="text-xs text-gray-200">{{ $apartments[0]->guarantees ?? "" }} $ Garantie</span>
                                        </div>
                                    </div>
                                    <div class="relative pt-4 flex gap-2 before:absolute before:w-[60%] before:right-0 before:top-0 before:h-[1px] before:bg-gray-500 before:rounded-full">

                                        <div class="translate-y-8 group-hover:translate-y-0 transition delay-150 duration-300 ease-in-out">
                                            <a href="{{ route('house.show', $apartments[0]->id ) }}" class="block w-max py-2 px-6 border border-gray-600 text-white rounded-full hover:border-transparent hover:bg-white hover:text-purple-700 focus:bg-white focus:text-purple-700 active:scale-95 transition">
                                                <span class="text-sm font-medium tracking-wide">Savoir plus</span>
                                            </a>
                                        </div>
                                        <div class="translate-y-16 group-hover:translate-y-0 transition delay-200 duration-300 ease-in-out">
                                            <a href="tel:{{ $apartments[0]->phoneNumber ?? "" }}" aria-label="call" class="w-10 h-10 flex items-center rounded-full bg-purple-600 bg-opacity-0 hover:border-transparent hover:bg-opacity-30 focus:bg-opacity-40 active:scale-95 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 m-auto text-purple-300" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="translate-y-32 group-hover:translate-y-0 transition delay-300 duration-300 ease-in-out">
                                            <button title="Partager" class=" block w-10 h-10 rounded-full bg-purple-600 bg-opacity-0 hover:border-transparent hover:bg-opacity-30 focus:bg-opacity-40 active:scale-95 transition">
                                                <svg viewBox="0 0 1200 1130" fill="none" class="w-4 m-auto fill-current text-purple-300" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M754.553 0V294.208C487.317 294.216 0 297.148 0 1129.94C55.25 573.04 309.061 569.538 754.553 569.532V890.824L1200 445.377L754.553 0Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('storage/'. $apartments[0]->images) }}" class="w-full h-full object-cover rounded-none" alt="{{ $apartments[0]->commune }}">
                    </div>

                    <div class="grid col-span-12  lg:col-span-6 lg:row-span-2 md:grid-cols-2 gap-2.5 overflow-hidden">
                        <div class="relative col-span-1 row-span-1 lg:h-60 group transition">
                            <div class="absolute z-10 right-2 top-2 group opacity-0 group-hover:opacity-100 transition">
                                <label role="button" for="like2" class="h-10 w-10 flex justify-center items-center rounded-full bg-gray-800 bg-opacity-75 backdrop-blur-lg cursor-pointer group active:scale-90 transition">
                                    <input hidden type="checkbox" name="like2" id="like2" class="peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto scale-75 opacity-0 text-pink-500 peer-checked:scale-100 peer-checked:opacity-100 transition ease-in" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto text-white peer-checked:opacity-0 transition" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                </label>
                            </div>
                            <div class="absolute bottom-0 w-full h-full">
                                <div class="h-full sm:p-6 p-4 pt-2 lg:rounded-none md:rounded-tr-2xl md:rounded-b-none md:rounded-tl-none rounded-2xl flex items-end bg-gradient-to-t from-gray-900 overflow-hidden">
                                    <div class="w-full translate-y-24 group-hover:translate-y-0 transition duration-500">
                                        <div class="pb-8">
                                            <h4 class="mb-4 text-lg text-white font-semibold">{{ $apartments[1]->address->address ?? "" }}</h4>
                                            <div class="flex items-end gap-2">
                                                <h3 class="text-2xl font-bold text-purple-400">{{ $apartments[1]->prices }} $</h3>
                                                <div class="text-xs tracking-wide text-gray-300">
                                                    <span class="block">/ Mois</span>
                                                    <span class="block">{{ $apartments[1]->guarantees ?? 0 }} $ Garantie</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative pt-4 flex gap-2 group-hover:-mt-4 transition">
                                            <div class="translate-y-8 group-hover:translate-y-0 transition delay-150 duration-300 ease-in-out">
                                                <a href="{{ route('house.show', $apartments[1]->id ) }}" class="block w-max py-2 px-6 border border-gray-600 text-white rounded-full hover:border-transparent hover:bg-white hover:text-purple-700 focus:bg-white focus:text-purple-700 active:scale-95 transition">
                                                    <span class="text-sm font-medium tracking-wide">Savoir plus</span>
                                                </a>
                                            </div>
                                            <div class="translate-y-16 group-hover:translate-y-0 transition delay-200 duration-300 ease-in-out">
                                                <a href="tel:{{ $apartments[1]->phoneNumber ?? 0 }}" aria-label="call" class="w-10 h-10 flex items-center rounded-full bg-purple-600 bg-opacity-0 hover:border-transparent hover:bg-opacity-30 focus:bg-opacity-40 active:scale-95 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 m-auto text-purple-300" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="translate-y-32 group-hover:translate-y-0 transition delay-300 duration-300 ease-in-out">
                                                <button title="Partager" class=" block w-10 h-10 rounded-full bg-purple-600 bg-opacity-0 hover:border-transparent hover:bg-opacity-30 focus:bg-opacity-40 active:scale-95 transition">
                                                    <svg viewBox="0 0 1200 1130" fill="none" class="w-4 m-auto fill-current text-purple-300" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M754.553 0V294.208C487.317 294.216 0 297.148 0 1129.94C55.25 573.04 309.061 569.538 754.553 569.532V890.824L1200 445.377L754.553 0Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('storage/'.$apartments[1]->images) }}" class="w-full h-full object-cover rounded-none" alt="{{ $apartments[1]->commune }}">
                        </div>

                        <div class="relative col-span-1 row-span-1 lg:h-60 group transition">
                            <div class="absolute z-10 right-2 top-2 group opacity-0 group-hover:opacity-100 transition">
                                <label role="button" for="like4" class="h-10 w-10 flex justify-center items-center rounded-full bg-gray-800 bg-opacity-75 backdrop-blur-lg cursor-pointer group active:scale-90 transition">
                                    <input hidden type="checkbox" name="like4" id="like4" class="peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto scale-75 opacity-0 text-pink-500 peer-checked:scale-100 peer-checked:opacity-100 transition ease-in" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto text-white peer-checked:opacity-0 transition" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                </label>
                            </div>
                            <div class="absolute bottom-0 w-full h-full">
                                <div class="h-full sm:p-6 p-4 pt-2 flex items-end lg:rounded-tr-2xl md:rounded-none rounded-2xl bg-gradient-to-t from-gray-900 overflow-hidden">
                                    <div class="w-full translate-y-24 group-hover:translate-y-0 transition duration-500">
                                        <div class="pb-8">
                                            <h4 class="mb-4 text-lg text-white font-semibold">{{ $apartments[0]->address->address ?? "" }}</h4>

                                            <div class="flex items-end gap-2">
                                                <h3 class="text-2xl font-bold text-purple-400">{{ $apartments[0]->prices ?? "" }} $</h3>
                                                <div class="text-xs tracking-wide text-gray-300">
                                                    <span class="block">/ Mois</span>
                                                    <span class="block">{{ $apartments[0]->guarantees ?? 0 }} $ Garantie</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative pt-4 flex gap-2 group-hover:-mt-4 transition">
                                            <div class="translate-y-8 group-hover:translate-y-0 transition delay-150 duration-300 ease-in-out">
                                                <a href="{{ route('house.show', $apartments[0]->id ) }}" class="block w-max py-2 px-6 border border-gray-600 text-white rounded-full hover:border-transparent hover:bg-white hover:text-purple-700 focus:bg-white focus:text-purple-700 active:scale-95 transition">
                                                    <span class="text-sm font-medium tracking-wide">Savoir plus</span>
                                                </a>
                                            </div>
                                            <div
                                                class="translate-y-16 group-hover:translate-y-0 transition delay-200 duration-300 ease-in-out">
                                                <a href="tel:{{ $apartments[0]->phoneNumber ?? 0 }}" aria-label="call" class="w-10 h-10 flex items-center rounded-full bg-purple-600 bg-opacity-0 hover:border-transparent hover:bg-opacity-30 focus:bg-opacity-40 active:scale-95 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 m-auto text-purple-300" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="translate-y-32 group-hover:translate-y-0 transition delay-300 duration-300 ease-in-out">
                                                <button title="Partager" class=" block w-10 h-10 rounded-full bg-purple-600 bg-opacity-0 hover:border-transparent hover:bg-opacity-30 focus:bg-opacity-40 active:scale-95 transition">
                                                    <svg viewBox="0 0 1200 1130" fill="none" class="w-4 m-auto fill-current text-purple-300" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M754.553 0V294.208C487.317 294.216 0 297.148 0 1129.94C55.25 573.04 309.061 569.538 754.553 569.532V890.824L1200 445.377L754.553 0Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('storage/'.$apartments[0]->images) }}" class="w-full h-full object-cover" alt="{{ $apartments[0]->address ?? "0" }}">
                        </div>

                        <div class="relative hidden lg:grid col-span-1 row-span-1 lg:h-60 group transition">
                            <div class="absolute z-10 right-2 top-2 group opacity-0 group-hover:opacity-100 transition">
                                <label role="button" for="like" class="h-10 w-10 flex justify-center items-center rounded-full bg-gray-800 bg-opacity-75 backdrop-blur-lg cursor-pointer group active:scale-90 transition">
                                    <input hidden type="checkbox" name="like" id="like" class="peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto scale-75 opacity-0 text-pink-500 peer-checked:scale-100 peer-checked:opacity-100 transition ease-in" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto text-white peer-checked:opacity-0 transition" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                </label>
                            </div>
                            <div class="absolute bottom-0 w-full h-full">
                                <div class="h-full sm:p-6 p-4 pt-2 lg:rounded-none md:rounded-bl-2xl md:rounded-t-none md:rounded-br-none rounded-2xl flex items-end bg-gradient-to-t from-gray-900 overflow-hidden">
                                    <div class="w-full translate-y-24 group-hover:translate-y-0 transition duration-500">
                                        <div class="pb-8">
                                            <h4 class="mb-4 text-lg text-white font-semibold">
                                                {{ $apartments[0]->address->address ?? 0 }}
                                            </h4>
                                            <div class="flex items-end gap-2">
                                                <h3 class="text-2xl font-bold text-purple-400">{{ $apartments[0]->prices ?? 0 }} $</h3>
                                                <div class="text-xs tracking-wide text-gray-300">
                                                    <span class="block">/ Mois</span>
                                                    <span class="block">{{ $apartments[0]->guarantees ?? 0 }} $ Garantie</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative pt-4 flex gap-2 group-hover:-mt-4 transition">
                                            <div class="translate-y-8 group-hover:translate-y-0 transition delay-150 duration-300 ease-in-out">
                                                <a href="{{ route('house.show', $apartments[0]->id ) }}" title="En savoir plus" class="block w-max py-2 px-6 border border-gray-600 text-white rounded-full hover:border-transparent hover:bg-white hover:text-purple-700 focus:bg-white focus:text-purple-700 active:scale-95 transition">
                                                    <span class="text-sm font-medium tracking-wide">Savoir plus</span>
                                                </a>
                                            </div>
                                            <div class="translate-y-16 group-hover:translate-y-0 transition delay-200 duration-300 ease-in-out">
                                                <a href="tel:{{ $apartments[0]->phoneNumber ?? 0 }}" aria-label="call" class="w-10 h-10 flex items-center rounded-full bg-purple-600 bg-opacity-0 hover:border-transparent hover:bg-opacity-30 focus:bg-opacity-40 active:scale-95 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 m-auto text-purple-300" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="translate-y-32 group-hover:translate-y-0 transition delay-300 duration-300 ease-in-out">
                                                <button title="Partager" class=" block w-10 h-10 rounded-full bg-purple-600 bg-opacity-0 hover:border-transparent hover:bg-opacity-30 focus:bg-opacity-40 active:scale-95 transition">
                                                    <svg viewBox="0 0 1200 1130" fill="none" class="w-4 m-auto fill-current text-purple-300" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M754.553 0V294.208C487.317 294.216 0 297.148 0 1129.94C55.25 573.04 309.061 569.538 754.553 569.532V890.824L1200 445.377L754.553 0Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('storage/'. $apartments[0]->images) }}"
                                 class="w-full h-full object-cover"
                                 alt="{{ $apartments[0]->commune  }}">
                        </div>

                        <div class="relative hidden lg:grid col-span-1 row-span-1 lg:h-60 group transition">
                            <div class="absolute z-10 right-2 top-2 group opacity-0 group-hover:opacity-100 transition">
                                <label role="button" for="like5" class="h-8 w-8 flex justify-center items-center rounded-full bg-gray-800 bg-opacity-75 backdrop-blur-lg cursor-pointer group active:scale-90 transition">
                                    <input hidden type="checkbox" name="like5" id="like5" class="peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto scale-75 opacity-0 text-pink-500 peer-checked:scale-100 peer-checked:opacity-100 transition ease-in" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute w-5 m-auto text-white peer-checked:opacity-0 transition" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                </label>
                            </div>
                            <div class="absolute bottom-0 w-full h-full">
                                <div class="h-full p-4 pt-2 md:rounded-br-2xl md:rounded-t-none md:rounded-bl-none rounded-2xl flex items-end bg-gradient-to-t from-gray-900 overflow-hidden">
                                    <div class="w-full translate-y-24 group-hover:translate-y-0 transition duration-500">
                                        <div class="pb-8">
                                            <h6 class="mb-4 text-base text-white font-semibold">
                                                {{ $apartments[1]->address->address ?? "" }}
                                            </h6>

                                            <div class="flex items-end gap-2">
                                                <h3 class="text-2xl font-bold text-purple-400">{{ $apartments[1]->prices ?? "" }} $</h3>
                                                <div class="text-xs tracking-wide text-gray-300">
                                                    <span class="block">/ Mois</span>
                                                    <span class="block">{{ $apartments[1]->guarantees ?? "" }} $ Garantie</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative pt-4 flex gap-4 group-hover:-mt-4 transition">
                                            <div class="translate-y-8 group-hover:translate-y-0 transition delay-150 duration-300 ease-in-out">
                                                <a href="{{ route('house.show', $apartments[1]->id ) }}"
                                                    class="block w-max py-2 px-6 border border-gray-600 text-white rounded-full hover:border-transparent hover:bg-white hover:text-purple-700 focus:bg-white focus:text-purple-700 active:scale-95 transition">
                                                    <span class="text-sm font-medium tracking-wide">Savoir plus</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('storage/'. $apartments[1]->images ) }}"
                                 class="w-full h-full object-cover"
                                 alt="{{ $apartments[1]->commune ?? "" }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
