<div class="menu">
    <?php if (auth()->user()->role === 'user') { ?>
    <ul>

        <li>
            <a class='btn btn-primary' href="/dashboard">
                <i class="fas fa-wallet"></i> Marketplace
            </a>
        </li>

        <li>
            <a href="./index.php?action=wallet" class='btn btn-primary'>
                <i class="fas fa-wallet"></i> Wallet
            </a>
            </butto>
        </li>



        <li>
            <a href="MyTransactions" class='btn btn-primary'>
                <i class="fas fa-list"></i> My transactions
            </a>
        </li>


    </ul>
    <?php } else { ?>
    <ul>
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
            <button class="btn btn-primary">
                <a href="">
                    <i class="fas fa-envelope"></i> Webmail
                </a>
            </button>
        </li>

    </ul>
    <?php } ?>

</div>