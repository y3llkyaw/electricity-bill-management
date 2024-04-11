<?php include "nav.php"; ?>
<?php require "auth/middleware.php"; ?>

<?php
$billings = $db->current_user_billings();
$prices_R = $db->getResdentailPrice();
$prices_N = $db->getNonResdentailPrice();
?>
<section class="py-5 bg-dark" style="min-height:60vh;">
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive-md">
                    <table class="table mt-3">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th>Credit Card</th>
                                <th>Billing Address</th>
                                <th scope="col">Name On Card</th>
                                <th scope="col">Experation Date</th>
                                <th scope="col">Total Unit</th>
                                <th scope="col">Paid Date</th>
                                <th scope="col">MMKs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($billings as $index => $billing): ?>
                                <?php if ($billing->paid): ?>
                                    <tr class="text-center">
                                        <td>
                                            <?php echo $index + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $db->getBillingInfoId($billing->id)->credit_card; ?>
                                        </td>
                                        <td>
                                            <?php echo $db->getBillingInfoId($billing->id)->billing_address; ?>
                                        </td>
                                        <td>
                                            <?php echo $db->getBillingInfoId($billing->id)->noc; ?>
                                        </td>
                                        <td>
                                            <?php echo $db->getBillingInfoId($billing->id)->exp; ?>
                                        </td>
                                        <td>
                                            <?php echo $billing->kw; ?>
                                        </td>
                                        <td>
                                            <?php echo date("F jS, Y", strtotime($db->getBillingInfoId($billing->id)->date)); ?>
                                        </td>
                                        <td>
                                            <?php echo $billing->bill_amount; ?>
                                        </td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bold-and-dark.js"></script>

</html>