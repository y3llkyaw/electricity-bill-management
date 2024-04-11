<?php require "bootstrap.php"; ?>
<?php ob_start(); ?>
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
                        alt="brand-logo"></span><span>Brighter Future</span></a><button data-bs-toggle="collapse"
                class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>
                    <?php if (!isset($_SESSION['current_user']) || $_SESSION['current_user'] === ""): ?>
                    <?php else: ?>
                        <li class="nav-item">

                            <a class="nav-link" href="billing.php">
                                Billing
                                <?php
                                $noti = 0;
                                $billings = $db->current_user_billings();
                                foreach ($billings as $billing) {
                                    if (!$billing->paid) {
                                        if (date_diff(date_create(date('Y-m-d')), date_create($billing->due_date))->days < 3 || date_diff(date_create(date('Y-m-d')), date_create($billing->due_date))->days < 0) {
                                            $noti += 1;
                                        }
                                    }
                                }
                                ?>
                                <?php echo $noti > 0 ? '<span class="badge badge-danger text-danger border border-danger">' . $noti . '</span>' : ""; ?>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="billinghistory.php">Billing History</a></li>
                    <?php endif; ?>
                </ul>
                <?php if (!isset($_SESSION['current_user'])): ?>
                    <a class="btn btn-primary shadow" role="button" href="signup.php">Register / Login</a>
                <?php else: ?>
                    <div class="dropdown "><a class="dropdown-toggle" aria-expanded="true" data-bs-toggle="dropdown"
                            href="#">
                            <?php echo $_SESSION['current_user']->name; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                            <button class="dropdown-item " type="button" data-bs-toggle="modal"
                                data-bs-target="#profileSetting">
                                Profile
                                modal </button>
                            <button class="dropdown-item " type="button" data-bs-toggle="modal" data-bs-target="#feedback">

                                Feedback </button>
                            <form action="auth/logout.php" method="post">
                                <button class="dropdown-item link-danger" href="#" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="modal fade" role="dialog" tabindex="-1" id="feedback" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h1 class="fs-5 modal-title" id="exampleModalLabel">Feedback</h1></button><button
                        class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="card mt-3 shadow mt-3 m-1">
                        <form action="functions/feedback.php" method="post">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <small class="text-success text-center">
                                        <?php
                                        echo isset($_SESSION['feedback_success']) ? $_SESSION['feedback_success'] : '';
                                        unset($_SESSION['feedback_success']);
                                        ?>
                                    </small>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-outline">
                                        <div class="row">
                                            <label class="form-label" for="textAreaExample">Message</label>
                                        </div>
                                        <textarea class="form-control" name="message" id="textAreaExample"
                                            rows="4"></textarea>
                                        <input name="user_id" value="<?php echo $_SESSION['current_user']->id; ?>"
                                            hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <input type="submit" value="send feedback"
                                        class="btn form-control btn-success w-100">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="profileSetting" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="functions/updateProfile.php" method="POST">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h1 class="fs-5 modal-title" id="exampleModalLabel">Update Profile</h1></button><button
                            class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control"
                                value="<?php echo $_SESSION['current_user']->email; ?>" name="email"
                                placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input name="id" value="<?php echo $_SESSION['current_user']->id; ?>" hidden>
                            <input type="name" name="name" class="form-control"
                                value="<?php echo $_SESSION['current_user']->name; ?>" placeholder="John Wick">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Current Password</label>
                            <input name="current_password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="change_password" class="form-check-input" />
                            <label class="form-label" for="change_password">Change Password</label>
                        </div>
                        <div class="form-group invisible" id="hidden">
                            <input type="password" id="new_password" name="new_password" class="form-control">
                            <label class="form-label" for="new_password">New Password</label>
                        </div>
                        <div class="form-group invisible" id="hidden1">
                            <input type="password" id="confirm_new_password" name="confirm_new_password"
                                class="form-control">
                            <label class="form-label" for="confirm_new_password">Confirm New Password</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal">Close</button><button
                            class="btn btn-primary" type="submit">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        let checkbox = document.getElementById('change_password');
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                document.getElementById('hidden').classList.remove('invisible');
                document.getElementById('hidden1').classList.remove('invisible');
            }
            else {
                document.getElementById('hidden').classList.add('invisible');
                document.getElementById('hidden1').classList.add('invisible');
            }
        })
    </script>