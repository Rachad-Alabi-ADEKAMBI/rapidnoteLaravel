<div class="menu">
    <div class="menu__icon" id="menu-icon">
        <i class="fas fa-chevron-down" onclick=displayMenu()></i>
    </div>
    <div class="menu__items" id="dashboard-menu">
        <?php if (auth()->user()->role === 'user') { ?>
        <ul>

            <li>
                <a class='btn btn-primary' href="/dashboard">
                    <i class="fas fa-money-bill-trend-up"></i> Marketplace
                </a>
            </li>

            <li>
                <a href="/wallet" class='btn btn-primary'>
                    <i class="fas fa-wallet"></i> Wallet
                </a>
                </butto>
            </li>



            <li>
                <a href="/myTransactions" class='btn btn-primary'>
                    <i class="fas fa-list"></i> My transactions
                </a>
            </li>


        </ul>
        <?php } else { ?>
        <ul>
            <li>
                <a class='btn btn-primary' href="/dashboard">
                    <i class="fas fa-money-bill-trend-up"></i> Rates
                </a>
            </li>

            <li>
                <a href="/transactions" class='btn btn-primary'>
                    <i class="fas fa-list"></i> Transactions
                </a>
            </li>



            <li>
                <a href="/users" class='btn btn-primary'>
                    <i class="fas fa-users"></i> Users
                </a>
            </li>

            <li>
                <a href="/payments" class='btn btn-primary'>
                    <i class="fas fa-money-bill-wave"></i> Payments
                </a>
            </li>

            <li>
                <a class="btn btn-primary" href="o2switch.net">
                    <i class="fas fa-envelope"></i> Webmail
                </a>
            </li>

        </ul>
        <?php } ?>
    </div>

</div>