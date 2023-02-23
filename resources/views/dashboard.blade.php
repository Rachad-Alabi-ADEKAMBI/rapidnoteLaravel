<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="section">
            <div class="container">
                <!--responsive menu-->

                <div class="row dashboard">
                    <div class="col-sm-12 col-lg-3 dashboard__menu">
                        menu
                    </div>

                    <div class="col-md-12 col-lg-9 dashboard__content">
                        <div class="container">

                            <div class="row">

                                <div class="col-sm-12 col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="./public/img/bitcoin.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-title">Wallet</p>
                                            <p class="card-text">
                                                <strong>
                                                    Balance
                                                </strong> <br>
                                                <span> 100 ghc</span> <img
                                                    src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt=""> !
                                                <span> 10 usd</span> <img
                                                    src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""> !
                                                <hr>
                                            </p>

                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-4">
                                    <div class="card p-0">
                                        <img class="card-img-top"
                                            src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt=""> !

                                        <div class="card-body">
                                            <p class="card-title">nom<br>
                                            </p>
                                            <p class="card-text">
                                                <strong>
                                                    Buying
                                                </strong> <br>
                                                <span>1200 ghc</span> <img
                                                    src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt=""> !
                                                <span> 10 usd</span> <img
                                                    src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                                    class='flag'>
                                                <hr>
                                            </p>

                                            <p class="card-text">
                                                <strong>
                                                    Selling
                                                </strong> <br>
                                                <span>10 ghc</span> <img
                                                    src="http://127.0.0.1/rn2/resources/img/ghana-flag.png" alt=""> !
                                                <span>10 / 10 usd</span> <img
                                                    src="http://127.0.0.1/rn2/resources/img/usd.png" alt=""
                                                    class='flag'>
                                                <hr>
                                            </p>


                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>