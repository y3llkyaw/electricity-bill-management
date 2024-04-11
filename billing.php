<?php include "nav.php"; ?>
<?php require "auth/middleware.php"; ?>
<?php
$billings = $db->current_user_billings();
$prices_R = $db->getResdentailPrice();
$prices_N = $db->getNonResdentailPrice();

?>
<section class="py-5 bg-dark" style="margin-top:-70px; min-height:100vh;">
    <div class="container py-5">
        <div class="row mb-2 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Your Payments</p>
                <?php if ($noti > 0): ?>
                    <p class="text-danger text-center">
                        <i class="bi bi-exclamation-circle"></i> you have to pay <?php echo $noti;?> payment which near the due date to pay.
                    </p>
                <?php endif; ?>
                <p class="">
                    <?php if (isset($_SESSION['payment_success'])): ?>
                        <span class="text-center text-info">
                            <i class="bi bi-check-circle"></i>
                            <?php echo $_SESSION['payment_success']; ?>
                            <?php unset($_SESSION['payment_success']); ?>
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="hidePaid" />
                                <label class="form-check-label" for="flexCheckDefault">Hide Paid Billing</label>
                            </div>
                        </tr>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th>Board ID</th>
                            <th>Board Type</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Total Unit</th>
                            <th scope="col">MMKs</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($billings as $index => $billing): ?>

                            <tr id="billing<?php echo $billing->id; ?>"
                                class="text-center <?php echo $billing->paid ? 'paid' : ''; ?>">
                                <th scope="row">
                                    <div class="text-<?php echo $billing->paid ? 'success' : 'danger'; ?> ">
                                        <?php echo $billing->paid ? '<i class="bi bi-check-circle"></i>' : '<i class="bi bi-exclamation-circle"></i>'; ?>
                                    </div>
                                </th>
                                <td>
                                    <?php echo $billing->board_id; ?>
                                </td>
                                <td>
                                    <?php echo $db->getBoardType($billing->board_id)->type ? "residential" : "non-residentail"; ?>
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
                                    <?php echo $billing->kw; ?> Unit
                                </td>
                                <!-- <td>
                                    <?php
                                    //  echo date_diff(date_create(date('Y-m-d')), date_create($billing->due_date))->format('%r%a')
                                    ?>
                                </td> -->
                                <td>
                                    <?php echo $billing->bill_amount; ?>
                                    <br>
                                    <?php if ($billing->paid == 0): ?>
                                        <?php echo date_diff(date_create(date('Y-m-d')), date_create($billing->due_date))->format('%r%a') < 0 ? "+ " . (2000 * date_diff(date_create(date('Y-m-d')), date_create($billing->due_date))->days) . "(late)" : ""; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a class="link" data-bs-toggle="collapse" aria-expanded="false"
                                        aria-controls="collapse-1" href="#collapse-<?php echo $billing->id; ?>"
                                        role="button">
                                        <i class="bi bi-question-circle"></i>
                                    </a>


                                    <!-- Collapsed content -->

                                </td>
                                <td>
                                    <button class="btn btn-primary <?php echo $billing->paid ? "disabled" : ''; ?>"
                                        type="button" data-bs-toggle="modal"
                                        data-bs-target="#payment<?php echo $billing->id; ?>">
                                        <?php echo $billing->paid ? "Paid" : 'Pay'; ?>
                                    </button>
                                    <!-- Modal -->

                                    <!-- Modal -->
                                </td>
                            </tr>
                            <div class="modal fade" role="dialog" tabindex="-1" id="payment<?php echo $billing->id; ?>"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog d-flex justify-content-center ">
                                    <div class="modal-content w-100 bg-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Payment Information
                                            </h5>

                                            <button class="btn-close" type="button" aria-label="Close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form method="POST" action="functions/payment.php">
                                                <div class="form-outline mb-4">
                                                    <div class="row">
                                                        <label class="form-label" for="credit">Credit Card</label>
                                                    </div>
                                                    <input value="<?php echo $billing->id; ?>" name="billing_id" hidden />
                                                    <input value="<?php echo $_SESSION['current_user']->id; ?>"
                                                        name="user_id" hidden>
                                                    <input type="number" maxlength="16" name="credit" min="0"
                                                        class="form-control" placeholder="xxxx xxxx xxxx xxxx" />
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <div class="row">
                                                        <label class="form-label" for="billingAddress">Billing
                                                            Address</label>
                                                    </div>
                                                    <input type="address" name="address" class="form-control"
                                                        placeholder="" />

                                                </div>

                                                <div class="form-outline mb-4">
                                                    <div class="row">
                                                        <label class="form-label" for="noc">Name on Card</label>
                                                    </div>
                                                    <input type="name" name="noc" class="form-control" placeholder="" />
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <div class="row">
                                                        <label class="form-label" for="exp">Expiration Date</label>
                                                    </div>
                                                    <input type="date" name="exp" class="form-control" />
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <div class="row">
                                                        <label class="form-label" for="password1">CVV / CVC</label>
                                                    </div>
                                                    <input type="number" class="form-control" name="cvv" maxlength="4" />
                                                </div>
                                                <!-- <button type="submit" class="btn btn-primary btn-block">Pay & Save Card Info</button> -->

                                                <button type="submit" class="btn btn-sm btn-primary w-100">PAY</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tr class="collapse" id="collapse-<?php echo $billing->id; ?>">
                                <td colspan="11">
                                    <div>
                                        <table class="table table-dark align-middle mb-0 bg-white">
                                            <thead class="bg-light">
                                                <tr class="text-center">
                                                    <th>Unit Layers</th>
                                                    <th>MMKs</th>
                                                    <th>Calculation Per Layer</th>
                                                    <th>Sub Total Per Layer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $unit = $billing->kw;
                                                $total = 0;
                                                $f_total = 0;

                                                ?>
                                                <?php
                                                if ($db->getBoardType($billing->board_id)->type) {
                                                    $prices = $prices_R;
                                                } else {
                                                    $prices = $prices_N;
                                                }
                                                ?>

                                                <?php foreach ($prices as $price): ?>
                                                    <tr class="text-center">

                                                        <td>
                                                            <?php echo $price->start . " to ";
                                                            echo 0 == $price->end ? "over" : $price->end; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $price->price; ?>
                                                        </td>
                                                        <?php
                                                        $start = $price->start;
                                                        $end = $price->end;
                                                        $total_layer = $end - $start;
                                                        $total_layer = $total_layer + 1;
                                                        $test = $unit - $total_layer;
                                                        ?>
                                                        <?php
                                                        if ($price->end != 0) {
                                                            if ($test > 0) {
                                                                $total = $price->price * $total_layer;
                                                                echo "<td>$price->price x $total_layer</td>";
                                                                echo "<td>$total MMKs</td>";
                                                                $f_total += $total;
                                                                $unit = $unit - $total_layer;
                                                            } else {
                                                                $total = $price->price * $unit;
                                                                echo "<td>$price->price x $unit</td>";
                                                                echo "<td>$total MMKs</td>";
                                                                $f_total += $total;
                                                                break;
                                                            }
                                                        } else {
                                                            $total = $price->price * $unit;
                                                            echo "<td>$price->price x $unit</td>";
                                                            echo "<td>$total MMKs</td>";
                                                            $f_total += $total;
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr class="text-center">
                                                    <th colspan="3">Total Amount :</th>
                                                    <td>
                                                        <?php echo $f_total; ?> MMKs
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

<?php include 'footer.php'; ?>
<script>

    let hidePaid = document.getElementById('hidePaid');
    hidePaid.addEventListener('change', () => {
        let divs = document.getElementsByClassName('paid')
        console.log(divs)
        if (hidePaid.checked) {
            let divs = document.getElementsByClassName('paid')
            let paid_rows = document.getElementsByClassName('paid-row')
            for (const div of divs) {
                div.classList.add('hide');
            }
            for (const div of paid_rows) {
                div.classList.add('hide');
            }
        }
        else {
            let divs = document.getElementsByClassName('paid')
            let paid_rows = document.getElementsByClassName('paid-row')
            for (const div of divs) {
                div.classList.remove('hide');
            }

        }
    })

    // function controlHide(id) {
    //     if (document.getElementById(`${id}`).parentElement.parentElement.classList.contains('hide')) {
    //         document.getElementById(id).parentElement.parentElement.classList.remove('hide');
    //     } else {
    //         document.getElementById(id).parentElement.parentElement.classList.add('hide');
    //     }
    // }
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bold-and-dark.js"></script>
</body>

</html>