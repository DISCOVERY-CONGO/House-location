<form action="{{ route('reservation.store') }}" method="post" class="w-full">
    @csrf
    <input
        type="hidden"
        name="apartment"
        value="{{ $apartment->id }}">
    <div class="flex flex-col gap-6 w-full">
        <h1 class="text-xl font-semibold text-gray-600">Reservation</h1>
        <div class="flex flex-col gap-4">
            <div class="relative">
                <input
                    id="username"
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    class="relative peer transition-all focus:border-purple-600 border-[3px] border-gray-200 outline-none rounded-xl px-4 py-3 w-full text-sm text-gray-400 placeholder-transparent"
                    placeholder="saisir votre nom"
                    required>
                <label
                    for="username"
                    class="absolute text-sm bg-white left-4 transition-all text-gray-400 peer-placeholder-shown:text-sm peer-focus:text-sm -top-3 peer-placeholder-shown:top-3.5 peer-focus:text-purple-600 peer-focus:px-1 peer-focus:-top-3">
                    Nom complet du client
                </label>
            </div>
            <div class="relative">
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="relative peer transition-all focus:border-purple-600 border-[3px] border-gray-200 outline-none rounded-xl px-4 py-3 w-full text-sm text-gray-400 placeholder-transparent"
                    placeholder="Saisir votre address email"
                    required>
                <label
                    for="email"
                    class="absolute text-sm bg-white left-4 transition-all text-gray-400 peer-placeholder-shown:text-sm peer-focus:text-sm -top-3 peer-placeholder-shown:top-3.5 peer-focus:text-purple-600 peer-focus:px-1 peer-focus:-top-3">
                    Adresse Mail
                </label>
            </div>
            <div class="relative">
                <input
                    id="phone_number"
                    type="text"
                    name="phone_number"
                    value="{{ old('phone_number') }}"
                    class="relative peer transition-all focus:border-purple-600 border-[3px] border-gray-200 outline-none rounded-xl px-4 py-3 w-full text-sm text-gray-400 placeholder-transparent"
                    placeholder="Saisir le numero de contact"
                    required>
                <label
                    for="phone_number"
                    class="absolute text-sm bg-white left-4 transition-all text-gray-400 peer-placeholder-shown:text-sm peer-focus:text-sm -top-3 peer-placeholder-shown:top-3.5 peer-focus:text-purple-600 peer-focus:px-1 peer-focus:-top-3">
                    Numero Telephone
                </label>
            </div>
            <div class="relative">
                <textarea
                    name="messages"
                    id="messages"
                    class="resize-none h-36 relative peer transition-all focus:border-purple-600 border-[3px] border-gray-200 outline-none rounded-xl px-4 py-3 w-full text-sm text-gray-400 placeholder-transparent"
                    required
                >{{ old('messages') }}</textarea>
                <label
                    for="messages"
                    class="absolute text-sm bg-white left-4 transition-all text-gray-400 peer-placeholder-shown:text-sm peer-focus:text-sm -top-3 peer-placeholder-shown:top-3.5 peer-focus:text-purple-600 peer-focus:px-1 peer-focus:-top-3">
                    Message
                </label>
            </div>

            <button class="px-4 py-3 rounded-xl text-white bg-gradient-to-br  from-green-400 to-purple-600 transition-all duration-300 hover:bg-gradient-to-br hover:from-purple-600 hover:to-green-400">
                Reserver
            </button>
        </div>
    </div>
</form>
