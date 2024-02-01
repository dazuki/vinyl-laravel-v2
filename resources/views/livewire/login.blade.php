@section('page-title')
    Logga In
@endsection
@auth
    <div class="mx-auto max-w-screen-xl text-left">
        <div
            class="bg-white mt-4 border-b-2 border-t-2 border-r-0 border-l-0 lg:border-t-2 lg:border-r-2 lg:border-l-2 border-slate-300 px-4">
            <p class="p-4 font-semibold text-center text-xl">
                INLOGGAD SOM <span class="text-green-700">{{ mb_strtoupper(auth()->user()->email) }}</span>
            </p>
            <p class="mt-6 mb-6 text-center">
                <a href="/"
                    class="rounded-lg border-2 border-slate-300 bg-slate-100 shadow-md px-2 py-2 hover:bg-slate-300"
                    wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="inline-block -mt-2 mr-1 w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>Startsidan
                </a>
            </p>
        @else
            <div class="mx-auto max-w-screen-md text-left">
                <div class="bg-white mx-4 mt-4 border-2 rounded-2xl border-slate-300 px-4">
                    <div class="flex justify-center mb-4 mt-4">
                        <a href="/"><img src="{{ asset('static/images/vinyl-laravel_logo.png') }}"
                                class="h-[28px] lg:h-[48px] md:h-[48px]">
                        </a>
                    </div>
                    <div class="flex justify-center space-x-2 p-4">
                        <a class="text-gray-900 hover:text-green-700 rounded-lg border-2 border-slate-300 p-2 bg-slate-100 hover:border-green-700 hover:bg-green-50"
                            href="/login" wire:navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="inline-block w-7 h-7 -mt-1 text-green-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg> Logga In
                        </a>
                        <a class="text-gray-900 hover:text-blue-700 rounded-lg border-2 border-slate-300 p-2 bg-slate-100 hover:border-blue-700 hover:bg-blue-50"
                            href="/register" wire:navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="inline-block w-7 h-7 -mt-1 text-blue-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg> Registrera
                        </a>
                    </div>
                @endauth
            </div>
        </div>
