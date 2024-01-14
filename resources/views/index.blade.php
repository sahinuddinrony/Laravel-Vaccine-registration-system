<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel CRUD') }}</title>

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('favicon.png') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <style>
        .ts-control {
            border: none !important;
            padding: 2px !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
</head>

<body class="antialiased bg-body text-body font-body bg-gray-100">
    {{-- <div id="app" class="">
    @include('layouts.navigation')

    @yield('content')
</div> --}}

    <div class="container mx-auto">
        <section>
            <form action="{{ route('vaccine_registration') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="bg-gray-100 py-6 sm:py-12 flex justify-center align-items">
                    <div class="relative max-w-2xl w-full px-5 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                        <h2 class="font-semibold text-xl text-gray-700 leading-relaxed text-center">Vaccine Registration
                        </h2>
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="flex flex-col">
                                    <label class="leading-loose">Full Name <span
                                            class="text-red-400 text-sm">(required)</span></label>
                                    <input name="name" value="{{ old('name') }}" type="text" required="required"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="E.g: John Smith">
                                    @error('name')
                                        <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">NID <span
                                            class="text-red-400 text-sm">(required)</span></label>
                                    <input name="nid" value="{{ old('nid') }}" type="number" min="0" required="required"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="5412302578">
                                    @error('nid')
                                        <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Email <span
                                            class="text-red-400 text-sm">(required)</span></label>
                                    <input name="email" value="{{ old('email') }}" type="email" required="required"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="johnsmith@hotmail.com">
                                    @error('email')
                                        <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Phone Number <span
                                            class="text-red-400 text-sm">(required)</span></label>
                                    <input name="phone_number" value="{{ old('phone_number') }}" type="tel"
                                        required="required"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="+88017********">
                                    @error('phone_number')
                                        <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label class="leading-loose">Vaccine
                                        Center <span
                                            class="text-red-400 text-sm">(required)</span></label>
                                    <select
                                        class="px-4 py-1 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                         name="vaccine_center_id">
                                        <option value="">Select a center</option>
                                        @foreach ($vaccine_centers as $center)
                                            <option value="{{ $center->id }}" @selected(old('vaccine_center_id') == $center->id)>
                                                {{ $center->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <div class="select_arrow"></div> --}}
                                    @error('vaccine_center_id')
                                        <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="pt-4 flex items-center space-x-4">
                                <a href=""
                                    class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none border border-gray-200">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg> Cancel
                                </a>
                                <button
                                    class="bg-green-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>

    @include('layouts.alert')
    {{-- @yield('script') --}}

    <script>
        $(document).ready(function() {
            new TomSelect("#select-category", {
                plugins: ['remove_button'],
                maxItems: 5,
                onItemAdd: function() {
                    this.setTextboxValue('');
                },
            });

            new TomSelect("#select-location", {
                plugins: ['remove_button'],
                maxItems: 5,
                onItemAdd: function() {
                    this.setTextboxValue('');
                },
            });
        });
    </script>
</body>

</html>
