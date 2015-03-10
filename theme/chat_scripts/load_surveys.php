<?php

    include('config.inc');
    include('library.php');

//get_surveys($conn,'','','ar9688');



$year = "2015";
$month = "01";
$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

/*try {

    $PDO = $conn->query('SELECT * FROM survey_data WHERE EXTRACT(MONTH FROM completion_date) = "'.$month.'" ORDER BY completion_date DESC LIMIT 1');
    $PDO->setFetchMode(PDO::FETCH_OBJ);
    $row = $PDO->fetch();
    $last_date = $row->completion_date;
    $last_day = date("d", strtotime($last_date));

} catch(PDOException $e) {
    echo 'ERROR: '.$e->getMessage();    
}*/

$file_handle = fopen("January2015.csv", "r");
$rowData = fgetcsv($file_handle);

try {
        
    $PDO = $conn->prepare('DELETE FROM survey_data WHERE EXTRACT(MONTH FROM completion_date) = "'.$month.'"');
    $PDO->execute();
    echo "Surveys removed.<br>";

} catch(PDOException $e) {
    echo 'ERROR: '.$e->getMessage();    
}

/*try {
        
    $PDO = $conn->prepare('DELETE FROM daily_scorecard WHERE EXTRACT(MONTH FROM date) = "'.$month.'"');
    $PDO->execute();
    echo "Scorecards removed.<br>";

} catch(PDOException $e) {
    echo 'ERROR: '.$e->getMessage();    
}*/

$count = 0;

while (!feof($file_handle) ) {
    
  
        
         

    $rowData = fgetcsv($file_handle);


        //$current_from = isset($_POST['current_from']) ? date('Y-m-d', strtotime($_POST['current_from'])) : $current_from_default;


    
        $completion_date = $rowData[0];
        $completion_date = date("Y-m-d", strtotime($completion_date));
        $duration = isset($rowData[1]) ? $rowData[1] : 0;
        $survey_id = isset($rowData[3]) ? $rowData[3] : 0;
        $driver = isset($rowData[67]) ? $rowData[67] : '';
        $resolution = isset($rowData[68]) ? $rowData[68] : '';
        $question = isset($rowData[11]) ? $rowData[11] : '';
        //$level3 = isset($rowData[17]) ? $rowData[17] : '';
        //$device = $rowData[21];
        $verbatim = isset($rowData[45]) ? $rowData[45] : '';
        $rep = isset($rowData[2]) ? $rowData[2] : '';
        //$leader = $rowData[39];
        //$tfcr = isset($rowData[53]) ? $rowData[53] : 0;

        $pwtr = isset($rowData[38]) ? $rowData[38] : 0;
        $pnrs = isset($rowData[39]) ? $rowData[39] : 0;
        $pfcr = isset($rowData[44]) ? $rowData[44] : 9;
        //die($duration);
        
        if($duration != '') {
            //echo $duration."<br>";
            $duration = explode(':',$duration);
            $duration = ((($duration[0]*60)+$duration[1])*60)+$duration[2];
        }
        
         if(count($resolution) == '') {
            echo "1".$resolution;
        } else {
            $resolution = explode(';;',$resolution);
            //$resolution = $resolution[1];

            if(isset($resolution[1])) {
                $resolution = explode(';',$resolution[1]);
            }

            $x = 0;
            $y = 1;
            $g = ',';
            $h = ',';

            if($resolution[0] != '') {  
                
                while($x < count($resolution) && $y < 8) {
                    
                    if($x < count($resolution)-1 && $y < 7) {
                        $g .= '"'.$resolution[$x].'",';
                        $h .= "res_".$y.',';

                    } else {
                        $g .= '"'.$resolution[$x].'"';
                        $h .= "res_".$y; 
                    }  

                    
                    $x++;
                    $y++;
                }
            } else {
                $g = ',"None"';
                $h = ',res_1';
            }
        }


        
        if ($pwtr == 0) { $wtr = 999; }
        elseif ($pwtr < 7) { $wtr = -100; }
        elseif ($pwtr > 6 && $pwtr < 9) { $wtr = 0; }
        else { $wtr = 100; }
    
        if ($pnrs == 0) { $nrs = 999; }
        elseif ($pnrs < 7) { $nrs = -100; }
        elseif ($pnrs > 6 && $pnrs < 9) { $nrs = 0; }
        else { $nrs = 100; }
    
        if ($pfcr == 9) { $fcr = 999; }
        elseif ($pfcr == "Yes") { $fcr = 100; }
        else { $fcr = 0; }
    
        //echo $completion_date.",".$wtr.",".$nrs.",".$fcr.",".$verbatim.",".$rep.",".$driver.",".$resolution.",".$question."<br>";

        //print_r($driver);
        //echo $driver;
        //echo "<br>";

        if(count($driver) == '') {
            echo "1".$driver;
        } else {
            $driver = explode(';;',$driver);

            if(isset($driver[1])) {
                $driver = explode(';',$driver[1]);
            }

            $x = 0;
            $y = 1;
            $i = ',';
            $j = ',';

            if($driver[0] != '') {  
                
                while($x < count($driver) && $y < 8) {
                    
                    if($x < count($driver)-1 && $y < 7) {
                        $i .= '"'.$driver[$x].'",';
                        $j .= "driver_".$y.',';

                    } else {
                        $i .= '"'.$driver[$x].'"';
                        $j .= "driver_".$y; 
                    }  

                    
                    $x++;
                    $y++;
                }
            } else {
                $i = '';
                $j = '';
            }

            
            
            
        }

        
        //print_r($driver);
        
            
        try {
    
            $PDO = $conn->prepare('INSERT INTO survey_data (rep_id,completion_date,survey_id,metric_1,metric_2,metric_3,question,verbatim'.$j.$h.',duration) VALUES (:rep_id,:completion_date,:survey_id,:metric_1,:metric_2,:metric_3,:question,:verbatim'.$i.$g.',:duration)');
            $PDO->bindParam(':survey_id', $survey_id, PDO::PARAM_INT);
            $PDO->bindParam(':completion_date', $completion_date, PDO::PARAM_STR);
            $PDO->bindParam(':metric_1', $wtr, PDO::PARAM_INT);
            $PDO->bindParam(':metric_2', $nrs, PDO::PARAM_INT);
            $PDO->bindParam(':metric_3', $fcr, PDO::PARAM_INT);
            $PDO->bindParam(':verbatim', $verbatim, PDO::PARAM_STR);
            $PDO->bindParam(':rep_id', $rep, PDO::PARAM_STR);
            $PDO->bindParam(':question', $question, PDO::PARAM_STR);
            $PDO->bindParam(':duration', $duration, PDO::PARAM_INT);
            $PDO->execute();

        } catch(PDOException $e) {
            echo 'ERROR: '.$e->getMessage();    
        }
            
         
            //echo $completion_date.",".$ctn.",".$level1.",".$level3.",".$wtr.",".$nrs.",".$fcr.",".$tfcr.",".$verbatim.",".$rep."<br>";
            $count++;

        
    
    
 }

fclose($file_handle);   
    

echo $count." surveys added.<br>";

/*

try {
        
    $PDO = $conn->prepare('SELECT cid FROM roster WHERE rank < 4');
    $PDO->execute();
    echo "Selected roster.<br>";

    //$PDO->setFetchMode(PDO::FETCH_OBJ);

    $roster = $PDO->fetchAll();

} catch(PDOException $e) {
    echo 'ERROR: '.$e->getMessage();    
}


$day = 1;

while ($day <= $last_day) {

    $day2 = sprintf("%02.2d", $day);

    $cdate = $year."-".$month."-".$day2;

    foreach ($roster AS $member) {

        $cid = strtoupper($member[0]);

        $PDO = $conn->prepare('SELECT * FROM survey_data WHERE rep_id = :cid AND completion_date = :cdate');
        $PDO->bindParam(':cid', $cid, PDO::PARAM_STR);
        $PDO->bindParam(':cdate', $cdate, PDO::PARAM_STR);
        $PDO->execute();

        $surveys = $PDO->fetchAll();

        //echo "<pre>";
        //print_r($surveys);
        //echo "</pre>";

        

        $wtr_data = calc_wtr($surveys);
        $nrs_data = calc_nrs($surveys);
        $fcr_data = calc_fcr($surveys);

        //echo $cdate." ".$cid." WTR: ".$wtr_data[1]." NRS: ".$nrs_data[1]." FCR: ".$fcr_data[1]."<br>";

        if($wtr_data[0] != 0 || $nrs_data[0] != 0 || $fcr_data[0] != 0) {

            echo $cdate." ".$cid." WTR: ".$wtr_data[0]." NRS: ".$nrs_data[0]." FCR: ".$fcr_data[0]."<br>";

            $PDO2 = $conn->prepare('INSERT INTO daily_scorecard (cid,date,m1_survey,m1_score,m2_survey,m2_score,m3_survey,m3_score) VALUES (:cid,:date,:m1survey,:m1score,:m2survey,:m2score,:m3survey,:m3score)');
            $PDO2->bindParam(':cid',$cid,PDO::PARAM_STR);
            $PDO2->bindParam(':date',$cdate,PDO::PARAM_STR);
            $PDO2->bindParam(':m1survey',$wtr_data[0],PDO::PARAM_INT);
            $PDO2->bindParam(':m1score',$wtr_data[1],PDO::PARAM_STR);            
            $PDO2->bindParam(':m2survey',$nrs_data[0],PDO::PARAM_INT);
            $PDO2->bindParam(':m2score',$nrs_data[1],PDO::PARAM_STR);           
            $PDO2->bindParam(':m3survey',$fcr_data[0],PDO::PARAM_INT);
            $PDO2->bindParam(':m3score',$fcr_data[1],PDO::PARAM_STR);
            $PDO2->execute();
            
        } else {
            echo "No surveys. <br>";
        }

    }

    $day++;
}
*/


echo "Done.";
//Iterate through each day of the month - put 0s for empty days




?>