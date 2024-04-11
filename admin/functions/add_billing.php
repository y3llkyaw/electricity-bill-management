<?php
require "../../bootstrap.php";

$user_id = $_POST['user_id'];
$due_date = $_POST['due_date'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$board = $_POST['board'];


$kw = $_POST['power_usage'];

$unit = $kw;
$f_total = 0;

$prices_R = $db->getResdentailPrice();
$prices_N = $db->getNonResdentailPrice();
if ($db->getBoardType($board)->type) {
    $prices = $prices_R;
} else {
    $prices = $prices_N;
}
foreach ($prices as $price) {
    $total = 0;
    $start = $price->start;
    $end = $price->end;
    $layer = $end - $start;
    $layer = $layer + 1;
    $test = $unit - $layer;

    if ($price->end != 0) {
        if ($test < 0) {
            $total = $unit * $price->price;
            $f_total += $total;
            echo $total;
            echo "<br>";
            break;

        } else {
            $unit = $unit - $layer;
            $total = $layer * $price->price;
            $f_total += $total;
            echo $total;
            echo "<br>";
        }
    } else {
        $total = $price->price * $unit;
        echo $total;
        $f_total += $total;
        echo "<br>";
    }

    // $layer = $price->end - $price->start;
    // $unit = $unit - ($layer+1);
    // $total = ($layer+1)*$price->$price;
}
$bill_amount = $f_total;

$date1 = date_create(date("Y/m/d"));
$date2 = date_create($due_date);
$diff = date_diff($date1, $date2);
$validate = date_diff(date_create($start_date), date_create($end_date));

// validation start and end date
if ($validate->format('%r%a') < 0) {
    $_SESSION['error_billing'] = "Invalid START and END date.";
    header('Location: /electricityy/admin/user.php');
}
// validation due date 
else if ($diff->format('%r%a') < 0) {
    $_SESSION['error_billing'] = "Invalid due date.";
    header('Location: /electricityy/admin/user.php');
} else {
    $db->add_billin($user_id, $board, $start_date, $end_date, $due_date, $bill_amount, $kw);
    $_SESSION['success_billing'] = "successfully added the billing.";
    header("Location: /electricityy/admin/user.php");
}