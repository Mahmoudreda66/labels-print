<?php

$pageTitle = 'تسجيل الدخول';

$noSidebar = true;
$noNavbar = true;

include_once base_path('resources/views/admin/layouts/head.php');
?>

<div class="content me-0">
    <div class="container">
        <div class="row">
            <div class="col-5 mx-auto mt-5">
                <div class="bg-light rounded p-3 border">
                    <h5 class="text-center mb-3">مصنع اللورد كيمو | تسجيل الدخول</h5>
                    <form action="/login" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">إسم المستخدم</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="إسم المستخدم..." autofocus>
                            <?php
                            if (isset($flashes['errors']['username'])) {
                            ?>
                                <small class="invalid-feedback">
                                    <?php echo $flashes['errors']['username']; ?>
                                </small>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="إسم المستخدم..." autofocus>
                            <?php
                            if (isset($flashes['errors']['password'])) {
                            ?>
                                <small class="invalid-feedback">
                                    <?php echo $flashes['errors']['password']; ?>
                                </small>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="remember_me" value="1" id="remember_me">
                            <label for="remember_me">تذكرني</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">
                                <i class="fas fa-key"></i>
                                تسجيل الدخول
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once base_path('resources/views/admin/layouts/footer.php');
?>