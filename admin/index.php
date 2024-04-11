<?php include "nav.php"; ?>
<?php if(isset($_SESSION['current_admin'])){
    header("location: user.php");
}?>
<section class="py-2 bg-dark">
    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Login for Admin</p>
                <h3 class="fw-bold">What we can do for you</h3>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5 h-100"><img class="rounded img-fluid shadow h-100" src="assets/img/products/1.jpeg">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                <div class="w-100">
                    <h5 class="fw-bold text-center">Admin Login&nbsp;</h5>

                    <div class="text-center">
                        <small class="text-danger">
                            <?php echo isset($_SESSION['login_error']) ? $_SESSION['login_error'] : ""; ?>
                            <?php unset($_SESSION['login_error']); ?>
                        </small>
                    </div>

                    <form class="p-xl-4" method="post" action="auth/login.php">
                        <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email"
                                placeholder="Email"></div>
                        <div class="mb-3"><input class="form-control" type="password" name="password"
                                placeholder="password"></div>
                        <div><button class="btn btn-primary shadow d-block w-100" type="submit">Login </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"?>