@extends('frontend.layouts.auth')

@section('title')
    Authentification
@endsection

@section('content')
    <div class="flex flex-col gap-4">
        <div class="flex justify-center">
            <a href="{{ route('home.index') }}" class="flex items-center gap-2">
                <div class="block overflow-hidden ">
                    <img src="{{ asset('app/images/logo.png')  }}" alt="logo" class="h-16">
                </div>
                <div class="hidden small:grid text-lg font-bold">
                    <svg class=" h-8" viewBox="0 0 134 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M0.648 9.336C0.648 8.296 0.84 7.28 1.224 6.288C1.608 5.28 2.168 4.368 2.904 3.552C3.64 2.736 4.536 2.088 5.592 1.608C6.648 1.112 7.848 0.863999 9.192 0.863999C10.792 0.863999 12.176 1.208 13.344 1.896C14.528 2.584 15.408 3.48 15.984 4.584L12.96 6.696C12.704 6.088 12.36 5.616 11.928 5.28C11.512 4.944 11.048 4.712 10.536 4.584C10.04 4.44 9.56 4.368 9.096 4.368C8.344 4.368 7.688 4.52 7.128 4.824C6.568 5.112 6.104 5.504 5.736 6C5.368 6.496 5.096 7.048 4.92 7.656C4.744 8.264 4.656 8.872 4.656 9.48C4.656 10.152 4.76 10.8 4.968 11.424C5.176 12.048 5.472 12.6 5.856 13.08C6.256 13.56 6.736 13.944 7.296 14.232C7.856 14.504 8.472 14.64 9.144 14.64C9.624 14.64 10.112 14.56 10.608 14.4C11.104 14.24 11.56 13.992 11.976 13.656C12.408 13.304 12.736 12.848 12.96 12.288L16.176 14.184C15.84 15.016 15.288 15.728 14.52 16.32C13.752 16.912 12.88 17.368 11.904 17.688C10.944 17.992 9.992 18.144 9.048 18.144C7.816 18.144 6.68 17.896 5.64 17.4C4.616 16.888 3.728 16.216 2.976 15.384C2.24 14.536 1.664 13.592 1.248 12.552C0.848 11.496 0.648 10.424 0.648 9.336ZM25.3851 18.144C24.1051 18.144 22.9451 17.904 21.9051 17.424C20.8811 16.928 19.9931 16.272 19.2411 15.456C18.5051 14.624 17.9371 13.696 17.5371 12.672C17.1371 11.632 16.9371 10.56 16.9371 9.456C16.9371 8.32 17.1451 7.24 17.5611 6.216C17.9931 5.192 18.5851 4.28 19.3371 3.48C20.1051 2.664 21.0091 2.024 22.0491 1.56C23.0891 1.096 24.2251 0.863999 25.4571 0.863999C26.7211 0.863999 27.8651 1.112 28.8891 1.608C29.9291 2.088 30.8171 2.744 31.5531 3.576C32.3051 4.408 32.8811 5.344 33.2811 6.384C33.6811 7.408 33.8811 8.456 33.8811 9.528C33.8811 10.664 33.6731 11.744 33.2571 12.768C32.8411 13.792 32.2491 14.712 31.4811 15.528C30.7131 16.328 29.8091 16.968 28.7691 17.448C27.7451 17.912 26.6171 18.144 25.3851 18.144ZM20.9451 9.504C20.9451 10.16 21.0411 10.8 21.2331 11.424C21.4251 12.032 21.7051 12.576 22.0731 13.056C22.4571 13.536 22.9291 13.92 23.4891 14.208C24.0491 14.496 24.6891 14.64 25.4091 14.64C26.1611 14.64 26.8171 14.496 27.3771 14.208C27.9371 13.904 28.4011 13.504 28.7691 13.008C29.1371 12.512 29.4091 11.96 29.5851 11.352C29.7771 10.728 29.8731 10.096 29.8731 9.456C29.8731 8.8 29.7771 8.168 29.5851 7.56C29.3931 6.952 29.1051 6.408 28.7211 5.928C28.3371 5.432 27.8651 5.048 27.3051 4.776C26.7451 4.504 26.1131 4.368 25.4091 4.368C24.6571 4.368 24.0011 4.512 23.4411 4.8C22.8971 5.088 22.4331 5.48 22.0491 5.976C21.6811 6.456 21.4011 7.008 21.2091 7.632C21.0331 8.24 20.9451 8.864 20.9451 9.504ZM40.0914 8.256V18H36.1554V0.959999H39.2754L47.1714 10.992V0.959999H51.1074V18H47.8914L40.0914 8.256ZM61.5904 18.12C60.4704 18.12 59.4144 17.912 58.4224 17.496C57.4304 17.064 56.5584 16.464 55.8064 15.696C55.0544 14.912 54.4624 13.992 54.0304 12.936C53.6144 11.864 53.4064 10.672 53.4064 9.36C53.4064 8.176 53.6224 7.072 54.0544 6.048C54.4864 5.024 55.0864 4.12 55.8544 3.336C56.6224 2.552 57.5184 1.944 58.5424 1.512C59.5824 1.064 60.7024 0.839999 61.9024 0.839999C63.4704 0.839999 64.8544 1.176 66.0544 1.848C67.2544 2.52 68.1424 3.424 68.7184 4.56L65.7904 6.768C65.4064 6.016 64.8464 5.424 64.1104 4.992C63.3904 4.56 62.6064 4.344 61.7584 4.344C61.1184 4.344 60.5264 4.48 59.9824 4.752C59.4544 5.008 58.9904 5.376 58.5904 5.856C58.2064 6.32 57.9104 6.864 57.7024 7.488C57.4944 8.112 57.3904 8.784 57.3904 9.504C57.3904 10.24 57.5024 10.92 57.7264 11.544C57.9504 12.168 58.2624 12.712 58.6624 13.176C59.0624 13.624 59.5344 13.976 60.0784 14.232C60.6384 14.488 61.2544 14.616 61.9264 14.616C62.7424 14.616 63.5184 14.416 64.2544 14.016C65.0064 13.6 65.6944 12.992 66.3184 12.192V16.08C64.9584 17.44 63.3824 18.12 61.5904 18.12ZM66.0784 11.952H62.7664V9.096H69.3424V18H66.0784V11.952ZM79.4085 18.144C78.1285 18.144 76.9685 17.904 75.9285 17.424C74.9045 16.928 74.0165 16.272 73.2645 15.456C72.5285 14.624 71.9605 13.696 71.5605 12.672C71.1605 11.632 70.9605 10.56 70.9605 9.456C70.9605 8.32 71.1685 7.24 71.5845 6.216C72.0165 5.192 72.6085 4.28 73.3605 3.48C74.1285 2.664 75.0325 2.024 76.0725 1.56C77.1125 1.096 78.2485 0.863999 79.4805 0.863999C80.7445 0.863999 81.8885 1.112 82.9125 1.608C83.9525 2.088 84.8405 2.744 85.5765 3.576C86.3285 4.408 86.9045 5.344 87.3045 6.384C87.7045 7.408 87.9045 8.456 87.9045 9.528C87.9045 10.664 87.6965 11.744 87.2805 12.768C86.8645 13.792 86.2725 14.712 85.5045 15.528C84.7365 16.328 83.8325 16.968 82.7925 17.448C81.7685 17.912 80.6405 18.144 79.4085 18.144ZM74.9685 9.504C74.9685 10.16 75.0645 10.8 75.2565 11.424C75.4485 12.032 75.7285 12.576 76.0965 13.056C76.4805 13.536 76.9525 13.92 77.5125 14.208C78.0725 14.496 78.7125 14.64 79.4325 14.64C80.1845 14.64 80.8405 14.496 81.4005 14.208C81.9605 13.904 82.4245 13.504 82.7925 13.008C83.1605 12.512 83.4325 11.96 83.6085 11.352C83.8005 10.728 83.8965 10.096 83.8965 9.456C83.8965 8.8 83.8005 8.168 83.6085 7.56C83.4165 6.952 83.1285 6.408 82.7445 5.928C82.3605 5.432 81.8885 5.048 81.3285 4.776C80.7685 4.504 80.1365 4.368 79.4325 4.368C78.6805 4.368 78.0245 4.512 77.4645 4.8C76.9205 5.088 76.4565 5.48 76.0725 5.976C75.7045 6.456 75.4245 7.008 75.2325 7.632C75.0565 8.24 74.9685 8.864 74.9685 9.504Z"
                                fill="#2563EB"/>
                        <path
                                d="M1.776 46V28.96H7.968C9.824 28.96 11.376 29.344 12.624 30.112C13.872 30.864 14.808 31.888 15.432 33.184C16.056 34.464 16.368 35.888 16.368 37.456C16.368 39.184 16.024 40.688 15.336 41.968C14.648 43.248 13.672 44.24 12.408 44.944C11.16 45.648 9.68 46 7.968 46H1.776ZM13.032 37.456C13.032 36.352 12.832 35.384 12.432 34.552C12.032 33.704 11.456 33.048 10.704 32.584C9.952 32.104 9.04 31.864 7.968 31.864H5.088V43.096H7.968C9.056 43.096 9.976 42.856 10.728 42.376C11.48 41.88 12.048 41.208 12.432 40.36C12.832 39.496 13.032 38.528 13.032 37.456ZM18.9557 46V28.96H22.2677V46H18.9557ZM35.9749 33.424C35.8629 33.312 35.6549 33.16 35.3509 32.968C35.0629 32.776 34.7029 32.592 34.2709 32.416C33.8549 32.24 33.3989 32.088 32.9029 31.96C32.4069 31.816 31.9029 31.744 31.3909 31.744C30.4949 31.744 29.8149 31.912 29.3509 32.248C28.9029 32.584 28.6789 33.056 28.6789 33.664C28.6789 34.128 28.8229 34.496 29.1109 34.768C29.3989 35.04 29.8309 35.272 30.4069 35.464C30.9829 35.656 31.7029 35.864 32.5669 36.088C33.6869 36.36 34.6549 36.696 35.4709 37.096C36.3029 37.48 36.9349 37.992 37.3669 38.632C37.8149 39.256 38.0389 40.088 38.0389 41.128C38.0389 42.04 37.8709 42.824 37.5349 43.48C37.1989 44.12 36.7349 44.64 36.1429 45.04C35.5509 45.44 34.8789 45.736 34.1269 45.928C33.3749 46.104 32.5749 46.192 31.7269 46.192C30.8789 46.192 30.0309 46.104 29.1829 45.928C28.3349 45.752 27.5189 45.504 26.7349 45.184C25.9509 44.848 25.2309 44.448 24.5749 43.984L26.0389 41.128C26.1829 41.272 26.4389 41.464 26.8069 41.704C27.1749 41.928 27.6229 42.16 28.1509 42.4C28.6789 42.624 29.2549 42.816 29.8789 42.976C30.5029 43.136 31.1349 43.216 31.7749 43.216C32.6709 43.216 33.3509 43.064 33.8149 42.76C34.2789 42.456 34.5109 42.024 34.5109 41.464C34.5109 40.952 34.3269 40.552 33.9589 40.264C33.5909 39.976 33.0789 39.728 32.4229 39.52C31.7669 39.296 30.9909 39.056 30.0949 38.8C29.0229 38.496 28.1269 38.16 27.4069 37.792C26.6869 37.408 26.1509 36.928 25.7989 36.352C25.4469 35.776 25.2709 35.056 25.2709 34.192C25.2709 33.024 25.5429 32.048 26.0869 31.264C26.6469 30.464 27.3989 29.864 28.3429 29.464C29.2869 29.048 30.3349 28.84 31.4869 28.84C32.2869 28.84 33.0389 28.928 33.7429 29.104C34.4629 29.28 35.1349 29.512 35.7589 29.8C36.3829 30.088 36.9429 30.4 37.4389 30.736L35.9749 33.424ZM39.5096 37.36C39.5096 36.32 39.6936 35.304 40.0616 34.312C40.4456 33.304 40.9976 32.392 41.7176 31.576C42.4376 30.744 43.3176 30.088 44.3576 29.608C45.3976 29.112 46.5816 28.864 47.9096 28.864C49.4776 28.864 50.8296 29.208 51.9656 29.896C53.1176 30.584 53.9736 31.48 54.5336 32.584L51.9896 34.336C51.7016 33.696 51.3256 33.192 50.8616 32.824C50.3976 32.44 49.9016 32.176 49.3736 32.032C48.8456 31.872 48.3256 31.792 47.8136 31.792C46.9816 31.792 46.2536 31.96 45.6296 32.296C45.0216 32.632 44.5096 33.072 44.0936 33.616C43.6776 34.16 43.3656 34.768 43.1576 35.44C42.9656 36.112 42.8696 36.784 42.8696 37.456C42.8696 38.208 42.9896 38.936 43.2296 39.64C43.4696 40.328 43.8056 40.944 44.2376 41.488C44.6856 42.016 45.2136 42.44 45.8216 42.76C46.4456 43.064 47.1256 43.216 47.8616 43.216C48.3896 43.216 48.9256 43.128 49.4696 42.952C50.0136 42.776 50.5176 42.496 50.9816 42.112C51.4456 41.728 51.8056 41.232 52.0616 40.624L54.7736 42.184C54.4376 43.032 53.8856 43.752 53.1176 44.344C52.3656 44.936 51.5176 45.384 50.5736 45.688C49.6296 45.992 48.6936 46.144 47.7656 46.144C46.5496 46.144 45.4376 45.896 44.4296 45.4C43.4216 44.888 42.5496 44.216 41.8136 43.384C41.0936 42.536 40.5256 41.592 40.1096 40.552C39.7096 39.496 39.5096 38.432 39.5096 37.36ZM64.0558 46.12C62.8078 46.12 61.6718 45.88 60.6478 45.4C59.6398 44.92 58.7678 44.272 58.0318 43.456C57.3118 42.624 56.7518 41.696 56.3518 40.672C55.9518 39.632 55.7518 38.568 55.7518 37.48C55.7518 36.344 55.9598 35.264 56.3758 34.24C56.8078 33.2 57.3918 32.28 58.1278 31.48C58.8798 30.664 59.7598 30.024 60.7678 29.56C61.7918 29.08 62.9118 28.84 64.1278 28.84C65.3598 28.84 66.4798 29.088 67.4878 29.584C68.5118 30.08 69.3838 30.744 70.1038 31.576C70.8238 32.408 71.3838 33.336 71.7838 34.36C72.1838 35.384 72.3838 36.44 72.3838 37.528C72.3838 38.648 72.1758 39.728 71.7598 40.768C71.3438 41.792 70.7598 42.712 70.0078 43.528C69.2718 44.328 68.3918 44.96 67.3678 45.424C66.3598 45.888 65.2558 46.12 64.0558 46.12ZM59.1118 37.48C59.1118 38.216 59.2238 38.928 59.4478 39.616C59.6718 40.304 59.9918 40.92 60.4078 41.464C60.8398 41.992 61.3598 42.416 61.9678 42.736C62.5918 43.04 63.2958 43.192 64.0798 43.192C64.8798 43.192 65.5918 43.032 66.2158 42.712C66.8398 42.376 67.3598 41.936 67.7758 41.392C68.1918 40.832 68.5038 40.216 68.7118 39.544C68.9358 38.856 69.0478 38.168 69.0478 37.48C69.0478 36.744 68.9278 36.04 68.6878 35.368C68.4638 34.68 68.1358 34.072 67.7038 33.544C67.2878 33 66.7678 32.576 66.1438 32.272C65.5358 31.952 64.8478 31.792 64.0798 31.792C63.2638 31.792 62.5438 31.96 61.9198 32.296C61.3118 32.616 60.7998 33.048 60.3838 33.592C59.9678 34.136 59.6478 34.744 59.4238 35.416C59.2158 36.088 59.1118 36.776 59.1118 37.48ZM76.0202 28.96L80.6282 42.064L85.1882 28.96H88.6682L82.2122 46H79.0202L72.5402 28.96H76.0202ZM102.319 43.096V46H90.4869V28.96H102.103V31.864H93.7989V35.968H100.975V38.656H93.7989V43.096H102.319ZM104.901 46V28.96H112.437C113.221 28.96 113.941 29.12 114.597 29.44C115.269 29.76 115.845 30.192 116.325 30.736C116.821 31.28 117.197 31.888 117.453 32.56C117.725 33.232 117.861 33.92 117.861 34.624C117.861 35.344 117.733 36.04 117.477 36.712C117.237 37.368 116.885 37.944 116.421 38.44C115.957 38.936 115.413 39.32 114.789 39.592L118.677 46H115.029L111.525 40.288H108.213V46H104.901ZM108.213 37.384H112.365C112.781 37.384 113.149 37.264 113.469 37.024C113.789 36.768 114.045 36.432 114.237 36.016C114.429 35.6 114.525 35.136 114.525 34.624C114.525 34.08 114.413 33.608 114.189 33.208C113.965 32.792 113.677 32.464 113.325 32.224C112.989 31.984 112.621 31.864 112.221 31.864H108.213V37.384ZM121.915 28.96L126.115 36.976L130.387 28.96H133.963L127.771 40.048V46H124.483V40L118.315 28.96H121.915Z"
                                fill="#FE712A"/>
                    </svg>
                </div>
            </a>
        </div>
        <h1 class="flex text-lg sm:text-xl font-semibold text-gray-600">
            Connectez-vous avec
        </h1>
    </div>

    <div class="w-full grid gap-8 bg-white p-5 py-8 sm:px-8 sm:py-10 shadow-lg rounded-md ">
        <div class="flex flex-col gap-5">
            <div class="grid grid-cols-2 gap-4 sm:gap-5">
                <a href="{{ route('auth.facebook.auth') }}"
                   class="border-2 border-gray-200 rounded transition bg-white flex justify-center px-5 py-2.5  ">
                    <img src="{{ asset('app/images/facebook.svg') }}" alt="facebook logo" width="20" class="w-5">
                </a>
                <a href="{{ route('auth.google.auth') }}"
                   class="border-2 border-gray-200 rounded transition bg-white flex justify-center px-5 py-2.5  ">
                    <img src="{{ asset('app/images/google.svg') }}" alt="google logo" width="20" class="w-5">
                </a>
            </div>
            <div role="hidden" class="border-t">
                <span class="block w-max mx-auto -mt-3 px-4 text-center font-semibold text-gray-500 bg-white">Ou</span>
            </div>
        </div>
        @if ($errors->any())
            <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700 mt-2" role="alert">
                <div>
                    @foreach ($errors->all() as $error)
                        {{ $error }}. <br>
                    @endforeach
                </div>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="w-full grid gap-8">
            @csrf
            <div class="grid gap-6">
                <div class="relative">
                    <input
                            type="email"
                            id="email"
                            placeholder="Enter your email address or username"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            autofocus
                            required
                            class="relative peer transition-all focus:border-purple-600 border-[3px] border-gray-200 outline-none rounded-xl px-4 py-3 w-full text-sm text-gray-700 placeholder-transparent"
                    >
                    <label
                            for="email"
                            class="absolute text-sm bg-white left-5 transition-all text-gray-500 peer-placeholder-shown:text-sm peer-focus:text-sm -top-3 peer-placeholder-shown:top-3.5 peer-focus:text-purple-600 peer-focus:-top-3">
                        Nom utilisateur ou mail
                    </label>
                </div>

                <div class="relative">
                    <input
                            type="password"
                            class="relative peer transition-all focus:border-purple-600 border-[3px] border-gray-200 outline-none rounded-xl px-4 py-3 w-full text-sm text-gray-700 placeholder-transparent"
                            id="password"
                            placeholder="Enter your passcode"
                            name="password"
                            autocomplete="current-password"
                            required>
                    <label
                            for="password"
                            class="absolute text-sm bg-white left-5 transition-all text-gray-500 peer-placeholder-shown:text-sm peer-focus:text-sm -top-3 peer-placeholder-shown:top-3.5 peer-focus:text-purple-600 peer-focus:-top-3">
                        Mot de passe
                    </label>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <button class="w-full text-sm py-3 px-4 rounded-xl text-center text-white  bg-gradient-to-br from-green-400 to-purple-600">
                    Se connecter
                </button>
                <div>
                    <p class="text-sm text-gray-500">
                        Nouveau sur la plateform?
                        <a href="{{ route('register') }}" class="text-purple-600">
                            Creer un compte
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection