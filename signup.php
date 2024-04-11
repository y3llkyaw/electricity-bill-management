<?php include "nav.php"; ?>


<section class="py-1 bg-dark">
    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Login / Register</p>
                <h3 class="fw-bold">What we can do for you</h3>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 800px;">
            <div class="col mb-5 h-100"><img class="rounded img-fluid shadow h-100" src="assets/img/products/1.jpeg">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                <div class="w-100">
                    <h5 class="fw-bold text-center">Login&nbsp;</h5>

                    <div class="text-center">
                        <small class="text-danger">
                            <?php echo isset($_SESSION['login_error']) ? '<i class="bi bi-exclamation-circle"></i> ' . $_SESSION['login_error'] : ""; ?>
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
        <hr>
        <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col order-md-last mt-5"><img class="rounded img-fluid shadow" src="assets/img/products/2.jpeg">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                <div class="w-100">

                    <div class="fw-bold text-center">Register&nbsp;</div>
                    <div class="text-center">
                        <small class="text-success">
                            <?php echo isset($_SESSION['register_success']) ? $_SESSION['register_success'] : ""; ?>
                            <?php unset($_SESSION['register_success']); ?>
                        </small>
                        <small class="text-danger">
                            <?php echo isset($_SESSION['register_error']) ? $_SESSION['register_error'] : ""; ?>
                            <?php unset($_SESSION['register_error']); ?>
                        </small>
                    </div>
                    <form class="p-xl-4" method="post" action="auth/register.php">
                        <div class="mb-1"><input class="form-control" type="name" id="name" name="name"
                                placeholder="Name"></div>
                        <div class="mb-1"><input class="form-control" type="email" id="email" name="email"
                                placeholder="Email"></div>
                        <div class="mb-1"><input class="form-control" type="number" id="board_id" name="board_id"
                                placeholder="Board ID"></div>
                        <div class="mb-1"><select class="form-select" name="type">
                                <option value="1" selected="">Residentail Board</option>
                                <option value="0">Non-Residential Board</option>
                            </select></div>
                        <div class="mb-1"><input class="form-control" type="password" id="password" name="password"
                                placeholder="Password"></div>

                        <div class="mb-1"><input class="form-control" type="password" name="c_password"
                                id="confirm_password" placeholder="Confirm Password"></div>
                        <p class=" mb-2">
                        <div class="row" id="error1">
                            <small class="text-danger">
                                <i class="bi bi-exclamation-circle"></i> passwords must be strong pasword.
                            </small>
                        </div>
                        </p>
                        <div class="hello mb-2">
                            <div class="row" id="error2">
                                <small class="text-danger">
                                    <i class="bi bi-exclamation-circle"></i> password doesn't match.
                                </small>
                            </div>
                        </div>
                        <div><button class="btn btn-primary shadow d-block w-100" type="submit">Register </button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')

    let password = document.getElementById('password');
    let confirm_password = document.getElementById('confirm_password');

    password.addEventListener('input', () => {
        var pattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,}$/;
        if (password.value.match(mediumPassword)) {
            document.getElementById('error1').innerHTML = ` <small class="text-success ">
                <i class="bi bi-check2-circle"></i> passwords is ok.
                                        </small>`
        } else {
            document.getElementById('error1').innerHTML = ` <small class="text-danger">
                                <i class="bi bi-exclamation-circle"></i> passwords must be strong pasword.
                            </small>`
        }


    });
    confirm_password.addEventListener('input', () => {
        if (confirm_password.value == password.value) {
            document.getElementById('error2').innerHTML = ` <small class="text-success ">
            <i class="bi bi-check2-circle"></i> passwords matched.
                                        </small>`
        } else {
            document.getElementById('error2').innerHTML = ` <small class="text-danger ">
            <i class="bi bi-exclamation-circle"></i>   password doesn't match.
                                        </small>`
        }
    })

</script>

<?php include "footer.php" ?>