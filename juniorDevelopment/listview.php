<!DOCTYPE html>
<html lang="en">
    <?php require_once 'generalFunctions.php'; 
        conMaker();
        $result = getProductList();
    ?>
    <head>
        <title>Product List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body> 
        <form action="process.php" method="POST">
            <div class="container">
                <div class="card-columns">
                    <h2>Product List</h2>
                    <a type="submit" class="btn btn-info" name="add" href="http://testdomain001.atwebpages.com/addnew.php">Add</a>
                    <button type="cancel" class="btn btn-danger" name="deleteall">Delete</button>
                </div>
                <hr class="divider">
                <div class="card-columns">
                    <?php 
                    foreach($result as $row) { ?>
                    <div class="card bg-light">
                        <div class="form-check-inline">
                            <label class="form-check-label" for="check2">
                                <input class="ml-2" type="checkbox" name="checkbox[]" value=<?php echo $row['ID']; ?>>
                            </label>
                        </div>
                        <div class="card-body text-center">

                            <p class="card-text"><?php echo $row['SKU'] ?> <br>
                            <?php echo $row['Name'] ?><br>
                            <?php echo $row['Price'] ?> $
                            </p>
                        </div>
                    </div>

                    <?php } ?>

                </div>
            </div>
        </form>
    </body>
</html>