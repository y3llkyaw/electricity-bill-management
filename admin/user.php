<?php include "nav.php"; ?>
<?php include "auth/middleware.php"; ?>

<?php
$billings = $db->billings();
$users = $db->get_all_Users();
$count = count($users);

if (isset($_POST['entry'])) {
    if ($_POST['entry'] == "All") {
        $users = $db->get_all_Users();
    } else {
        $usersLimit = $db->getUserLimit($_POST['entry'], 0);
        $users = $usersLimit;
        $entry = 0;
    }
}

if (isset($_POST['page'])) {
    $usersLimit = $db->getUserLimit($_POST['entry'], $_POST['offset']);
    $users = $usersLimit;
}


$prices_N = $db->getNonResdentailPrice();
$prices_R = $db->getResdentailPrice();
?>

<section class="py-5 bg-dark" style=" min-height:100vh;">
    <div class="container py-1">
        <div class="row ">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Add Billing for Users</p>
                <h3 class="fw-bold mb-0">You can search the user from search-bar.</h3>
                <p class="">

                    <?php if (isset($_SESSION['success'])): ?>
                        <span class="text-center text-info">
                            <i class="bi bi-check-circle"></i>
                            <?php echo $_SESSION['success']; ?>
                            <?php unset($_SESSION['success']); ?>
                        </span>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['payment_fail'])): ?>
                        <span class="text-center text-danger">
                            <i class="bi bi-exclamation-circle"></i>
                            <?php echo $_SESSION['payment_fail']; ?>
                            <?php unset($_SESSION['payment_success']); ?>
                        </span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div>
            <div class="table-responsive">

                <table class="table" style="border">
                    <thead class="thead-light">
                        <tr>
                            <div class="row d-flex justify-content-center pb-3">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="input-group">
                                            <select class="input-group-text bg-info" name="cars" id="search_by">
                                                <option value="username">username</option>
                                                <option value="email">email</option>
                                                <option value="id">id</option>
                                            </select>
                                            <input id="search" placeholder="search users" type="text"
                                                class="form-control" aria-label="Text input with dropdown button">
                                            <span class="input-group-text">show entry</span>
                                            <form action="#" method="POST">
                                                <select class="input-group-text bg-info" name="entry" id="search_by"
                                                    type="submit" onchange="this.form.submit()">
                                                    <option value="All" <?php echo isset($_POST['entry']) && $_POST['entry'] == 'All' ? "selected" : ""; ?>>All</option>
                                                    <option value="10" <?php echo isset($_POST['entry']) && $_POST['entry'] == 10 ? "selected" : ""; ?>>10
                                                    </option>
                                                    <option value="25" <?php echo isset($_POST['entry']) && $_POST['entry'] == 25 ? "selected" : ""; ?>>25
                                                    </option>
                                                    <option value="30" <?php echo isset($_POST['entry']) && $_POST['entry'] == 30 ? "selected" : ""; ?>>30
                                                    </option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_POST['entry']) && $_POST['entry'] != "All") {
                                    $remain = $count % $_POST['entry'];
                                    $division = intdiv($count, $_POST['entry']);
                                    if ($remain > 0) {
                                        $division++;
                                    }
                                }
                                ?>

                            </div>
                        </tr>

                        <tr class="row d-flex justify-content-center pb-3">
                            <div class="col-md-9">
                                <?php if (isset($_POST['entry']) && $_POST['entry'] != 'All'): ?>
                                    <ul class="pagination">
                                        <?php for ($x = 0; $x < $division; $x++): ?>
                                            <li class="page-item">
                                                <form action="#" method="POST">
                                                    <input name="offset" value="<?php echo $x * $_POST['entry']; ?>" hidden>
                                                    <input name="entry" value="<?php echo $_POST['entry']; ?>" hidden>
                                                    <button class="page-link" name="page" href="#" type="submit">
                                                        <?php echo $x + 1; ?>
                                                    </button>
                                                </form>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>

                                <?php endif; ?>
                            </div>
                        </tr>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User ID</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="users">
                        <?php foreach ($users as $index => $user): ?>
                            <tr class="text-center" id="user_<?php echo $user->id; ?>">
                                <th scope="row">
                                    <?php echo $index + 1; ?>
                                </th>
                                <td class="username" id="<?php echo $user->id; ?>">
                                    <?php echo $user->name; ?>
                                </td>
                                <td class="email" id="<?php echo $user->id; ?>">
                                    <?php echo $user->email; ?>
                                </td>
                                <td class="id" id="<?php echo $user->id; ?>">
                                    <?php echo $user->id; ?>
                                </td>
                                <td>
                                    <a class="btn btn-primary" data-bs-toggle="collapse" aria-expanded="false"
                                        aria-controls="collapse-1" href="#collapse-<?php echo $user->id; ?>"
                                        role="button">Billing Detail</a>
                                </td>
                            </tr>
                            <tr id="collapse-<?php echo $user->id; ?>" class="collapse">
                                <td colspan="6">
                                    <div class="row">
                                        <div class="card col-md-3 shadow-md">
                                            <div class="card-header">
                                                <small>add Billing For</small> <strong>
                                                    <?php echo $user->name . " <sup>[$user->id]</sup>"; ?>
                                                </strong>
                                            </div>
                                            <form action="functions/add_billing.php" method="post">

                                                <div class="card-body">
                                                    <div class="row mb-2">
                                                        <label for="start_date"
                                                            class="col-md-6 col-form-label text-md-right">Start Date</label>
                                                        <div class="col-md-12">
                                                            <input id="start_date" type="date" class="form-control"
                                                                name="start_date" placeholder="" required
                                                                autocomplete="start_date" autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label for="end_date"
                                                            class="col-md-6 col-form-label text-md-right">End
                                                            Date</label>
                                                        <div class="col-md-12">
                                                            <input id="end_date" type="date" class="form-control"
                                                                name="end_date" placeholder="" required
                                                                autocomplete="end_date" autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label for="due_date"
                                                            class="col-md-6 col-form-label text-md-right">Due
                                                            Date</label>
                                                        <div class="col-md-12">
                                                            <input id="due_date" type="date" class="form-control"
                                                                name="due_date" placeholder="" required
                                                                autocomplete="due_date" autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label for="board"
                                                            class="col-md-6 col-form-label text-md-right">Board</label>
                                                        <div class="col-md-12">
                                                            <select id="" type="date" class="form-control select"
                                                                name="board" placeholder="" required autocomplete="board"
                                                                autofocus>
                                                                <?php
                                                                $boards = $db->board_by_user($user->id);
                                                                ?>
                                                                <?php foreach ($boards as $board): ?>
                                                                    <option value="<?php echo $board->board_id; ?>">
                                                                        <?php echo $board->board_id; ?> (
                                                                        <?php
                                                                        if ($board->type == 0) {
                                                                            echo "Non-Residential";
                                                                        }
                                                                        if ($board->type == 1) {
                                                                            echo "Residential";
                                                                        } ?>
                                                                        )
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="power_usage"
                                                            class="col-md-12 col-form-label text-md-right">Unit</label>
                                                        <div class="col-md-12">
                                                            <input value="0" min="0" id="power_usage" type="number"
                                                                class="form-control" name="power_usage" placeholder=""
                                                                required autocomplete="power_usage" autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2 mr-0">
                                                        <div class="col-md-6">
                                                            <small>
                                                                Total : <span id="total">
                                                                    0
                                                                </span> MMKs
                                                            </small>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input name="user_id" value="<?php echo $user->id; ?>" hidden>
                                                            <input class="form-control text-white text-sm bg-success"
                                                                id="submit" type="submit" value="Add" class="form-control"
                                                                name="submit" placeholder="" required
                                                                autocomplete="due_date" autofocus>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="col-md-9">
                                            <table class="table">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col">Paid or Not</th>
                                                        <th scope="col">Board Id</th>
                                                        <th scope="col">Board Type</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">End Date</th>
                                                        <th scope="col">Due Date</th>
                                                        <th scope="col">Unit</th>
                                                        <th scope="col">MMKs</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($billings as $billing): ?>
                                                        <?php if ($billing->user_id == $user->id): ?>
                                                            <tr class="text-center">
                                                                <th scope="row">
                                                                    <?php if ($billing->paid): ?>
                                                                        <span class="text-success">
                                                                            <i class="bi bi-check-circle"></i>
                                                                        </span>
                                                                    <?php else: ?>
                                                                        <span class="text-danger">
                                                                            <i class="bi bi-exclamation-circle"></i>
                                                                        </span>
                                                                    <?php endif; ?>

                                                                </th>
                                                                <td>
                                                                    <?php echo $billing->board_id; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $board = $db->board_by_BoardId($billing->board_id);

                                                                    if ($board[0]->type == 1) {
                                                                        echo "Residential";
                                                                    } else {
                                                                        echo "Non-Residential";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $billing->start_date; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $billing->end_date; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $billing->due_date; ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo $billing->kw; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $billing->bill_amount; ?>
                                                                </td>
                                                                <td>
                                                                    <form action="./functions/delete_billing.php" method="post">
                                                                        <input value="<?php echo $billing->id; ?>" hidden
                                                                            name="billing_id">
                                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                                            <i class="bi bi-trash"></i>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('search').addEventListener('input', e => {
        let select = document.getElementById('search_by').value;
        const inputValue = e.target.value;
        document.querySelectorAll(`.${select}`).forEach(element => {
            console.log(element);
            const isfound = element.innerText.toLowerCase().includes(inputValue.toLowerCase());
            if (isfound) {
                document.getElementById(`user_${element.id}`).classList.remove('hide');
                document.getElementById(`collapse-${element.id}`).classList.remove('hide');
            } else {
                document.getElementById(`user_${element.id}`).classList.add('hide');
                document.getElementById(`collapse-${element.id}`).classList.add('hide');

            }
        });
    });
</script>
<?php include 'footer.php'; ?>