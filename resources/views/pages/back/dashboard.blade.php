<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-2">
        <div class="section">
            <div class="container">
                <!--responsive menu-->

                <div class="row dashboard">
                    <div class="col-sm-12 col-lg-3 dashboard__menu">
                        @include('pages/back/menu')
                    </div>

                    <div class="col-md-12 col-lg-9 dashboard__content">
                        <?php if (auth()->user()->role === 'admin') { ?>
                        <p class="text text-bold">
                            /rates
                        </p>
                        <div class="" id="RatesAdmin">
                            <Rates2 />
                        </div>
                        <?php } else { ?>
                        <p class="text text-bold">
                            /marketplace
                        </p>
                        <div class="" id="Rates">
                            <Rates />
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>