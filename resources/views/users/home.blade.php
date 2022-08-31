@extends('frontend.layouts.app')

@section('title')
    Profile Utilisateur
@endsection

@section('content')

    @include('users.component._update')

    <div class="w-full flex justify-center overflow-hidden">
        <div class="w-full max-w-screen-lg lg:max-w-screen-2xl px-4 xs:px-6 sm:px-10 lg:px-12 xl:px-16">
            <div class="flex pt-20 lg:min-h-screen gap-5 lg:flex-row">
                <div class="w-full flex lg:flex-row flex-col min-h-screen">
                    <div
                        class="sticky top-0 lg:w-56 lg:min-w-[16rem] w-full lg:h-screen h-14 overflow-hidden lg:border-r lg:pr-3 lg:border-gray-200 border-b border-b-gray-200 lg:border-b-0">
                        <ul class="flex w-full lg:flex-col flex-row gap-4 lg:pt-5 overflow-x-auto lg:overflow-hidden">
                            <li>
                                <a
                                    href="#"
                                    class="isActiveLinkProfile flex lg:w-full lg:px-4 py-2 relative after:absolute after:w-full after:h-1 after:rounded-t-full after:bottom-0 after:left-0 lg:after:top-1/2 lg:after:-translate-y-1/2 lg:after:rounded-r-full lg:after:rounded-bl-none lg:rounded-tl-none text-sm min-w-max lg:after:w-1 lg:after:h-full">
                                    Tout
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="flex lg:w-full lg:px-4 py-2 relative after:absolute after:w-full after:h-1 after:rounded-t-full after:bottom-0 after:left-0 lg:after:top-1/2 lg:after:-translate-y-1/2 lg:after:rounded-r-full lg:after:rounded-bl-none lg:rounded-tl-none text-sm min-w-max lg:after:w-1 lg:after:h-full">
                                    Reservations effectuees
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="flex lg:w-full lg:px-4 py-2 relative after:absolute after:w-full after:h-1 after:rounded-t-full after:bottom-0 after:left-0 lg:after:top-1/2 lg:after:-translate-y-1/2 lg:after:rounded-r-full lg:after:rounded-bl-none lg:rounded-tl-none text-sm min-w-max lg:after:w-1 lg:after:h-full">
                                    Reservations en attente
                                </a>
                            </li>
                        </ul>
                        @php
                            $client = \App\Models\Client::query()
                                ->where('user_id', '=', auth()->id())
                                ->firstOrFail();
                            $notifications = $client->unreadNotifications
                        @endphp
                    </div>
                    <div class="flex flex-col gap-10 w-full h-full min-h-screen py-4 lg:px-5 md:pr-5">
                        <div class="flex flex-col gap-6">
                            @foreach($notifications as $notification)
                                @if($notification->type == "App\Notifications\ReservationNotification")
                                    <div class="bg-green-100 rounded-lg py-2 px-4 text-base text-green-700 inline-flex items-center w-full" role="alert">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                        </svg>
                                        <a href="" class="bg-none position-absolute">
                                            <strong class="mr-1">[[ {{ $notification->created_at }} ]]</strong> Votre reservation a ete confirmer.
                                        </a>
                                    </div>
                                @else
                                    <div class="bg-red-100 rounded-lg py-2 px-4 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                        </svg>
                                        <a href="" class="bg-none position-absolute">
                                            <strong class="mr-1">[[ {{ $notification->created_at }} ]]</strong> Votre reservation a ete supprimer par faute de confirmation.
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                            <div class="flex">
                                <h2 class="text-xl font-semibold ">Mes reservations</h2>
                            </div>
                            <div class="grid sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-2">
                                @foreach($reservations as $reservation)
                                    @include('users.component.card', with($reservation))
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky top-0 lg:w-56 md:min-w-[16rem] w-full md:border-l md:border-l-gray-200 md:pl-3 h-screen max-h-screen">
                    <div class="pt-4 flex flex-col">
                        <div class="flex flex-col gap-2 z-40">
                            <div class="relative flex justify-center p-6 pb-3 z-40">

                                <div
                                    class="absolute flex items-center justify-center right-2.5 top-2.5 w-10 h-10 z-40 rounded-full  bg-white shadow-2xl">
                                    <button id="editProfile"
                                            class="outline-none w-full h-full rounded-md flex items-center justify-center bg-gradient-to-tr from-green-400 to-purple-600 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd"
                                                  d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="relative block p-1 bg-white rounded-full z-50">
                                    @if(auth()->user()->images)
                                        <img
                                            src="{{ asset('storage/'.auth()->user()->images) }}"
                                            alt="avatar"
                                            class="min-h-[8rem] min-w-[8rem] w-32 h-32 object-cover sm:w-32 sm:h-32 rounded-full z-10">
                                    @else
                                        <img
                                            src="{{ asset('images/woman.jpg') }}"
                                            alt="avatar"
                                            class="min-h-[8rem] min-w-[8rem] w-32 h-32 object-cover sm:w-32 sm:h-32 rounded-full z-10">
                                    @endif

                                    <div class="absolute z-30 flex items-center justify-center right-0 bottom-6 w-10 h-10 rounded-full  bg-white shadow-2xl">
                                        <button
                                            id="editImage"
                                            class="outline-none w-full z-30 h-full rounded-full flex items-center justify-center text-purple-600 transition-all duration-300 hover:bg-gradient-to-tr hover:from-green-400 hover:to-purple-600 hover:text-white">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5"
                                                viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
