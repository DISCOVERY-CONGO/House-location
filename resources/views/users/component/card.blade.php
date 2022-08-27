@php use App\Enums\ReservationEnum;use App\Http\Controllers\Users\InvoiceUserController; @endphp
<turbo-frame id="messages">
    <div
        class="col-span-1 bg-white p-4 grid gap-4 rounded-xl border hover:shadow-lg hover:rounded-2xl hover:border-transparent group transition duration-200">
        <div class="h-32 max-h-32 md:h-44 md:max-h-44">
            <img
                src="{{ asset('storage/'.$reservation->house->images) }}"
                class="w-full h-full rounded-lg object-cover"
                title="{{ $reservation->district ?? "" }}"
                alt="{{ $reservation->town ?? "" }}">
        </div>
        <div class="flex justify-between">
            <h1 class="text-lg font-semibold text-gray-600">
                {{ ucfirst($reservation->house->commune) ?? "" }},
                {{ ucfirst($reservation->house->town) ?? "" }}
            </h1>
            <span class="text-gray-400">
                {{ $reservation->house->prices ?? 0 }} $ garantie
            </span>
        </div>
        <div>
            @if($reservation->status  == ReservationEnum::CONFIRMED_RESERVATION)
                <a href="#"
                   target="_blank"
                   class="w-full flex justify-between items-center text-center text-sm px-5 gap-2 py-3 rounded-lg bg-green-600 text-white">
                    <span>Telecharger la facture</span>
                </a>
            @else
                <div class="w-full flex">
                    <a
                        href="{{ route('users.reservation.cancel', $reservation->id) }}"
                        onclick="event.preventDefault(); document.getElementById('cancel-reservation').submit();"
                        class="w-full block text-center text-sm px-5 py-3 rounded-lg bg-orange-600 text-white">
                        Annuler
                    </a>
                </div>

                <form action="{{ route('users.reservation.cancel', $reservation->id) }}" method="POST"
                      id="cancel-reservation">
                    @method('DELETE')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            @endif
        </div>
    </div>
</turbo-frame>
