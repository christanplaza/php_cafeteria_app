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
        <div class="row">
            <div class="col-4">
                <div class="card mh-100">
                    <div class="card-body">
                        <h1 class="card-title">Your Tray</h1>
                        <table class="table">
                            <thead>
                                <tr class="table-dark">
                                    <th>Order</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <th>Fried Chicken</th>
                                    <th>P59</th>
                                    <th><button type="button" class="btn-close" aria-label="Close"></button></th>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex justify-content-between">
                            <h3>Total</h3>
                            <h4>P59</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Products</h1>
                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="btn btn-primary btn-lg p-4">
                                    Fried Chicken
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 border border-primary border-3 opacity-75">
                        <div class="btn btn-success btn-lg p-4 mt-2">
                            Pay Now
                        </div>
                        <div class="btn btn-info btn-lg p-4 mt-2">
                            Pay Later
                        </div>
                        <div class="btn btn-danger btn-lg p-4 mt-2">
                            Cancel Order
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>