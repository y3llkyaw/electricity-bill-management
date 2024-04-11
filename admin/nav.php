<?php require "../bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/Ludens-Client---Login-Dropdown.css">
</head>
<style>
    .hide {
        display: none;
    }
</style>
<body>
    <nav class="navbar navbar-dark navbar-expand-md sticky-top py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span
                    class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><img
                        style="height: 3rem; " src="assets/img/brands/brand-logo.png"
                        alt="brand-logo"></span><span>Admin Panel</span></a><button data-bs-toggle="collapse"
                class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="user.php">User</a></li>
                    <!-- <li class="nav-item"><a class="nav-link " href="billing.php">Billing</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="billinghistory.php">Billing History</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact / Feedbacks</a></li>

                    <!-- <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li> -->
                </ul>
                <?php if (!isset($_SESSION['current_admin'])): ?>
                    <a class="btn btn-primary shadow" role="button" href="index.php">Register / Login</a>
                <?php else: ?>
                    <div class="dropdown "><a class="dropdown-toggle" aria-expanded="true" data-bs-toggle="dropdown"
                            href="#">
                            <?php echo $_SESSION['current_admin']->name; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                            <form action="auth/logout.php" method="post">
                                <button class="dropdown-item link-danger" href="#" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
