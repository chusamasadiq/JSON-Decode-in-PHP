<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="Jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="myStyleSheet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>JSON Parsing</title>
</head>

<body>

<div class="container">
    <h6 class="mt-5 pl-4">Status</h6>
    <div class="row">
        <div class="col-sm-4 pt-20 pl-5">
        <form name="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <div>
                <input type="checkbox" name="Filters[]" id="Deployed" class="mr-2" value="Deployed">
                <label for="Deployed" class="mr-5">Deployed</label>


                <input type="checkbox" name="Filters[]"  class="mr-2" value="InProduction">
                <label for="InProduction">In Production</label>
            </div>

            <div>
                <input type="checkbox" name="Filters[]"  class="mr-2" value="ReadytoShip">
                <label for="Ready to Ship">Ready to Ship</label>


                <input type="checkbox" name="Filters[]" class="mr-2 ml-sm-3" value="SelectAll">
                <label for="Select All">Select All</label>
            </div>

            <div class="mt-3">
                <button class="btn btn-secondary rounded-pill mr-2">Clear</button>
                <button type="submit" name="submit" class="btn btn-primary rounded-pill">Apply Filter</button>
                
            </div>
            </form>
            <?php
            if(isset($_POST["submit"]))
            {
                $Filters = $_POST["Filters"]; 
                foreach($Filters as $itemsFiltering)
                echo $itemsFiltering ."<br>";
                
                    echo "<script>alert('Submit Pressed');</script>";
                
            }?>
        </div>
        
        

        

        
        <div class="col-sm-8">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Serial Number</th>
                            <th>Status</th>
                            <th>Client Name</th>
                            <th>Site Name</th>
                            <th>Version</th>
                        </tr>
                        
                        <?php

                        $data = file_get_contents("data.json");  
                        $data = json_decode($data, true);
                        foreach($data as $row)  
                        {  
                            echo '<tr>
                            <td>'.$row["Serial Number"].'</td>
                            <td>'.$row["Status"].'</td>
                            <td>'.$row["Client Name"].'</td>
                            <td>'.$row["Site Name"].'</td>
                            <td>'.$row["Version"].'</td>
                            </tr>';   
                        }  
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
