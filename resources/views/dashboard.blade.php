<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-2">
        <div class="section">
            <div class="container">
                <!--responsive menu-->

                <div class="row dashboard">
                    <div class="col-sm-12 col-lg-3 dashboard__menu">
                        <div class="menu">

                            <ul>


                                <li>
                                    <button class='btn btn-primary'>
                                        <a href="./index.php?action=wallet">
                                            <i class="fas fa-wallet"></i> Wallet
                                        </a>
                                    </button>
                                </li>



                                <li>
                                    <button class='btn btn-primary'>
                                        <a href="MyTransactions">
                                            <i class="fas fa-list"></i> My transactions
                                        </a>
                                    </button>
                                </li>


                            </ul>



                            <ul>
                                <li>
                                    <button class="btn btn-primary">
                                        <a href="/transactions">
                                            <i class="fas fa-list"></i> Transactions
                                        </a>
                                    </button>
                                </li>



                                <li>
                                    <button class="btn btn-primary">
                                        <a href="/users">
                                            <i class="fas fa-users"></i> Users
                                        </a>
                                    </button>
                                </li>

                                <li>
                                    <button class="btn btn-primary">
                                        <a href="/payments">
                                            <i class="fas fa-money-bill-wave"></i> Payments
                                        </a>
                                    </button>
                                </li>

                                <li>
                                    <button class="btn btn-primary">
                                        <a href="">
                                            <i class="fas fa-envelope"></i> Webmail
                                        </a>
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-9 dashboard__content" id="Rates">
                        <Rates />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>