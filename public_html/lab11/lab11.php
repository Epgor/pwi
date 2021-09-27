<?php
require('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

 

    <title>Baza</title>
  </head>
 <body>
             
            <div>
                <form method="post">
                    <table>
                        <tr>
                    <th>Country code:</th>
                    <th><input type="text" name="country_code"></th>
                    </tr>
                    
                    <tr>
                    <th>Country name:</th>
                    <th><input type="text" name="country_name"></th>
                    </tr>
                    
                    <tr>
                    <th>Region:</th>
                    <th><input type="text" name="region"></th>
                    </tr>
                    
                    <tr>
                    <th>Year:</th>
                    <th><input type="text" name="year"></th>
                    </tr>
                    
                    <tr>
                    <th>CO2:</th>
                    <th><input type="text" name="co2_kt"></th>
                    </tr>
                    
                    </table>
                    <input type="submit" name="submit" value="submit">
                    
                    <p>Give all variables</p>                </form>
                    <?php
                            if (isset($_POST['submit'])){
                    if(!empty($_POST['country_code']) &&  !empty($_POST['country_name']) &&  !empty($_POST['region']) &&  !empty($_POST['year']) ){
                    // Create connection
                    $conn2 = mysqli_connect($host, $db_user, $db_password, $db_name);

                    if (!$conn2) {
                    die("Connection failed: " . mysqli_connect_error());
                    }
         
        

                            $country_code   = $_POST['country_code'];
                            $country_name  = $_POST['country_name'];
                            $region = $_POST['region'];
                            $year    = $_POST['year'];
                            $co2_kt       = $_POST['co2_kt'];

                                    // Create connection
                    $conn2 = mysqli_connect($host, $db_user, $db_password, $db_name);

                    
                    $sql = "INSERT INTO Table_CO2 (Country_Code, Country_Name, Region, Year, CO2_kt)
                    VALUES (" . " '" . $country_code . "', '" . $country_name . "', '" . $region . "', '".$year . "', '" . $co2_kt . "')";
                        if ($conn2->query($sql) === TRUE) {
                                echo "New record created successfully";
                        } else {
                                echo "Error: " . $sql . "<br>" . $conn2->error;
                        }
                         
                            }
                  
                            }
                        ?>
 
            </div>
            <div>
                <form method="get">
                    <input type="text" name="value">
                    <input type="submit" value="Search">
                </form>
            </div>


                    <?php
                    if (!empty($_GET['value'])) {
                        $val = $_GET['value'];
                        $query = 'SELECT * FROM `Table_CO2` WHERE ' .
                        " `Country_Code` LIKE '%".$val."%' OR " .
                        " `Country_Name` LIKE '%".$val."%' OR " .
                        " `Region` LIKE '%".$val."%' OR " .
                        " `Year` LIKE '%".$val."%' OR " .
                        " `CO2_kt` LIKE '%".$val."%';";
                    }
                    else{
                        $query = 'SELECT * FROM `Table_CO2`';
                    }
                    $conn = @new mysqli($host, $db_user, $db_password, $db_name);
            
                    
                    if ($result = @$conn->query($query)) {
                         while($row = mysqli_fetch_assoc($result)) {
                            echo "Code: " . $row["Country_Code"]. "; Name: " . $row["Country_Name"]. "; Region: " . $row["Region"]."; Year: ".$row["Year"]."; Emmision: ".$row["CO2_kt"]. "<br>";
  

                         }
                        } else {
                        echo "Error loading database: " . $conn->error;
                    }
                    $conn->close()
                   ?>


 
  </body>
</html>