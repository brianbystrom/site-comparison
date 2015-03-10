<?php

    include('config.inc');
    //include('library.php');


    $file_handle = fopen("roster.csv", "r");
    $rowData = fgetcsv($file_handle, 1024);

try {
        
    $PDO = $conn->prepare('TRUNCATE TABLE roster');
    $PDO->execute();

} catch(PDOException $e) {
    echo 'ERROR: '.$e->getMessage();    
}

$count = 0;

$rowData = fgetcsv($file_handle, 1024);

while (! feof($file_handle) ) {
    
  
        
         

$rowData = fgetcsv($file_handle, 1024);


    $cid = $rowData[0];
    $name = $rowData[1];
    $mcid = $rowData[3];
    $title = $rowData[4];

    try {
        
        $PDO = $conn->prepare('SELECT rank FROM rank WHERE title = :title');
        $PDO->bindParam(':title', $title, PDO::PARAM_STR);
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);

        if($row = $PDO->fetch()) {
            $rank = $row->rank;

            try {
        
                $PDO2 = $conn->prepare('INSERT INTO roster (cid,name,manager,rank) VALUES (:cid,:name,:manager,:rank)');
                $PDO2->bindParam(':cid', $cid, PDO::PARAM_STR);
                $PDO2->bindParam(':name', $name, PDO::PARAM_STR);
                $PDO2->bindParam(':manager', $mcid, PDO::PARAM_STR);
                $PDO2->bindParam(':rank', $rank, PDO::PARAM_INT);
                $PDO2->execute();

                //echo $name." > ".$title." > ".$rank."<br>";

                $count++;

            } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
            }

        } else {
            
        }

        

    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
 }

fclose($file_handle);   
    
echo "Roster update completed.  ".$count." roster entries added.";

?>