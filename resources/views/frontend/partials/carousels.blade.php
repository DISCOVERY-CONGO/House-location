@if($sliders->count() > 0)
    <section class="w-full z-30 flex justify-center h-screen max-h-screen lg:max-h-[750px] lg:min-h-max overflow-hidden">
        <div class="w-full relative h-full max-w-screen-lg lg:max-w-screen-2xl px-0 lg:pt-24 lg:px-12 xl:px-16">
            <div class="relative h-full w-full">
                <div class="hidden invisible lg:visible lg:block uppercase text-6xl text-gray-50 absolute top-5 font-bold rotate-12">karibu kwako</div>
                <div class="hidden invisible lg:visible lg:block absolute bottom-4 opacity-25 -left-20 skew-x-6 rounded-3xl  w-40 h-80 bg-gradient-to-tr from-purple-600 to-green-400"></div>
                <div class="swiper homeSwiper h-full z-30 bg-gradient-to-tl from-gray-50">
                    <div class="swiper-wrapper h-full">
                        @foreach($sliders as $slide)
                            <div class="swiper-slide h-full px-4 xs:px-6 sm:px-10 lg:px-0">
                                <div class="h-full items-end pb-10 lg:pb-0 lg:items-center grid lg:grid-cols-2">
                                    <div class="w-full col-span-1 flex">
                                        <div class="flex flex-col gap-8 xl:gap-10 w-full lg:max-w-none max-w-2xl">
                                            <div class="flex flex-col gap-5 xl:gap-7">
                                                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-white lg:text-gray-600 z-40">
                                                    {{ ucfirst($slide->title) ?? "" }}
                                                </h1>
                                                <p class="text-md leading-loose md:text-base text-gray-100 lg:text-gray-500 lg:line-clamp-4 z-40 tracking-wide">
                                                    {{ ucfirst($slide->description) ?? "" }}
                                                </p>
                                            </div>
                                                <div class="flex sm:flex-row flex-col gap-4 z-40  pb-8 lg:pb-0">
                                                    <a href="{{ route('categories.index') }}"
                                                       class="w-full z-40 sm:w-auto flex items-center justify-center rounded-md px-5 py-2.5 bg-purple-[#e2d2f6] text-gray-600 transition border-2 border-purple-600 hover:border-purple-800 hover:text-white hover:bg-purple-800">
                                                        Trouver une maison
                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 absolute top-0 left-0 w-full lg:flex h-full items-center lg:relative">
                                        <div class="h-full w-full">
                                            <div class="absolute right-0 top-0 h-3/5 w-3/5 hidden lg:block rounded-tl-3xl rounded-br-3xl border border-purple-400 bg-purple-400"></div>

                                            <div class="w-full lg:pl-5 h-full relative lg:pt-4">
                                                <img
                                                    src="{{ asset('storage/'. $slide->images) }}"
                                                    alt="house illustration"
                                                    class="absolute right-0 lg:top-4 w-full h-full lg:w-[90%] z-20 lg:h-[calc(100%-30px)] object-cover lg:rounded-tl-3xl lg:rounded-br-3xl"
                                                    width="300">
                                                <div
                                                    class="absolute bg-gradient-to-t from-gray-900 lg:to-transparent z-30 right-0 lg:top-4 w-full h-full lg:w-[90%] lg:h-[calc(100%-30px)] lg:rounded-tl-3xl lg:rounded-br-3xl">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="absolute bottom-6 left-0 z-50 w-full lg:w-1/2">
                    <div class="flex items-center justify-between w-full lg:px-0 px-4 xs:px-6 sm:px-10">
                        <div class="flex items-center">
                            <div class="home-swiper-pagination flex items-center gap-2"></div>
                        </div>
                        <div class="flex gap-2">
                            <div class="swip-prev-homeslide z-500 p-3 transition hover:bg-purple-700 focus:bg-purple-500 rounded bg-purple-600 text-white lg:bg-white lg:shadow lg:text-gray-600 lg:hover:bg-gray-100 lg:focus:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </div>
                            <div class="swip-next-homeslide z-500 p-3 transition hover:bg-purple-700 focus:bg-purple-500 rounded bg-purple-600 text-white lg:bg-white lg:shadow lg:text-gray-600 lg:hover:bg-gray-100 lg:focus:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

