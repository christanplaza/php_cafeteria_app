<?php
session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//unset quantity
unset($_SESSION['qty_array']);
$mysqli = new mysqli('localhost', 'root', '', 'php_cafeteria_app') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);
$total_orders = $mysqli->query("SELECT sum(order_count) as order_count FROM orders") or die($mysqli->error);
$total_earnings = $mysqli->query("SELECT sum(total) as earning_count FROM orders WHERE type='paid'") or die($mysqli->error);
$total_receivable = $mysqli->query("SELECT sum(total) as earning_count FROM orders WHERE type='pending'") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Cafeteria App</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cafeteria App</a>
        </div>
    </nav>
    <div class="container mt-4 mh-100">
        <?php if (isset($_SESSION['message'])) {
        ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-info text-center">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                </div>
            </div>
        <?php
            unset($_SESSION['message']);
        } ?>
        <div class="row mb-4">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Earnings</h5>
                        <h2>
                            <?php
                            $earnings = $total_earnings->fetch_assoc()['earning_count'];
                            if ($earnings > 0)
                                echo "₱" . $earnings;
                            else
                                echo "₱0";
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <h2>
                            <?php
                            $orders = $total_orders->fetch_assoc()['order_count'];
                            if ($orders > 0)
                                echo $orders;
                            else
                                echo 0;
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">To be recieved</h5>
                        <h2>
                            <?php
                            $receivable = $total_receivable->fetch_assoc()['earning_count'];
                            if ($receivable > 0)
                                echo "₱" . $receivable;
                            else
                                echo "₱0";
                            ?>
                        </h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card mh-100">
                    <div class="card-body">
                        <h1 class="card-title">Your Tray</h1>
                        <table class="table">
                            <thead>
                                <tr class="table-dark">
                                    <th></th>
                                    <th>Order</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //initialize total
                                $total = 0;
                                if (!empty($_SESSION['cart'])) {
                                    //connection
                                    $conn = new mysqli('localhost', 'root', '', 'php_cafeteria_app');
                                    //create array of initail qty which is 1
                                    $index = 0;
                                    if (!isset($_SESSION['qty_array'])) {
                                        $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                    }
                                    $sql = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                ?>

                                        <tr class="table-light">
                                            <th><a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn-close" aria-label="Close"></a></th>
                                            <th><?php echo $row['title']; ?></th>
                                            <th><?php echo number_format($row['price'], 2); ?></th>
                                            <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                            <?php $total += $_SESSION['qty_array'][$index] * $row['price']; ?>
                                        </tr>
                                    <?php
                                        $index++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3" class="text-center">No Item in Cart</td>
                                    </tr>
                                <?php
                                }

                                ?>
                                <tr>
                                    <td colspan="2" align="right"><b>Total</b></td>
                                    <td><b><?php echo number_format($total, 2); ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Products</h1>
                        <div class="row mt-4">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="col-4">
                                    <a href="add_cart.php?id=<?php echo $row['id']; ?>">
                                        <div class="btn btn-primary btn-lg p-4" style="min-width: 200px">
                                            <?php echo $row['title'] ?>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;  ?>
                        </div>
                        <hr class="mt-4 border border-primary border-3 opacity-75">
                        <a href="pay_now.php" class="btn btn-success btn-lg p-4 mt-2">
                            Pay Now
                        </a>
                        <a href="pay_later.php" class="btn btn-info btn-lg p-4 mt-2">
                            Pay Later
                        </a>
                        <a href="clear_cart.php" class="btn btn-danger btn-lg p-4 mt-2">
                            Cancel Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>