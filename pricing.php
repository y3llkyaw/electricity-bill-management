<?php include "nav.php"; ?>
<?php
$prices_R = $db->getResdentailPrice();
$prices_N = $db->getNonResdentailPrice();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pricing - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/dh-card-image-left-dark.css">
</head>

<body>
    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card col-md-6 bg-dark">
                    <div class="card-header p-0">
                        <div class="row">
                            <form action="#" method="post">
                                <div class="input-group col-md-6">
                                    <select class="input-group-text" name="type" id="">
                                        <option value="1">Residential</option>
                                        <option value="0">Non-Residential</option>
                                    </select>
                                    <input class="form-control" placeholder="unit" name="unit" type="number" min="0" />
                                    <button class="btn btn-sm btn-primary form-control" type="submit"
                                        name="calculate">Calculate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body h-100">
                        <?php if (isset($_POST['calculate']) && $_POST['unit'] != ""): ?>
                            <table class="table table-responsive table-borderless align-middle mb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Unit Layers</th>
                                        <th>MMKs</th>
                                        <th>Calculation Per Layer</th>
                                        <th>Sub Total Per Layer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $unit = $_POST['unit'];
                                    $unit_const = $_POST['unit'];
                                    $type = $_POST['type'];
                                    $total = 0;
                                    $f_total = 0;

                                    if ($type) {
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
                                        <th colspan="3">Total Amount (it will add extra fees) :</th>
                                        <td>
                                            <?php echo $f_total; ?> MMKs
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-dark" style="margin-top:-80px;">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold text-success">Pricing</h2>
                    <p class="text-muted">There are two pricing tables for <strong
                            class="text-success">Residential</strong> and
                        <strong class="text-success">Non-residentail</strong>.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <section>
                        <div class="container">
                            <div class="photo-card bg-dark">

                                <div class="photo-background "
                                    style="background-image: url('assets/img/products/5.jpeg');">
                                </div>
                                <table class="table table-dark  table-borderless align-middle">

                                    <thead class="bg-dark">
                                        <tr>
                                            <th colspan="2" class="text-center"><strong>Residential</strong></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Unit Layers</th>
                                            <th>MMKs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($prices_R as $price): ?>
                                            <tr class="text-center">
                                                <td>
                                                    <?php echo $price->start . " to ";
                                                    echo 0 == $price->end ? "over" : $price->end; ?>
                                                </td>
                                                <td>
                                                    <?php echo $price->price; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <section>
                        <div class="container">
                            <div class="photo-card bg-dark">
                                <div class="photo-background "
                                    style="background-image: url('assets/img/products/2.jpeg');"></div>
                                <table class="table table-borderless table-dark align-middle">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th colspan="2" class="text-center"><strong>Non-Residential</strong></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Unit Layers</th>
                                            <th>MMKs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($prices_N as $price): ?>
                                            <tr class="text-center">
                                                <td>
                                                    <?php echo $price->start . " to ";
                                                    echo 0 == $price->end ? "over" : $price->end; ?>
                                                </td>
                                                <td>
                                                    <?php echo $price->price; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <?php include "footer.php"; ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-dark.js"></script>
</body>

</html>