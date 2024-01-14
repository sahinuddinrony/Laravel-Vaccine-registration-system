<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* all */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        :root {
            --main-blue: #71b7e6;
            --main-purple: #9b59b6;
            --main-grey: #ccc;
            --sub-grey: #d9d9d9;
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            /*center vertically */
            align-items: center;
            /* center horizontally */
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            padding: 10px;
        }

        /* container and form */
        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 5px;
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container .title::before {
            content: "";
            position: absolute;
            height: 3.5px;
            width: 30px;
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            left: 0;
            bottom: 0;
        }

        .container form .user__details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        /* inside the form user details */
        form .user__details .input__box {
            width: calc(100% / 2 - 20px);
            margin-bottom: 15px;
        }

        .user__details .input__box .details {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .user__details .input__box input {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid var(--main-grey);
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user__details .input__box input:focus,
        .user__details .input__box input:valid {
            border-color: var(--main-purple);
        }

        /* inside the form gender details */

        form .gender__details .gender__title {
            font-size: 20px;
            font-weight: 500;
        }

        form .gender__details .category {
            display: flex;
            width: 80%;
            margin: 15px 0;
            justify-content: space-between;
        }

        .gender__details .category label {
            display: flex;
            align-items: center;
        }

        .gender__details .category .dot {
            height: 18px;
            width: 18px;
            background: var(--sub-grey);
            border-radius: 50%;
            margin: 10px;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category .one,
        #dot-2:checked~.category .two,
        #dot-3:checked~.category .three {
            border-color: var(--sub-grey);
            background: var(--main-purple);
        }

        form input[type="radio"] {
            display: none;
        }

        /* submit button */
        form .button {
            height: 45px;
            margin: 45px 0;
        }

        form .button input {
            height: 100%;
            width: 100%;
            outline: none;
            color: #fff;
            cursor: pointer;
            border: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            transition: all 0.3s ease;
        }

        form .button input:hover {
            background: linear-gradient(-135deg, var(--main-blue), var(--main-purple));
        }

        .select_option {
            position: relative;
            width: 100%;
        }

        .select_option select {
            display: inline-block;
            width: 100%;
            height: 35px;
            padding: 0px 15px;
            cursor: pointer;
            color: #7b7b7b;
            border: 1px solid #ccc;
            border-radius: 0;
            background: #fff;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            transition: all 0.2s ease;
        }

        .select_option select::-ms-expand {
            display: none;
        }

        .select_option select:hover,
        .select_option select:focus {
            color: #000;
            background: #fafafa;
            border-color: #000;
            outline: none;
        }

        .select_arrow {
            position: absolute;
            top: calc(50% - 4px);
            right: 15px;
            width: 0;
            height: 0;
            pointer-events: none;
            border-width: 8px 5px 0 5px;
            border-style: solid;
            border-color: #7b7b7b transparent transparent transparent;
        }

        .select_option select:hover+.select_arrow,
        .select_option select:focus+.select_arrow {
            border-top-color: #000;
        }

        @media only screen and (max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user__details .input__box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .gender__details .category {
                width: 100%;
            }

            .container form .user__details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user__details::-webkit-scrollbar {
                width: 0;
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        <div class="title">Vaccine Registration</div>

        <form action="#" method="post">
            @csrf
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Full Name</span>
                    <input type="text" name="name" placeholder="E.g: John Smith" value="{{ old('name') }}">

                    <div>
                        @error('name')
                            <div style="color: #ff0000;margin:2px 0">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="input__box">
                    <span class="details">NID</span>
                    <input type="number" name="nid" placeholder="5412302578" value="{{ old('nid') }}">

                    <div>
                        @error('nid')
                            <div style="color: #ff0000;margin:2px 0">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="input__box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="johnsmith@hotmail.com" value="{{ old('email') }}">

                    <div>
                        @error('email')
                            <div style="color: #ff0000;margin:2px 0">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="input__box">
                    <span class="details">Phone Number</span>
                    <input type="tel" name="phone_number" placeholder="+88017********" value="{{ old('phone_number') }}">

                    <div>
                        @error('phone_number')
                            <div style="color: #ff0000;margin:2px 0">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div>
                <div class="input__box">
                    <span class="details" style="margin-bottom:10px;display:block;font-weight:500;">Vaccine
                        Center</span>
                    <div class="input_field select_option">
                        <select name="vaccine_center_id">
                            <option value="">Select a center</option>
                            {{-- @foreach ($vaccine_centers as $center)
                                <option value="{{ $center->id }}" @selected(old('vaccine_center_id') == $center->id)>{{ $center->name }}</option>
                            @endforeach --}}
                        </select>
                        <div class="select_arrow"></div>
                    </div>
                </div>

                <div>
                    @error('vaccine_center_id')
                        <div style="color: #ff0000;margin:2px 0">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>

    </div>

</body>

</html>
