<?php
require('connect.php');
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
 
 

 
    <title>Disks-Lab12</title>
  </head>
 
 
  <body>
      <div>
         
            <div >
                <form method="get">
                    <input type="text" name="value">
                    <input type="submit" value="search">
                </form>
            </div>
           
            <div >
                <form method="get" action="disks.xsd">
                   <button type="submit">Plik xsd</button>
                </form><br>
               
                <form method="post" action="">
                    <input type="submit" name="plik" value="Load">
                </form><br>
               
                <form method="POST" id="add">
                    <textarea rows="10" cols="195" name="xmlTextArea" form="add">
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;disks&gt;
    &lt;audio_disk&gt;
        &lt;autor&gt;ZelaznaDama&lt;/autor&gt;
        &lt;dlugosci_nagrania_min&gt;17:13&lt;/dlugosci_nagrania_min&gt;
        &lt;kraj&gt;USA&lt;/kraj&gt;
        &lt;gatunek&gt;Metal&lt;/gatunek&gt;
    &lt;/audio_disk&gt;
    &lt;video_disk&gt;
        &lt;kategoria&gt;dla dzieci&lt;/kategoria&gt;
        &lt;tytul&gt;Piła 4&lt;/tytul&gt;
        &lt;rok&gt;2001&lt;/rok&gt;
    &lt;/video_disk&gt;
&lt;/disks&gt;
 
                    </textarea><br>
                    <input type="submit" value="Dodaj">
                </form>
                    <?php
                   
                    if( isset($_POST['xmlTextArea']))
                    {
                        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                        $xml=simplexml_load_string($_POST['xmlTextArea']) or die("Error: Cannot create object");
                       
                        foreach($xml->children() as $plyta)
                        {
                            $query='none';
                             
                            if ( !empty($plyta->autor) &&
                            !empty($plyta->dlugosci_nagrania_min) && !empty($plyta->kraj)
                            && !empty($plyta->gatunek))
                            {
                                $query = "INSERT INTO `Audio_Disk`(autor, dlugosci_nagrania_min, kraj, gatunek) " .
                                "VALUES ('".$plyta->autor.
                                "', '".$plyta->dlugosci_nagrania_min.
                                "', '".$plyta->kraj.
                                "', '".$plyta->gatunek."');";
                            }
                            else if (!empty($plyta->tytul) && !empty($plyta->rok)
                            && !empty($plyta->kategoria))
                            {
                                $query = "INSERT INTO `Video_Disk`(kategoria, tytul, rok) " .
                                "VALUES ('".$plyta->kategoria.
                                "', '".$plyta->tytul.
                                "', '".$plyta->rok."');";
                            }
                           
                       if ($conn->query($query) === TRUE) {
                                echo "New record created successfully";
                        } else {
                                echo "Error: " . $query . "<br>" . $conn->error;
                        }
                            $endforeach;
                        }
                         $conn->close();
                    }
                   
                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['plik']))
                    {
                        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                        $xml=simplexml_load_file("disks.xml") or die("Error: Cannot create object");  
                       
                        foreach($xml->children() as $plyta)
                        {
                                            $query='none';
                             
                            if ( !empty($plyta->autor) &&
                            !empty($plyta->dlugosci_nagrania_min) && !empty($plyta->kraj)
                            && !empty($plyta->gatunek))
                            {
                                $query = "INSERT INTO `Audio_Disk`(autor, dlugosci_nagrania_min, kraj, gatunek) " .
                                "VALUES ('".$plyta->autor.
                                "', '".$plyta->dlugosci_nagrania_min.
                                "', '".$plyta->kraj.
                                "', '".$plyta->gatunek."');";
                            }
                            else if (!empty($plyta->tytul) && !empty($plyta->rok)
                            && !empty($plyta->kategoria))
                            {
                                $query = "INSERT INTO `Video_Disk`(kategoria, tytul, rok) " .
                                "VALUES ('".$plyta->kategoria.
                                "', '".$plyta->tytul.
                                "', '".$plyta->rok."');";
                            }
                           
                     if ($conn->query($query) === TRUE) {
                                echo "New record created successfully";
                        } else {
                                echo "Error: " . $query . "<br>" . $conn->error;
                        }
                            $endforeach;
                        }
                         $conn->close();
                    }
                    ?>
            </div>
           
            <div>
      

                    <?php
                    if (!empty($_GET['value'])) {
                        $val = $_GET['value'];
                        $query = 'SELECT * FROM `Audio_Disk` WHERE ' .
                        " `autor` LIKE '%".$val."%' OR " .
                        " `dlugosci_nagrania_min` LIKE '%".$val."%' OR " .
                        " `kraj` LIKE '%".$val."%' OR " .
                        " `gatunek` LIKE '%".$val."%';";
                    }
                    else{
                        $query = 'SELECT * FROM `Audio_Disk`';
                    }
                    $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                    if ($result = @$conn->query($query)) {
                         while($row = mysqli_fetch_assoc($result)) {
                            echo "Autor: " . $row["autor"]. "; Dlugosc: " . $row["dlugosci_nagrania_min"]. ";  Kraj: " . $row["kraj"]."; Gatunek: ".$row["gatunek"]. "<br>";
  

                         }
                        } else {
                        echo "Error loading database: " . $conn->error;
                    }
                  $conn->close();
                    ?>
      
       
            </div>
 


                    <?php
                    if (!empty($_GET['value'])) {
                        $val = $_GET['value'];
                        $query = 'SELECT * FROM `Video_Disk` WHERE ' .
                        " `kategoria` LIKE '%".$val."%' OR " .
                        " `tytul` LIKE '%".$val."%' OR " .
                        " `rok` LIKE '%".$val."%';";
                    }
                    else{
                        $query = 'SELECT * FROM `Video_Disk`';
                    }
                    $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                    if ($result = @$conn->query($query)) {
                         while($row = mysqli_fetch_assoc($result)) {
                            echo "Katgoria: " . $row["kategoria"]. "; Tytul: " . $row["tytul"]. ";  Rok: " . $row["rok"]. "<br>";
  

                         }
                        } else {
                        echo "Error loading database: " . $conn->error;
                    }
                    ?>

 
        </div>
 
   
   
  </body>
</html>