<?php include 'nav.php'; ?>
<?php include "auth/middleware.php"; ?>

<?php $billingInfos = $db->getBillingInfo(); ?>

<section class="bg-dark py-2" style="min-height:80vh;">
    <div class="container">
        <div class="row ">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Billing History</p>
                <h3 class="fw-bold mb-0">You can search the user from search-bar.</h3>
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
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User <sup>[id]</sup></th>
                            <th scope="col">Credit Card</th>
                            <th scope="col">Billing Address</th>
                            <th scope="col">Name On Card</th>
                            <th scope="col">Experation</th>
                            <th>Paid Date</th>
                            <th>Units</th>
                            <th>MMKs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($billingInfos as $index => $billingInfo): ?>
                            <tr class="">
                                <td>
                                    <?php echo $index + 1; ?>

                                </td>
                                <td>
                                    <?php echo $db->get_User($billingInfo->user_id)[0]->name; ?>
                                    <sup>
                                        [
                                        <?php echo $billingInfo->user_id; ?> ]
                                    </sup>
                                </td>
                                <td>
                                    <?php echo $billingInfo->credit_card; ?>
                                </td>
                                <td>
                                    <?php echo $billingInfo->billing_address; ?>
                                </td>
                                <td>
                                    <?php echo $billingInfo->noc; ?>
                                </td>
                                <td>
                                    <?php echo $billingInfo->exp; ?>
                                </td>
                                <td>
                                    <?php echo $billingInfo->date; ?>
                                </td>
                                <td>
                                    <?php echo $db->getBilling($billingInfo->billing_id)[0]->kw == null ? "this billing was deleted" : $db->getBilling($billingInfo->billing_id)[0]->kw; ?>
                                </td>
                                <td>
                                    <?php echo $db->getBilling($billingInfo->billing_id)[0]->kw == null ? "this billing was deleted" : $db->getBilling($billingInfo->billing_id)[0]->bill_amount; ?>
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