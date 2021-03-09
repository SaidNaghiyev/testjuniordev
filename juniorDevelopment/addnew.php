<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product Add</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body> 
        <?php
        include 'generalFunctions.php';
        conMaker();
        $types = getTypes();
        
        $typeDetails = getTypeDetails();
        ?>
        <form action="process.php" class="was-validated" method="POST">
            <div class="container">
                <div class="card-columns">
                    <h2>Product Add</h2>
                    <button type="submit" class="btn btn-info" name="save">Save</button>
                    <a type="cancel" class="btn btn-danger" name="cancel" href="http://testdomain001.atwebpages.com/index.php">Cancel</a>
                </div>
                <hr class="divider">
                <div class="form-group w-60">
                  <label for="SKU">SKU:</label>
                  <input type="text" class="form-control" id="SKU" placeholder="Enter SKU" name="SKU" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field!</div>
                </div>
                
                <div class="form-group w-60">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field!</div>
                </div>
                <div class="form-group w-60">
                  <label for="price">Price:</label>
                  <input type="number" step="0.01" value="0.00" min="0" class="form-control" id="price" placeholder="Enter Price" name="price" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field!</div>
                </div>
                <div class="form-group w-60">
                    <label for="select_1">Select list:</label>
                    <select onchange="typeChanged()" class="form-control" id="typeSwitcher" name="typeSwitcher">
                        <?php
                        foreach($types as $row) { ?>
                            <option onchange="" value='<?php echo $row['ID'];?>'><?php echo $row['Name'];?></option>
                        <?php }?>
                    </select>
                </div>
                
                <?php 
                    foreach ($typeDetails as $row){
                    ?>
                        <div  class="form-group hideable<?php echo $row['type_switchers_id'] ?>" id="<?php echo "divTypes" . $row['type_switchers_id']?>">
                            <label for="name"><?php echo $row['Name']?> </label>
                            <input  type="text" class="form-control w-60" id="<?php echo $row['detail_key']?>" placeholder="Enter <?php echo $row['Name']?>" name="<?php echo $row['detail_key']?>" required value="0">
                            <div class="valid-feedback"><?php echo $row['Description'] ?>, Valid</div>
                            <div class="invalid-feedback"><?php echo $row['Description'] ?>, Error</div>
                        </div>
                    
                <?php  } ?>
            </div>
        </form>
        
        
        <script type="text/javascript">
            typeChanged();
            function typeChanged(){
                
                var select = document.getElementById('typeSwitcher');
                
                $("#typeSwitcher option").each(function() {
                    var dv = ".hideable" + this.value;
                    
                    $(dv).hide();
                });
                
                var dv = ".hideable" + select.options[select.selectedIndex].value;
                console.log(dv);
                $(dv).show();
            }
        </script>
    </body>
</html>

