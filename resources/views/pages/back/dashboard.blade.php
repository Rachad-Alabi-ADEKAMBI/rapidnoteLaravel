<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-2">
        <div class="section">
            <div class="container">
                <!--responsive menu-->

                <div class="row dashboard">
                    <div class="col-sm-12 col-lg-3 dashboard__menu">
                        @include('menu')
                    </div>

                    <div class="col-md-12 col-lg-9 dashboard__content" id="Rates">
                        <Rates />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>