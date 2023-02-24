<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'rapidnote') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/app.css', 'resources/js/app.js'])
    <script type="javascript" src="http://127.0.0.1/rn2/resources/js/app.js"></script>

    <!-- Styles -->
    @livewireStyles

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="http://127.0.0.1/rn2/resources/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            <div class="" id="app">
                {{ $slot }}
            </div>
        </main>

        <footer class="footer mt-5 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <h4>
                            Rapid note
                        </h4>
                        <p>
                            Fast and reliable marketplace
                        </p>

                        <ul>
                            <li>
                                <div class="icon"><i class="fas fa-phone-volume"></i></div>
                                <p>+233 55 00 00 00</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fab fa-whatsapp"></div></i>
                                <p>+233 55 00 00 00</p>

                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-envelope"></i>
                                </div>
                                <p>contact@rapidnote.com</p>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <h4>
                            Entreprise
                        </h4>

                        <ul>
                            <li>
                                <a href="./index.php#about">
                                    <i class="fas fa-arrow-right"></i> About
                                </a>
                            </li>
                            <li>
                                <a href="./index.php#contact">
                                    <i class="fas fa-arrow-right"></i> Contact
                                </a>
                            </li>
                            <li>
                                <a href="./index.php?action=cgu">
                                    <i class="fas fa-arrow-right"></i> Terms of use
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <h4>
                            Links
                        </h4>

                        <ul>
                            <li>
                                <a href="./index.php?action=buy">
                                    <i class="fas fa-arrow-right"></i> Buy
                                </a>
                            </li>
                            <li>
                                <a href="./index.php?action=sell">
                                    <i class="fas fa-arrow-right"></i> Sell
                                </a>
                            </li>
                            <li>
                                <a href="./index.php?action=wallet">
                                    <i class="fas fa-arrow-right"></i> Wallet
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @stack('modals')




    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>