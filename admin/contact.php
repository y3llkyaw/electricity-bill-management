<?php include "nav.php"; ?>
<?php include "auth/middleware.php"; ?>
<?php $contacts = $db->getContact(); ?>
<?php $feedbacks = $db->get_all_feedbacks(); ?>

<section class="py-3 bg-dark" style="min-height:80vh;">
    <div class="container">
        <div class="row ">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Billing History</p>
                <h3 class="fw-bold mb-0">Try to fix the customer feedback.</h3>
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
                            <?php unset($_SESSION['payment_fail']); ?>
                        </span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header px-4 border-bottom">
                        <strong>Contacts</strong>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $index => $contact): ?>
                                    <tr class="">
                                        <td>
                                            <?php echo $index + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $contact->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $contact->email; ?>
                                        </td>
                                        <td>
                                            <?php echo $contact->message; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header px-4 border-bottom">
                        <strong>Feedbacks from Customer</strong>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name <sup>user Id</sup></th>
                                    <th scope="col">Message</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($feedbacks as $index => $feedback): ?>
                                    <tr class="">
                                        <td>
                                            <?php echo $index + 1; ?>
                                        </td>
                                        <td>
                                            <?php echo $db->get_User($feedback->user_id)[0]->name . " <sup>[ " . $db->get_User($feedback->user_id)[0]->id . " ]</sup>"; ?>
                                        </td>
                                        <td>
                                            <?php echo $feedback->message; ?>
                                        </td>
                                        <td>
                                            <form action="functions/delete_feedback.php" method="post">
                                                <input name="id" value="<?php echo $feedback->id; ?>" hidden>
                                                <input type="submit"
                                                    value="<?php echo $feedback->solve == 1 ? 'SOLVED' : 'SOLVE'; ?>"
                                                    class="btn btn-sm btn-success <?php echo $feedback->solve == 1 ? 'disabled' : ''; ?>">
                                            </form>
                                           
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>