<aside class="main-aside">
    <div class="p-3">
        <div class="text-center">
            <div>
                <span><?php echo auth('name'); ?></span>
            </div>
            <div>
                <small id="sidebar_date"><?php echo date('n/j/Y g:i:s A'); ?></small>
                <!-- script of getting current date and update it -->
                <script>
                    let dateELement = _('#sidebar_date'),
                        dateFormat = '';

                    setInterval(() => {
                        let dateObject = new Date();

                        dateFormat = dateObject.toLocaleDateString() + ' ' + dateObject.toLocaleTimeString();

                        dateELement.textContent = dateFormat;
                    }, 1000);
                </script>
            </div>
        </div>
        <hr>
    </div>
    <ul class="list-unstyled me-0 pe-0">
        <li class="<?php echo (request_is('models-stickers') ? 'active' : ''); ?>">
            <a href="/models-stickers">
                ملصقات العلب
            </a>
        </li>
    </ul>
</aside>