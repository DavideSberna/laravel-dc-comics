<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<?php
$nav = [
    'home' => [
        'page' => 'Home',
        'url' => 'movies.index',
    ],
];

$footer = [
        "dc comics" => [
            "characters",
            "comics",
            "movies",
            "tv",
            "games",
            "videos",
            "news"
        ],
        "dc" => [
            "Terms of Use",
            "Privacy Policy",
            "Ad Choices",
            "Advertising",
            "Jobs",
            "Subscriptions",
            "Talent Workshops",
            "Rating",
            "Contact Us"
        ],
        "sites" => [
            "dc",
            "mad magazine",
            "dc kind",
            "dc universe",
            "dc power visa"
        ],
        "shop" => [
            "Shop DC",
            "Shop DC Collectibles"
        ]
    ];

    $listInfo = [
        [
            "image" => 'img/buy-comics-digital-comics.png',
            "text" => "digital comics",
        ],
        [
            "image" => 'img/buy-comics-merchandise.png',
            "text" => "dc merchandise",
        ],
        [
            "image" => 'img/buy-comics-subscriptions.png',
            "text" => "subscription",
        ],
        [
            "image" => 'img/buy-comics-shop-locator.png',
            "text" => "comic shop locator",
        ],
        [
            "image" => 'img/buy-dc-power-visa.svg',
            "text" => "dc power visa",
        ],
    ];

$footerIcon = [
    [
        "image" => 'img/footer-facebook.png',
    ],
    [
        "image" => 'img/footer-periscope.png',
    ],
    [
        "image" => 'img/footer-pinterest.png',
    ],
    [
        "image" => 'img/footer-twitter.png',
    ],
    [
        "image" => 'img/footer-youtube.png',
    ],
];

?>

<body>
    <header>
        <section>
            <div class="bg-primary">
                <div class="container d-flex flex-row-reverse">
                    <ul class="d-flex justify-content-center align-items-center m-0">
                        <li class="text-white">Dc power visa</li>
                        <li class="text-white ms-5">Additional dc sites</li>
                    </ul>
                </div>
            </div>
            <div>
                <nav class="container d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('img/dc-logo.png') }}" alt="">
                    </div>
                    <div>
                        <ul class="d-flex m-0 pt-4 pb-4">
                            @foreach ($nav as $itemKey => $item)
                                <li class="li-hover ps-3 position-relative"><a href="{{ route($item['url']) }}">{{ $item['page'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                    <a class="btn btn-primary" href="{{route('movies.create')}}" role="button">Add</a>
                    </div>
                </nav>
            </div>
        </section>

        <section class="jumbo">
            <div class="bg-jumbo">
            </div>
            @if(request()->route()->getName() == 'home' || request()->route()->getName() == 'movies.index')
            <div class="container position-relative">
                <div class="bg-primary current-series">
                   <h3 class="text-white pe-3 ps-3 m-0 text-uppercase">Current series</h3>
                </div>
            </div>
            @endif
        </section>
    </header>

    <main>

        @yield('content')

        @if(request()->route()->getName() == 'home' || request()->route()->getName() == 'movies.index')
            <section id="list-product" class="bg-primary">
                <div class="container pt-4 pb-4">
                    <div class="row">
                        @foreach($listInfo as $item)
                        <div class="col">
                            <li class="d-flex justify-content-center align-items-center">
                                <img src="{{ $item['image']}}" alt="">
                                <p class="text-uppercase m-0 ps-2 text-white">{{$item['text']}}</p>
                            </li>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        

    </main>

    <footer>
        <section class="bg-image">
            <div class="container pt-4 pb-4">
                <ul class="d-flex">
                    @foreach($footer as $item => $subcategories)
                        <li class="pe-5">
                            <h4 class="text-uppercase text-white">{{ $item }}</h4>
                            <ul class="p-0">
                                @foreach($subcategories as $subcategory)
                                    <li class="text-white-50">{{ $subcategory }}</li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <div>
                    <p class="text-white-50 m-0">All Site Content TM and @ 2020 DC Entertainment, unless otherwise <a href="#">noted here</a>. Alle rights reserved.</p>
                    <p><a href="#">Cookies Settings</a></p>
                </div>
            </div>
        </section>
        <section class="bg-black">
            <div class="container">
                <div class="pt-2 pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                       <div>
                         <button type="button" class="text-white btn border border-2 rounded-0 border-primary text-uppercase">Sing-up now!</button>
                       </div>
                       <div>
                          <div>
                            <h4 class="text-uppercase text-primary">Follow us</h4>
                          </div>
                            <ul class="d-flex align-items-center m-0 p-0">
                                @foreach($footerIcon as $item)
                                    <li class="list-group-item">
                                        <img class="d-block ps-2" src="{{ $item['image'] }}" alt="">
                                    </li>
                                @endforeach
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
</body>