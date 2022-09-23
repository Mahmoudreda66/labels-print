<nav class="main-navbar">
    <ul class="list-unstyled links">
        <?php
        if (isset($pageLinks) && is_array($pageLinks)) {
            foreach ($pageLinks as $key => $value) {
        ?>
                <li>
                    <a href="<?php echo $value[0]; ?>" id="<?php echo $value[1] ?? ''?>"><?php echo $key; ?></a>
                </li>
        <?php
            }
        }
        ?>
    </ul>
    <ul class="list-unstyled fixed">
        <li>
            <i class="fas fa-print" onclick="printPage();"></i>
        </li>
        <li>
            <form action="/logout" id="logoutForm" method="post"></form>
            <i class="fas fa-lock" onclick="_('#logoutForm').submit();"></i>
        </li>
    </ul>
</nav>