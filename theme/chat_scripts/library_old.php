<?
require_once 'config.inc';

//Returns survey count for given level 1 driver.

function getSurveyCount($leader,$survey_data) {
    
    $count = 0;
    
    
    
        foreach($survey_data AS $values) {
            $count++;   
        }
    
    
    return $count;
}

//Returns array of level 1 drivers based on date range.

function getLevel1List($conn,$from,$to) {
    
    try {
        
        $PDO = $conn->prepare('SELECT DISTINCT level_1 FROM survey_data WHERE (completion_date BETWEEN :from AND :to) ORDER BY level_1 ASC');
        $PDO->bindParam(':from', $from, PDO::PARAM_STR);
        $PDO->bindParam(':to', $to, PDO::PARAM_STR);
        $PDO->execute();
        
        $PDO->setFetchMode(PDO::FETCH_OBJ);

        $x = 0;

        while ($row = $PDO->fetch()) {
            $array[$x] = $row->level_1;
            $x++;
        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $array;
}

//Returns array of level 3 drivers based on given level 1 and date.

function getLevel3List($conn,$from,$to,$level1) {
    
    try {
        
        $PDO = $conn->prepare('SELECT DISTINCT level_3 FROM survey_data WHERE level_1 = :level1 AND (completion_date BETWEEN :from AND :to) ORDER BY level_3 ASC');
        $PDO->bindParam(':from', $from, PDO::PARAM_STR);
        $PDO->bindParam(':to', $to, PDO::PARAM_STR);
        $PDO->bindParam(':level1', $level1, PDO::PARAM_STR);
        $PDO->execute();
        
        $PDO->setFetchMode(PDO::FETCH_OBJ);

        $x = 0;

        while ($row = $PDO->fetch()) {
            $array[$x] = $row->level_3;
            $x++;
        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $array;
}

//Filters out level 1 survey information from main array.

function filterSurveys($level1,$survey_data) {

    $x = 0;
    
    $filtered = array();
    
    foreach($survey_data AS $values) {
        if(count($values) > 0) { 
            if($values['level_1'] == $level1) {
                $filtered[$x]['level_1'] = $values['level_1'];
                $filtered[$x]['level_3'] = $values['level_3'];
                $filtered[$x]['wtr'] = $values['wtr'];
                $filtered[$x]['nrs'] = $values['nrs'];
                $filtered[$x]['fcr'] = $values['fcr'];
                $filtered[$x]['agent'] = $values['agent'];
                $filtered[$x]['leader'] = $values['leader'];
                $filtered[$x]['stl'] = $values['stl'];
                $filtered[$x]['csd'] = $values['csd'];
                $x++;
            }
        }
    }
    
    return $filtered;
}

//Filters out level 3 survey information from main array.

function filterSurveysLevel3($level3,$survey_data) {
    
    $x = 0;
    
    $filtered = array();
    
    foreach($survey_data AS $values) {
        if(count($values) > 0) {                                      
            if($values['level_3'] == $level3) {
                $filtered[$x]['level_1'] = $values['level_1'];
                $filtered[$x]['level_3'] = $values['level_3'];
                $filtered[$x]['wtr'] = $values['wtr'];
                $filtered[$x]['nrs'] = $values['nrs'];
                $filtered[$x]['fcr'] = $values['fcr'];
                $filtered[$x]['agent'] = $values['agent'];
                $filtered[$x]['leader'] = $values['leader'];
                $filtered[$x]['stl'] = $values['stl'];
                $filtered[$x]['csd'] = $values['csd'];
                $x++;
            }
        }
    }
    
    return $filtered;
}

function filterSurveysTL($leader,$survey_data) {
    
    $x = 0;
    
    $filtered = array();
    $leader = strtoupper($leader);
    
    foreach($survey_data AS $values) {
        if(count($values) > 0) { 
            if($values['leader'] == $leader) {
                $filtered[$x]['level_1'] = $values['level_1'];
                $filtered[$x]['level_3'] = $values['level_3'];
                $filtered[$x]['wtr'] = $values['wtr'];
                $filtered[$x]['nrs'] = $values['nrs'];
                $filtered[$x]['fcr'] = $values['fcr'];
                $filtered[$x]['agent'] = $values['agent'];
                $filtered[$x]['leader'] = $values['leader'];
                $filtered[$x]['stl'] = $values['stl'];
                $filtered[$x]['csd'] = $values['csd'];
                $x++;
            }
        }
    }
    
    return $filtered;
}

//Filters out agent survey information from main array.

function filterSurveysAgent($agent,$survey_data) {
    
    $x = 0;
    
    $filtered = array();
    $agent = strtoupper($agent);
    
    foreach($survey_data AS $values) {
        if(count($values) > 0) { 
            if($values['agent'] == $agent) {
                $filtered[$x]['level_1'] = $values['level_1'];
                $filtered[$x]['level_3'] = $values['level_3'];
                $filtered[$x]['wtr'] = $values['wtr'];
                $filtered[$x]['nrs'] = $values['nrs'];
                $filtered[$x]['fcr'] = $values['fcr'];
                $filtered[$x]['agent'] = $values['agent'];
                $filtered[$x]['leader'] = $values['leader'];
                $filtered[$x]['stl'] = $values['stl'];
                $filtered[$x]['csd'] = $values['csd'];
                $x++;
            }
        }
    }

    return $filtered;
}

function filterSurveysSTL($leader,$survey_data) {
    
    $x = 0;
    
    $filtered = array();
    
    foreach($survey_data AS $values) {
        if(count($values) > 0) { 
            if($values['stl'] == $leader) {
                $filtered[$x]['level_1'] = $values['level_1'];
                $filtered[$x]['level_3'] = $values['level_3'];
                $filtered[$x]['wtr'] = $values['wtr'];
                $filtered[$x]['nrs'] = $values['nrs'];
                $filtered[$x]['fcr'] = $values['fcr'];
                $filtered[$x]['agent'] = $values['agent'];
                $filtered[$x]['leader'] = $values['leader'];
                $filtered[$x]['stl'] = $values['stl'];
                $filtered[$x]['csd'] = $values['csd'];
                $x++;
            }
        }
    }

    return $filtered;
    
}

function filterSurveysDirector($leader,$survey_data) {
    
    $x = 0;
    
    $filtered = array();
    
    foreach($survey_data AS $values) {
        if(count($values) > 0) { 
            if($values['csd'] == $leader) {
                $filtered[$x]['level_1'] = $values['level_1'];
                $filtered[$x]['level_3'] = $values['level_3'];
                $filtered[$x]['wtr'] = $values['wtr'];
                $filtered[$x]['nrs'] = $values['nrs'];
                $filtered[$x]['fcr'] = $values['fcr'];
                $filtered[$x]['agent'] = $values['agent'];
                $filtered[$x]['leader'] = $values['leader'];
                $filtered[$x]['stl'] = $values['stl'];
                $filtered[$x]['csd'] = $values['csd'];
                $x++;
            }
        }
    }

    return $filtered;
    
}

//Returns initial survey data based on date range.

function getSurveys($conn,$from,$to,$leader) {
        
    if($leader == 'all') {
        
        try {
            $PDO = $conn->prepare('SELECT level_1,level_3,wtr,nrs,fcr,completion_date,rep,leader,stl,csd FROM survey_data WHERE (csd = "ar9688" AND completion_date BETWEEN :from AND :to)');
            $PDO->bindParam(':from', $from, PDO::PARAM_STR);
            $PDO->bindParam(':to', $to, PDO::PARAM_STR);
            $PDO->execute();
            
            $PDO->setFetchMode(PDO::FETCH_OBJ);
        
            $array_data = array(array());
            $x = 0;

            while ($row = $PDO->fetch()) {

                $array_data[$x]['level_1'] = $row->level_1;
                $array_data[$x]['level_3'] = $row->level_3;
                $array_data[$x]['wtr'] = $row->wtr;
                $array_data[$x]['nrs'] = $row->nrs;
                $array_data[$x]['fcr'] = $row->fcr;
                $array_data[$x]['data'] = $row->completion_date;
                $array_data[$x]['agent'] = $row->rep;
                $array_data[$x]['leader'] = $row->leader;
                $array_data[$x]['stl'] = $row->stl;
                $array_data[$x]['csd'] = $row->csd;

                $x++;
                
            } 
        } catch(PDOException $e) {
            echo 'ERROR: '.$e->getMessage();    
        }
    } else {
    
        $explosion = explode('-',$leader);
        
        if($explosion[0] == 'tl') {
            
            try {
                $PDO = $conn->prepare('SELECT level_1,level_3,wtr,nrs,fcr,completion_date,rep,leader,stl,csd FROM survey_data WHERE leader = :leader AND completion_date BETWEEN :from AND :to');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader',$explosion[1], PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $array_data = array(array());
                $x = 0;

                while ($row = $PDO->fetch()) {

                    $array_data[$x]['level_1'] = $row->level_1;
                    $array_data[$x]['level_3'] = $row->level_3;
                    $array_data[$x]['wtr'] = $row->wtr;
                    $array_data[$x]['nrs'] = $row->nrs;
                    $array_data[$x]['fcr'] = $row->fcr;
                    $array_data[$x]['data'] = $row->completion_date;
                    $array_data[$x]['agent'] = $row->rep;
                    $array_data[$x]['leader'] = $row->leader;
                    $array_data[$x]['stl'] = $row->stl;
                    $array_data[$x]['csd'] = $row->csd;

                    $x++;

                } 
            } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
            }
            
        } elseif($explosion[0] == 'stl') {
                        
            try {
                $PDO = $conn->prepare('SELECT level_1,level_3,wtr,nrs,fcr,completion_date,rep,leader,stl,csd FROM survey_data WHERE stl = :leader AND completion_date BETWEEN :from AND :to');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader',$explosion[1], PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $array_data = array(array());
                $x = 0;

                while ($row = $PDO->fetch()) {

                    $array_data[$x]['level_1'] = $row->level_1;
                    $array_data[$x]['level_3'] = $row->level_3;
                    $array_data[$x]['wtr'] = $row->wtr;
                    $array_data[$x]['nrs'] = $row->nrs;
                    $array_data[$x]['fcr'] = $row->fcr;
                    $array_data[$x]['data'] = $row->completion_date;
                    $array_data[$x]['agent'] = $row->rep;
                    $array_data[$x]['leader'] = $row->leader;
                    $array_data[$x]['stl'] = $row->stl;
                    $array_data[$x]['csd'] = $row->csd;

                    $x++;

                } 
            } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
            } 
            
        } elseif($explosion[0] == 'agent') {
            
            try {
                $PDO = $conn->prepare('SELECT level_1,level_3,wtr,nrs,fcr,completion_date,rep,leader,stl,csd FROM survey_data WHERE rep = :leader AND completion_date BETWEEN :from AND :to');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader',$explosion[1], PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $array_data = array(array());
                $x = 0;

                while ($row = $PDO->fetch()) {

                    $array_data[$x]['level_1'] = $row->level_1;
                    $array_data[$x]['level_3'] = $row->level_3;
                    $array_data[$x]['wtr'] = $row->wtr;
                    $array_data[$x]['nrs'] = $row->nrs;
                    $array_data[$x]['fcr'] = $row->fcr;
                    $array_data[$x]['data'] = $row->completion_date;
                    $array_data[$x]['agent'] = $row->rep;
                    $array_data[$x]['leader'] = $row->leader;
                    $array_data[$x]['stl'] = $row->stl;
                    $array_data[$x]['csd'] = $row->csd;

                    $x++;

                } 
            } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
            }     
            
        } elseif($explosion[0] == 'csd') {

            try {
                $PDO = $conn->prepare('SELECT level_1,level_3,wtr,nrs,fcr,completion_date,rep,leader,stl,csd FROM survey_data WHERE csd = :leader AND completion_date BETWEEN :from AND :to');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader',$explosion[1], PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $array_data = array(array());
                $x = 0;

                while ($row = $PDO->fetch()) {

                    $array_data[$x]['level_1'] = $row->level_1;
                    $array_data[$x]['level_3'] = $row->level_3;
                    $array_data[$x]['wtr'] = $row->wtr;
                    $array_data[$x]['nrs'] = $row->nrs;
                    $array_data[$x]['fcr'] = $row->fcr;
                    $array_data[$x]['data'] = $row->completion_date;
                    $array_data[$x]['agent'] = $row->rep;
                    $array_data[$x]['leader'] = $row->leader;
                    $array_data[$x]['stl'] = $row->stl;
                    $array_data[$x]['csd'] = $row->csd;

                    $x++;

                } 
            } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
            }     

        }
    }
    
    return $array_data;
}

//Returns WTR score for given level 1.

function getLevel1WTR($level1,$surveys) {
    
    $wtr_sum = 0;
    $count = 0;
    
    foreach($surveys AS $values) {
        if($values['wtr'] < 999) {
            $wtr_sum += $values['wtr']; 
            $count++; 
        }
    }
        
    if($count == 0) { $true_wtr = 0; }
    else { $true_wtr = $wtr_sum / $count; }
    
    $true_wtr = number_format($true_wtr, 2, '.', '');
    
    return $true_wtr;
}

//Returns NRS score for given level 1.

function getLevel1NRS($level1,$surveys) {
    
    $nrs_sum = 0;
    $count = 0;
    
    foreach($surveys AS $values) {
        if($values['nrs'] < 999) {
            $nrs_sum += $values['nrs']; 
            $count++; 
        }
    }
    
    if($count == 0) { $true_nrs = 0; }
    else { $true_nrs = $nrs_sum / $count; }
    
    $true_nrs = number_format($true_nrs, 2, '.', '');
    
    return $true_nrs;
}

//Returns FCR score for given level 1.

function getLevel1FCR($level1,$surveys) {
    
    $fcr_sum = 0;
    $count = 0;
    
    foreach($surveys AS $values) {
        if($values['fcr'] < 999) {
            $fcr_sum += $values['fcr']; 
            $count++; 
        }
    }
    
    if($count == 0) { $true_fcr = 0; }
    else { $true_fcr = $fcr_sum / $count; }
    
    $true_fcr = number_format($true_fcr, 2, '.', '');    
    
    return $true_fcr;
}

//Returns CSS style based on WTR score provided.  
//If $type == "stat" than it's the baseline stat.
//If $type == "delta" than it's the difference.

function getPercentStyle($percent) {
    

    if ($percent > 0) { $style = "mt-delta-trend-up"; }
    elseif ($percent < 0) { $style = "mt-delta-trend-down"; }
    else { $style = ""; }

    
    return $style;
}


function getWTRStyle($wtr,$type) {
    
    $style = '';
    
    if ($type == "stat") {
        if ($wtr < 30) { $style = "negative-metric"; }
        elseif ($wtr > 50) { $style = "positive-metric"; }
        else { $style = ""; }
    }
    else {
        if ($wtr > 0) { $style = "mt-delta-trend-up"; }
        elseif ($wtr < 0) { $style = "mt-delta-trend-down"; }
        else { $style = ""; }
    }
    
    return $style;
}

//Returns CSS style based on NRS score provided.  
//If $type == "stat" than it's the baseline stat.
//If $type == "delta" than it's the difference.

function getNRSStyle($nrs,$type) {
    
    $style = '';
    
    if ($type == "stat") {
        if ($nrs < 60) { $style = "negative-metric"; }
        elseif ($nrs > 80) { $style = "positive-metric"; }
        else { $style = ""; }
    }
    else {
        if ($nrs > 0) { $style = "mt-delta-trend-up"; }
        elseif ($nrs < 0) { $style = "mt-delta-trend-down"; }
        else { $style = ""; }
    }
    
    return $style;
}

//Returns CSS style based on FCR score provided.  
//If $type == "stat" than it's the baseline stat.
//If $type == "delta" than it's the difference.

function getFCRStyle($fcr,$type) {
    
    $style = '';
    
    if ($type == "stat") {
        if ($fcr < 60) { $style = "negative-metric"; }
        elseif ($fcr > 80) { $style = "positive-metric"; }
        else { $style = ""; }
    }
    else {
        if ($fcr > 0) { $style = "mt-delta-trend-up"; }
        elseif ($fcr < 0) { $style = "mt-delta-trend-down"; }
        else { $fcr = ""; }
    }
    
    return $style;
}

//Presorts array, used to line up keys in charts.

function record_sort($records, $field, $reverse)
{
    $hash = array();
    
    foreach($records as $record) {
        $hash[$record[$field]] = $record;
    }
    
    ($reverse)? krsort($hash) : ksort($hash);
    
    $records = array();
    
    foreach($hash as $record) {
        $records []= $record;
    }
    
    return $records;
}

//Returns rollup information array.

function getRollup($conn,$level,$driver,$from,$to,$leader) {
    
    if ($leader == 'all') {
        
        try {
            $PDO = $conn->prepare('SELECT COUNT(completion_date) AS completion_date FROM survey_data WHERE (csd = "ar9688") AND (completion_date BETWEEN :from AND :to)');
            $PDO->bindParam(':from', $from, PDO::PARAM_STR);
            $PDO->bindParam(':to', $to, PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);
            
            $row = $PDO->fetch();

            $count = $row->completion_date;
                
        } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
        }
        
        try {
            $PDO = $conn->prepare('SELECT SUM(wtr) AS wtr_sum, COUNT(wtr) AS wtr_count FROM survey_data WHERE (csd = "ar9688") AND (wtr != "999" AND  completion_date BETWEEN :from AND :to)');
            $PDO->bindParam(':from', $from, PDO::PARAM_STR);
            $PDO->bindParam(':to', $to, PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);
            
            $row = $PDO->fetch();

            $wtr_sum = $row->wtr_sum;
            $wtr_count = $row->wtr_count;
            
            if($wtr_count == 0) {
                $wtr_rollup = 0;
                $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
            }
            else {
                $wtr_rollup = $wtr_sum / $wtr_count;
                $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
            }
                
        } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
        }
        
        try {
            $PDO = $conn->prepare('SELECT SUM(nrs) AS nrs_sum, COUNT(nrs) AS nrs_count FROM survey_data WHERE (csd = "ar9688") AND (nrs != "999" AND  completion_date BETWEEN :from AND :to)');
            $PDO->bindParam(':from', $from, PDO::PARAM_STR);
            $PDO->bindParam(':to', $to, PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);
            
            $row = $PDO->fetch();

            $nrs_sum = $row->nrs_sum;
            $nrs_count = $row->nrs_count;
            
            if($nrs_count == 0) {
                $nrs_rollup = 0;
                $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
            }
            else {
                $nrs_rollup = $nrs_sum / $nrs_count;
                $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
            }
                
        } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
        }
        
        try {
            $PDO = $conn->prepare('SELECT SUM(fcr) AS fcr_sum, COUNT(fcr) AS fcr_count FROM survey_data WHERE (csd = "ar9688") AND (fcr != "999" AND  completion_date BETWEEN :from AND :to)');
            $PDO->bindParam(':from', $from, PDO::PARAM_STR);
            $PDO->bindParam(':to', $to, PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);
            
            $row = $PDO->fetch();

            $fcr_sum = $row->fcr_sum;
            $fcr_count = $row->fcr_count;
            
            if($fcr_count == 0) {
                $fcr_rollup = 0;
                $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
            }
            else {
                $fcr_rollup = $fcr_sum / $fcr_count;
                $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
            }
                
        } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
        }

        $rollup_array[0] = $count;
        $rollup_array[1] = $wtr_rollup;
        $rollup_array[2] = $nrs_rollup;
        $rollup_array[3] = $fcr_rollup;
        
    } else {
        
        $explosion = explode('-',$leader);
        $leader = $explosion[1];
        
        if($explosion[0] == 'tl') {
        
            try {
                $PDO = $conn->prepare('SELECT COUNT(completion_date) AS completion_date FROM survey_data WHERE leader = :leader AND (completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $count = $row->completion_date;

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(wtr) AS wtr_sum, COUNT(wtr) AS wtr_count FROM survey_data WHERE leader = :leader AND (wtr != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $wtr_sum = $row->wtr_sum;
                $wtr_count = $row->wtr_count;

                if($wtr_count == 0) {
                    $wtr_rollup = 0;
                    $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
                }
                else {
                    $wtr_rollup = $wtr_sum / $wtr_count;
                    $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(nrs) AS nrs_sum, COUNT(nrs) AS nrs_count FROM survey_data WHERE leader = :leader AND (nrs != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $nrs_sum = $row->nrs_sum;
                $nrs_count = $row->nrs_count;

                if($nrs_count == 0) {
                    $nrs_rollup = 0;
                    $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
                }
                else {
                    $nrs_rollup = $nrs_sum / $nrs_count;
                    $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(fcr) AS fcr_sum, COUNT(fcr) AS fcr_count FROM survey_data WHERE leader = :leader AND (fcr != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $fcr_sum = $row->fcr_sum;
                $fcr_count = $row->fcr_count;

                if($fcr_count == 0) {
                    $fcr_rollup = 0;
                    $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
                }
                else {
                    $fcr_rollup = $fcr_sum / $fcr_count;
                    $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            $rollup_array[0] = $count;
            $rollup_array[1] = $wtr_rollup;
            $rollup_array[2] = $nrs_rollup;
            $rollup_array[3] = $fcr_rollup;

            
        
        } elseif($explosion[0] == 'agent') {
        
            try {
                $PDO = $conn->prepare('SELECT COUNT(completion_date) AS completion_date FROM survey_data WHERE rep = :leader AND (completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $count = $row->completion_date;

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(wtr) AS wtr_sum, COUNT(wtr) AS wtr_count FROM survey_data WHERE rep = :leader AND (wtr != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $wtr_sum = $row->wtr_sum;
                $wtr_count = $row->wtr_count;

                if($wtr_count == 0) {
                    $wtr_rollup = 0;
                    $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
                }
                else {
                    $wtr_rollup = $wtr_sum / $wtr_count;
                    $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(nrs) AS nrs_sum, COUNT(nrs) AS nrs_count FROM survey_data WHERE rep = :leader AND (nrs != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $nrs_sum = $row->nrs_sum;
                $nrs_count = $row->nrs_count;

                if($nrs_count == 0) {
                    $nrs_rollup = 0;
                    $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
                }
                else {
                    $nrs_rollup = $nrs_sum / $nrs_count;
                    $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(fcr) AS fcr_sum, COUNT(fcr) AS fcr_count FROM survey_data WHERE rep = :leader AND (fcr != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $fcr_sum = $row->fcr_sum;
                $fcr_count = $row->fcr_count;

                if($fcr_count == 0) {
                    $fcr_rollup = 0;
                    $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
                }
                else {
                    $fcr_rollup = $fcr_sum / $fcr_count;
                    $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            $rollup_array[0] = $count;
            $rollup_array[1] = $wtr_rollup;
            $rollup_array[2] = $nrs_rollup;
            $rollup_array[3] = $fcr_rollup;
            
        
        }
        
        elseif($explosion[0] == 'stl') {
                        
            try {
                $PDO = $conn->prepare('SELECT COUNT(completion_date) AS completion_date FROM survey_data WHERE stl = :leader AND (completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $count = $row->completion_date;

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(wtr) AS wtr_sum, COUNT(wtr) AS wtr_count FROM survey_data WHERE stl = :leader AND (wtr != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $wtr_sum = $row->wtr_sum;
                $wtr_count = $row->wtr_count;

                if($wtr_count == 0) {
                    $wtr_rollup = 0;
                    $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
                }
                else {
                    $wtr_rollup = $wtr_sum / $wtr_count;
                    $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(nrs) AS nrs_sum, COUNT(nrs) AS nrs_count FROM survey_data WHERE stl = :leader AND (nrs != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $nrs_sum = $row->nrs_sum;
                $nrs_count = $row->nrs_count;

                if($nrs_count == 0) {
                    $nrs_rollup = 0;
                    $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
                }
                else {
                    $nrs_rollup = $nrs_sum / $nrs_count;
                    $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(fcr) AS fcr_sum, COUNT(fcr) AS fcr_count FROM survey_data WHERE stl = :leader AND (fcr != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $fcr_sum = $row->fcr_sum;
                $fcr_count = $row->fcr_count;

                if($fcr_count == 0) {
                    $fcr_rollup = 0;
                    $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
                }
                else {
                    $fcr_rollup = $fcr_sum / $fcr_count;
                    $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            $rollup_array[0] = $count;
            $rollup_array[1] = $wtr_rollup;
            $rollup_array[2] = $nrs_rollup;
            $rollup_array[3] = $fcr_rollup;
        }
        
        elseif($explosion[0] == 'csd') {
            
            try {
                $PDO = $conn->prepare('SELECT COUNT(completion_date) AS completion_date FROM survey_data WHERE csd = :leader AND (completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $count = $row->completion_date;

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(wtr) AS wtr_sum, COUNT(wtr) AS wtr_count FROM survey_data WHERE csd = :leader AND (wtr != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $wtr_sum = $row->wtr_sum;
                $wtr_count = $row->wtr_count;

                if($wtr_count == 0) {
                    $wtr_rollup = 0;
                    $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
                }
                else {
                    $wtr_rollup = $wtr_sum / $wtr_count;
                    $wtr_rollup = number_format($wtr_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(nrs) AS nrs_sum, COUNT(nrs) AS nrs_count FROM survey_data WHERE csd = :leader AND (nrs != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $nrs_sum = $row->nrs_sum;
                $nrs_count = $row->nrs_count;

                if($nrs_count == 0) {
                    $nrs_rollup = 0;
                    $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
                }
                else {
                    $nrs_rollup = $nrs_sum / $nrs_count;
                    $nrs_rollup = number_format($nrs_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            try {
                $PDO = $conn->prepare('SELECT SUM(fcr) AS fcr_sum, COUNT(fcr) AS fcr_count FROM survey_data WHERE csd = :leader AND (fcr != "999" AND  completion_date BETWEEN :from AND :to)');
                $PDO->bindParam(':from', $from, PDO::PARAM_STR);
                $PDO->bindParam(':to', $to, PDO::PARAM_STR);
                $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
                $PDO->execute();

                $PDO->setFetchMode(PDO::FETCH_OBJ);

                $row = $PDO->fetch();

                $fcr_sum = $row->fcr_sum;
                $fcr_count = $row->fcr_count;

                if($fcr_count == 0) {
                    $fcr_rollup = 0;
                    $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
                }
                else {
                    $fcr_rollup = $fcr_sum / $fcr_count;
                    $fcr_rollup = number_format($fcr_rollup, 2, '.', '');
                }

            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }

            $rollup_array[0] = $count;
            $rollup_array[1] = $wtr_rollup;
            $rollup_array[2] = $nrs_rollup;
            $rollup_array[3] = $fcr_rollup;
        }
    }
    
    return $rollup_array;
}


function createTableArray($level_1_drivers,$current_surveys,$compare_surveys,$rollup_JUNE,$rollup_MAY) {
    
    $x = 0;
    
    foreach ($level_1_drivers as $value) {

                $level1_array = filterSurveys($value,$current_surveys);
                $level1_compare_array = filterSurveys($value,$compare_surveys);  
        
                $count = getSurveyCount($value,$level1_array);
                $wtr = getLevel1WTR($value,$level1_array);
                $nrs = getLevel1NRS($value,$level1_array);
                $fcr = getLevel1FCR($value,$level1_array);

                $count_compare = getSurveyCount($value,$level1_compare_array);
                $wtr_compare = getLevel1WTR($value,$level1_compare_array);
                $nrs_compare = getLevel1NRS($value,$level1_compare_array);
                $fcr_compare = getLevel1FCR($value,$level1_compare_array);
                
    
        
                if($rollup_JUNE[0] == 0) {
                    $percent_volume = 0;
                }
                else {
                    $percent_volume = ($count / $rollup_JUNE[0]) * 100;
                }
                
                if($rollup_MAY[0] == 0) {
                    $percent_volume_compare = 0;
                }
                else {
                    $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100;
                }

                $surveys_delta = $count - $count_compare;
                $wtr_delta = $wtr - $wtr_compare;
                $nrs_delta = $nrs - $nrs_compare;
                $fcr_delta = $fcr - $fcr_compare;
                $percent_volume_delta = $percent_volume - $percent_volume_compare;

                $wtr_delta = number_format($wtr_delta, 2, '.', '');
                $nrs_delta = number_format($nrs_delta, 2, '.', '');
                $fcr_delta = number_format($fcr_delta, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $percent_volume = number_format($percent_volume, 2, '.', '');
                $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');
        
                $fs = $count;
                $fw = $wtr;
                $ff = $fcr;
                $fv = $percent_volume;

                $fw = $fw-38;
                $ff = $ff-70;

                if($fw > 10) {$fw = 10;}
                elseif($fw < -10) {$fw = -10;}

                if($ff > 10) {$ff = 10;}
                elseif($ff < -10) {$ff = -10;}



                $f = ((($fw)*.4) + (($ff)*.6))*($fs*100);

                //$month_array[$x] = array();
                $month_array[$x]['level_1'] = $value;
                $month_array[$x]['surveys'] = $count;
                $month_array[$x]['wtr'] = $wtr;
                $month_array[$x]['nrs'] = $nrs;
                $month_array[$x]['fcr'] = $fcr;
                $month_array[$x]['surveys_compare'] = $count_compare;
                $month_array[$x]['wtr_compare'] = $wtr_compare;
                $month_array[$x]['nrs_compare'] = $nrs_compare;
                $month_array[$x]['fcr_compare'] = $fcr_compare;
                $month_array[$x]['surveys_delta'] = $surveys_delta;
                $month_array[$x]['wtr_delta'] = $wtr_delta;
                $month_array[$x]['nrs_delta'] = $nrs_delta;
                $month_array[$x]['fcr_delta'] = $fcr_delta;
                $month_array[$x]['percent_volume'] = $percent_volume;
                $month_array[$x]['percent_volume_compare'] = $percent_volume_compare;
                $month_array[$x]['percent_volume_delta'] = $percent_volume_delta;
                $month_array[$x]['score'] = $f;

                $x++;
        
            } 
    
    return $month_array;
    
}

function spitLevel1Table ($conn,$chart_array,$current_surveys,$compare_surveys,$rollup_JUNE,$rollup_MAY,$display_current_from,$display_current_to,$display_compare_from,$display_compare_to,$current_from,$current_to,$leader) {
    
    if($leader == 'all') { $name = "All Up"; } 
    else {
        
        try {
            $explosion = explode('-',$leader);
            
            $PDO = $conn->prepare('SELECT name FROM leadership WHERE cid = :leader');
            $PDO->bindParam(':leader', $explosion[1], PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);

            $row = $PDO->fetch();
            $name = $row->name;

               
            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }
    
    }

    $table = "<table id='mainTable' class='tablesorter'>
    <thead>
        <tr>
            <td class='mt-header' colspan='1'>".$name."&nbsp&nbsp<img src='images/team_icon.png'></img></td>
            <td class='mt-header' colspan='5'>".$display_current_from." - ".$display_current_to."</td>
            <td class='mt-header' colspan='5'>".$display_compare_from." - ".$display_compare_to."</td>
            <td class='mt-header' colspan='5'>Change</td>
            <td class='mt-header options-icon'></td>
        </tr>
        <tr>
            <th class='mt-cat-header'>Level 1</th>
            <th class='mt-cat-header'>Surveys</th>
            <th class='mt-cat-header'>% Vol</th>
            <th class='mt-cat-header'>WTR</th>
            <th class='mt-cat-header'>NRS</th>
            <th class='mt-cat-header'>FCR</th>
            <th class='mt-cat-header'>Surveys</th>
            <th class='mt-cat-header'>% Vol</th>
            <th class='mt-cat-header'>WTR</th>
            <th class='mt-cat-header'>NRS</th>
            <th class='mt-cat-header'>FCR</th>
            <th class='mt-cat-header'>Surveys</th>
            <th class='mt-cat-header'>% Vol</th>
            <th class='mt-cat-header'>WTR</th>
            <th class='mt-cat-header'>NRS</th>
            <th class='mt-cat-header'>FCR</th>
            <th class='mt-cat-header'>Options</th>
        </tr>
    </thead>
    <tbody>";
    
    //$month_array = record_sort($month_array,'current_surveys','true');
    
    $total_delta_surveys = $rollup_JUNE[0] - $rollup_MAY[0];
    $total_delta_wtr = $rollup_JUNE[1] - $rollup_MAY[1];
    $total_delta_nrs = $rollup_JUNE[2] - $rollup_MAY[2];
    $total_delta_fcr = $rollup_JUNE[3] - $rollup_MAY[3];
    
    $total_delta_surveys = number_format($total_delta_surveys, 2, '.', '');
    $total_delta_wtr = number_format($total_delta_wtr, 2, '.', '');
    $total_delta_nrs = number_format($total_delta_nrs, 2, '.', '');
    $total_delta_fcr = number_format($total_delta_fcr, 2, '.', '');

    foreach ($chart_array as $value) {
        
        if($value['surveys'] > 0) {
            $wtr_style = getWTRStyle($value['wtr'],"stat");
            $nrs_style = getNRSStyle($value['nrs'],"stat");
            $fcr_style = getFCRStyle($value['fcr'],"stat");
         }
        else {
            $wtr_style = "";
            $nrs_style = "";
            $fcr_style = "";
        }
        
        if($value['surveys_compare'] > 0) {

            $compare_wtr_style = getWTRStyle($value['wtr_compare'],"stat");
            $compare_nrs_style = getNRSStyle($value['nrs_compare'],"stat");
            $compare_fcr_style = getFCRStyle($value['fcr_compare'],"stat");
        }
        else { 
            $compare_wtr_style = "";
            $compare_nrs_style = "";
            $compare_fcr_style = "";
        }
        
        if ($value['surveys'] > 0 && $value['surveys_compare'] > 0) {
        
            $delta_wtr_style = getWTRStyle($value['wtr_delta'],"delta");
            $delta_nrs_style = getNRSStyle($value['nrs_delta'],"delta");
            $delta_fcr_style = getFCRStyle($value['fcr_delta'],"delta");
        }
        else {
            $delta_wtr_style = "";
            $delta_nrs_style = "";
            $delta_fcr_style = "";
        }
                
        $fs = $value['surveys'];
        $fw = $value['wtr'];
        $ff = $value['fcr'];
        $fv = $value['percent_volume'];
        
        $fw = $fw-38;
        $ff = $ff-70;
        
        if($fw > 10) {$fw = 10;}
        elseif($fw < -10) {$fw = -10;}
        
        if($ff > 10) {$ff = 10;}
        elseif($ff < -10) {$ff = -10;}
        
        
        
        $f = ((($fw)*.4) + (($ff)*.6))*($fs*100);
        
        
        $level_3_list = getLevel3List($conn,$current_from,$current_to,$value['level_1']);
        
        $table .= "<tr class='mt-primary'>
            <td class='mt-primary-border-both collapsed'>".$value['level_1']."</td>
            <td class='mt-border-left'>".$value['surveys']."</td>
            <td class='mt-no-border'>".$value['percent_volume']."</td>
            <td class='mt-no-border ".$wtr_style."'>".$value['wtr']."</td>
            <td class='mt-no-border ".$nrs_style."'>".$value['nrs']."</td>
            <td class='mt-border-right ".$fcr_style."'>".$value['fcr']."</td>
            <td class='mt-border-left'>".$value['surveys_compare']."</td>
            <td class='mt-no-border'>".$value['percent_volume_compare']."</td>
            <td class='mt-no-border ".$compare_wtr_style."'>".$value['wtr_compare']."</td>
            <td class='mt-no-border ".$compare_nrs_style."'>".$value['nrs_compare']."</td>
            <td class='mt-border-right ".$compare_fcr_style."'>".$value['fcr_compare']."</td>
            <td class='mt-border-left'>".$value['surveys_delta']."</td>
            <td class='mt-no-border'>".$value['percent_volume_delta']."</td>
            <td class='mt-no-border ".$delta_wtr_style."'>".$value['wtr_delta']."</td>
            <td class='mt-no-border ".$delta_nrs_style."'>".$value['nrs_delta']."</td>
            <td class='mt-border-right ".$delta_fcr_style."'>".$value['fcr_delta']."</td>
            <td class='mt-primary-options-border-both'><a onClick=\"javascript:showVerbatims('".$leader."','l1-".$value['level_1']."')\"><img src='images/verbatim_icon.png'></img></a></td>
        </tr>";
        
        $x = 0;
        
        foreach ($level_3_list as $values) {
            
            $level3_array = filterSurveysLevel3($values,$current_surveys);
            $level3_compare_array = filterSurveysLevel3($values,$compare_surveys);
            
            $count = getSurveyCount($values,$level3_array);
            $wtr = getLevel1WTR($values,$level3_array);
            $nrs = getLevel1NRS($values,$level3_array);
            $fcr = getLevel1FCR($values,$level3_array);

            $count_compare = getSurveyCount($values,$level3_compare_array);
            $wtr_compare = getLevel1WTR($values,$level3_compare_array);
            $nrs_compare = getLevel1NRS($values,$level3_compare_array);
            $fcr_compare = getLevel1FCR($values,$level3_compare_array);

            
            if($rollup_JUNE[0] == 0) { $percent_volume = 0; }
            else { $percent_volume = ($count / $rollup_JUNE[0]) * 100; }
            if($rollup_MAY[0] == 0) { $percent_volume_compare = 0; }
            else { $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100; }
            

            $surveys_delta = $count - $count_compare;
            $wtr_delta = $wtr - $wtr_compare;
            $nrs_delta = $nrs - $nrs_compare;
            $fcr_delta = $fcr - $fcr_compare;
            $percent_volume_delta = $percent_volume - $percent_volume_compare;

            $wtr_delta = number_format($wtr_delta, 2, '.', '');
            $nrs_delta = number_format($nrs_delta, 2, '.', '');
            $fcr_delta = number_format($fcr_delta, 2, '.', '');
            $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

            $percent_volume = number_format($percent_volume, 2, '.', '');
            $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
            $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');
            
            
            if($count > 0) {
                $wtr_style = getWTRStyle($wtr,"stat");
                $nrs_style = getNRSStyle($nrs,"stat");
                $fcr_style = getFCRStyle($fcr,"stat");
            }
            else {
                $wtr_style = "";
                $nrs_style = "";
                $fcr_style = "";
            }
            
            if($count_compare > 0) {

                $compare_wtr_style = getWTRStyle($wtr_compare,"stat");
                $compare_nrs_style = getNRSStyle($nrs_compare,"stat");
                $compare_fcr_style = getFCRStyle($fcr_compare,"stat");
            }
            else {
                $compare_wtr_style = "";
                $compare_nrs_style = "";
                $compare_fcr_style = "";
            }
            if ($count > 0 && $count_compare > 0) {
        
            $delta_wtr_style = getWTRStyle($wtr_delta,"delta");
            $delta_nrs_style = getNRSStyle($nrs_delta,"delta");
            $delta_fcr_style = getFCRStyle($fcr_delta,"delta");
            }
            else {
                $delta_wtr_style = "";
                $delta_nrs_style = "";
                $delta_fcr_style = "";
            }
            
            $sort[$x]['level_3'] = $values;
            $sort[$x]['surveys'] = $count;
            $sort[$x]['volume'] = $percent_volume;
            $sort[$x]['wtr_style'] = $wtr_style;
            $sort[$x]['nrs_style'] = $nrs_style;
            $sort[$x]['fcr_style'] = $fcr_style;
            $sort[$x]['wtr'] = $wtr;
            $sort[$x]['nrs'] = $nrs;
            $sort[$x]['fcr'] = $fcr;
            $sort[$x]['compare_count'] = $count_compare;
            $sort[$x]['compare_volume'] = $percent_volume_compare;
            $sort[$x]['compare_wtr_style'] = $compare_wtr_style;
            $sort[$x]['compare_nrs_style'] = $compare_nrs_style;
            $sort[$x]['compare_fcr_style'] = $compare_fcr_style;
            $sort[$x]['compare_wtr'] = $wtr_compare;
            $sort[$x]['compare_nrs'] = $nrs_compare;
            $sort[$x]['compare_fcr'] = $fcr_compare;
            $sort[$x]['delta_surveys'] = $surveys_delta;
            $sort[$x]['delta_percent'] = $percent_volume_delta;
            $sort[$x]['delta_wtr_style'] = $delta_wtr_style;
            $sort[$x]['delta_nrs_style'] = $delta_nrs_style;
            $sort[$x]['delta_fcr_style'] = $delta_fcr_style;
            $sort[$x]['delta_wtr'] = $wtr_delta;
            $sort[$x]['delta_nrs'] = $nrs_delta;
            $sort[$x]['delta_fcr'] = $fcr_delta;
            
            $x++;
            
            
         }      
            
        $sorted = val_sort($sort,'surveys',true);
        
        foreach($sorted AS $values) {
        
            $table .= "<tr class='expand-child'>
                <td class='mt-secondary-border-both'>".$values['level_3']."</td>
                <td class='mt-border-left'>".$values['surveys']."</td>
                <td class='mt-no-border'>".$values['volume']."</td>
                <td class='mt-no-border ".$values['wtr_style']."'>".$values['wtr']."</td>
                <td class='mt-no-border ".$values['nrs_style']."'>".$values['nrs']."</td>
                <td class='mt-border-right ".$values['fcr_style']."'>".$values['fcr']."</td>
                <td class='mt-border-left'>".$values['compare_count']."</td>
                <td class='mt-no-border'>".$values['compare_volume']."</td>
                <td class='mt-no-border ".$values['compare_wtr_style']."'>".$values['compare_wtr']."</td>
                <td class='mt-no-border ".$values['compare_nrs_style']."'>".$values['compare_nrs']."</td>
                <td class='mt-border-right ".$values['compare_fcr_style']."'>".$values['compare_fcr']."</td>
                <td class='mt-border-left'>".$values['delta_surveys']."</td>
                <td class='mt-no-border'>".$values['delta_percent']."</td>
                <td class='mt-no-border ".$values['delta_wtr_style']."'>".$values['delta_wtr']."</td>
                <td class='mt-no-border ".$values['delta_nrs_style']."'>".$values['delta_nrs']."</td>
                <td class='mt-border-right ".$values['delta_fcr_style']."'>".$values['delta_fcr']."</td>
                <td class='mt-secondary-options-border-both'><a onClick=\"javascript:showVerbatims('".$leader."','l3-".$values['level_3']."')\"><img src='images/verbatim_icon.png'></img></a></td>
            </tr>";
            
        
        }

        unset($sort);
    }
    
    $table .= "</tbody>
    <tfoot>
        <tr>
            <th class='mt-cat-header'>Roll-up</th>
            <th class='mt-cat-header'>".$rollup_JUNE[0]."</th>
            <th class='mt-cat-header'></th>
            <th class='mt-cat-header'>".$rollup_JUNE[1]."</th>
            <th class='mt-cat-header'>".$rollup_JUNE[2]."</th>
            <th class='mt-cat-header'>".$rollup_JUNE[3]."</th>
            <th class='mt-cat-header'>".$rollup_MAY[0]."</th>
            <th class='mt-cat-header'></th>
            <th class='mt-cat-header'>".$rollup_MAY[1]."</th>
            <th class='mt-cat-header'>".$rollup_MAY[2]."</th>
            <th class='mt-cat-header'>".$rollup_MAY[3]."</th>
            <th class='mt-cat-header'>".$total_delta_surveys."</th>
            <th class='mt-cat-header'></th>
            <th class='mt-cat-header'>".$total_delta_wtr."</th>
            <th class='mt-cat-header'>".$total_delta_nrs."</th>
            <th class='mt-cat-header'>".$total_delta_fcr."</th>
            <th class='mt-cat-header'></th>
        </tr>
    </tfoot>
    </table>";
    
    return $table;
    
}

function spitTeamTable($conn,$chart_array,$current_surveys,$compare_surveys,$rollup_JUNE,$rollup_MAY,$display_current_from,$display_current_to,$display_compare_from,$display_compare_to,$current_from,$current_to,$leader,$level_1_drivers) {
    
    //$rollup_JUNE = getRollup(1,null,$current_from,$current_to,$leader);
    //$rollup_MAY = getRollup(1,null,$compare_from,$compare_to,$leader);

    $total_delta_surveys = $rollup_JUNE[0] - $rollup_MAY[0];
    $total_delta_wtr = $rollup_JUNE[1] - $rollup_MAY[1];
    $total_delta_nrs = $rollup_JUNE[2] - $rollup_MAY[2];
    $total_delta_fcr = $rollup_JUNE[3] - $rollup_MAY[3];
    
    $total_delta_surveys = number_format($total_delta_surveys, 2, '.', '');
    $total_delta_wtr = number_format($total_delta_wtr, 2, '.', '');
    $total_delta_nrs = number_format($total_delta_nrs, 2, '.', '');
    $total_delta_fcr = number_format($total_delta_fcr, 2, '.', '');
    
    if($leader == 'all') { $name = "All Up"; } 
    else {
    
        try {
            
            $explosion = explode('-',$leader);
            
            $PDO = $conn->prepare('SELECT name FROM leadership WHERE cid = :leader');
            $PDO->bindParam(':leader', $explosion[1], PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);

            $row = $PDO->fetch();
            $name = $row->name;

               
            } catch(PDOException $e) {
                    echo 'ERROR: '.$e->getMessage();    
            }
        
    }
        
        $table = "";

        $table = "<table id='mainTable' class='tablesorter'>
        <thead>
            <tr>
                <td class='mt-header' colspan='1'>".$name."&nbsp&nbsp<img src='images/team_icon.png'></img></td>
                <td class='mt-header' colspan='5'>".$display_current_from." - ".$display_current_to."</td>
                <td class='mt-header' colspan='5'>".$display_compare_from." - ".$display_compare_to."</td>
                <td class='mt-header' colspan='5'>Change</td>
                <td class='mt-header options-icon'></td>
            </tr>
            <tr>
                <th class='mt-cat-header'>Leader</th>
                <th class='mt-cat-header'>Surveys</th>
                <th class='mt-cat-header'>% Vol</th>
                <th class='mt-cat-header'>WTR</th>
                <th class='mt-cat-header'>NRS</th>
                <th class='mt-cat-header'>FCR</th>
                <th class='mt-cat-header'>Surveys</th>
                <th class='mt-cat-header'>% Vol</th>
                <th class='mt-cat-header'>WTR</th>
                <th class='mt-cat-header'>NRS</th>
                <th class='mt-cat-header'>FCR</th>
                <th class='mt-cat-header'>Surveys</th>
                <th class='mt-cat-header'>% Vol</th>
                <th class='mt-cat-header'>WTR</th>
                <th class='mt-cat-header'>NRS</th>
                <th class='mt-cat-header'>FCR</th>
                <th class='mt-cat-header'>Options</th>
            </tr>
        </thead>
        <tbody>";
    
    
    if($leader == 'all') {
        
        
        $lob = 'Android';
        $director_array = getDirectors($lob);
        
        foreach($director_array as $value) {

                $leader = "csd-".$value['cid'];
                $leadercid = $value['cid'];
                
                $filtered = filterSurveysDirector($leadercid, $current_surveys);
                $compare_filtered = filterSurveysDirector($leadercid, $compare_surveys);


                $count = getSurveyCount($leader,$filtered);
                $wtr = getLevel1WTR($leader,$filtered);
                $nrs = getLevel1NRS($leader,$filtered);
                $fcr = getLevel1FCR($leader,$filtered);

                $count_compare = getSurveyCount($leader,$compare_filtered);
                $wtr_compare = getLevel1WTR($leader,$compare_filtered);
                $nrs_compare = getLevel1NRS($leader,$compare_filtered);
                $fcr_compare = getLevel1FCR($leader,$compare_filtered);

                if($rollup_JUNE[0] == 0) { $percent_volume = 0; }
                else { $percent_volume = ($count / $rollup_JUNE[0]) * 100; }
                if($rollup_MAY[0] == 0) { $percent_volume_compare = 0; }
                else { $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100; }

                $surveys_delta = $count - $count_compare;
                $wtr_delta = $wtr - $wtr_compare;
                $nrs_delta = $nrs - $nrs_compare;
                $fcr_delta = $fcr - $fcr_compare;
                $percent_volume_delta = $percent_volume - $percent_volume_compare;

                $wtr_delta = number_format($wtr_delta, 2, '.', '');
                $nrs_delta = number_format($nrs_delta, 2, '.', '');
                $fcr_delta = number_format($fcr_delta, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $percent_volume = number_format($percent_volume, 2, '.', '');
                $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $team_array[$x] = array();
                $team_array[$x]['leader'] = $value['name'];
                $team_array[$x]['cid'] = "csd-".$value['cid'];
                $team_array[$x]['surveys'] = $count;
                $team_array[$x]['wtr'] = $wtr;
                $team_array[$x]['nrs'] = $nrs;
                $team_array[$x]['fcr'] = $fcr;
                $team_array[$x]['surveys_compare'] = $count_compare;
                $team_array[$x]['wtr_compare'] = $wtr_compare;
                $team_array[$x]['nrs_compare'] = $nrs_compare;
                $team_array[$x]['fcr_compare'] = $fcr_compare;
                $team_array[$x]['surveys_delta'] = $surveys_delta;
                $team_array[$x]['wtr_delta'] = $wtr_delta;
                $team_array[$x]['nrs_delta'] = $nrs_delta;
                $team_array[$x]['fcr_delta'] = $fcr_delta;
                $team_array[$x]['percent_volume'] = $percent_volume;
                $team_array[$x]['percent_volume_compare'] = $percent_volume_compare;
                $team_array[$x]['percent_volume_delta'] = $percent_volume_delta;

                $x++;
            }

            $key = 1;

            foreach ($team_array as $value) {

                if($value['surveys'] > 0) {
                        $wtr_style = getWTRStyle($value['wtr'],"stat");
                        $nrs_style = getNRSStyle($value['nrs'],"stat");
                        $fcr_style = getFCRStyle($value['fcr'],"stat");
                     }
                    else {
                        $wtr_style = "";
                        $nrs_style = "";
                        $fcr_style = "";
                    }

                    if($value['surveys_compare'] > 0) {
                        $compare_wtr_style = getWTRStyle($value['wtr_compare'],"stat");
                        $compare_nrs_style = getNRSStyle($value['nrs_compare'],"stat");
                        $compare_fcr_style = getFCRStyle($value['fcr_compare'],"stat");
                    }
                    else { 
                        $compare_wtr_style = "";
                        $compare_nrs_style = "";
                        $compare_fcr_style = "";
                    }

                    if ($value['surveys'] > 0 && $value['surveys_compare'] > 0) {

                        $delta_wtr_style = getWTRStyle($value['wtr_delta'],"delta");
                        $delta_nrs_style = getNRSStyle($value['nrs_delta'],"delta");
                        $delta_fcr_style = getFCRStyle($value['fcr_delta'],"delta");
                        $delta_percent_style = getPercentStyle($value['percent_volume_delta']);
                    }
                    else {
                        $delta_wtr_style = "";
                        $delta_nrs_style = "";
                        $delta_fcr_style = "";
                        $delta_percent_style = "";
                    }




                $table .= "<tr class='mt-primary'>
                <td class='mt-primary-border-both collapsed'>".$value['leader']."</td>
                <td class='mt-border-left'>".$value['surveys']."</td>
                <td class='mt-no-border'>".$value['percent_volume']."</td>
                <td class='mt-no-border ".$wtr_style."'>".$value['wtr']."</td>
                <td class='mt-no-border ".$nrs_style."'>".$value['nrs']."</td>
                <td class='mt-border-right ".$fcr_style."'>".$value['fcr']."</td>
                <td class='mt-border-left'>".$value['surveys_compare']."</td>
                <td class='mt-no-border'>".$value['percent_volume_compare']."</td>
                <td class='mt-no-border ".$compare_wtr_style."'>".$value['wtr_compare']."</td>
                <td class='mt-no-border ".$compare_nrs_style."'>".$value['nrs_compare']."</td>
                <td class='mt-border-right ".$compare_fcr_style."'>".$value['fcr_compare']."</td>
                <td class='mt-border-left'>".$value['surveys_delta']."</td>
                <td class='mt-no-border'>".$value['percent_volume_delta']."</td>
                <td class='mt-no-border ".$delta_wtr_style."'>".$value['wtr_delta']."</td>
                <td class='mt-no-border ".$delta_nrs_style."'>".$value['nrs_delta']."</td>
                <td class='mt-border-right ".$delta_fcr_style."'>".$value['fcr_delta']."</td>
                <td class='mt-primary-options-border-both'><a onClick=\"javascript:showVerbatims('".$value['cid']."','all')\"><img src='images/verbatim_icon.png'></img></a>&nbsp<a onClick=\"javascript:showDrivers('".$value['cid']."')\"><img src='images/driver_icon.png'></img></a></td>
                </tr>";
                
//START SECONDARY STL OF CSD SECTION!!!!!!!!!!!!

                $stl_explosion = explode('-',$value['cid']);
                
                $stl_array = getSeniorsByDirector($conn,$stl_explosion[1]);
                $x = 0;
                
                foreach($stl_array as $values) {

                    $leader = "stl-".$values['cid'];
                    $leadercid = $values['cid'];

                    $filtered = filterSurveysSTL($leadercid, $current_surveys);
                    $compare_filtered = filterSurveysSTL($leadercid, $compare_surveys);


                    $count = getSurveyCount($leader,$filtered);
                    $wtr = getLevel1WTR($leader,$filtered);
                    $nrs = getLevel1NRS($leader,$filtered);
                    $fcr = getLevel1FCR($leader,$filtered);

                    $count_compare = getSurveyCount($leader,$compare_filtered);
                    $wtr_compare = getLevel1WTR($leader,$compare_filtered);
                    $nrs_compare = getLevel1NRS($leader,$compare_filtered);
                    $fcr_compare = getLevel1FCR($leader,$compare_filtered);

                    if($rollup_JUNE[0] == 0) { $percent_volume = 0; }
                    else { $percent_volume = ($count / $rollup_JUNE[0]) * 100; }
                    if($rollup_MAY[0] == 0) { $percent_volume_compare = 0; }
                    else { $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100; }

                    $surveys_delta = $count - $count_compare;
                    $wtr_delta = $wtr - $wtr_compare;
                    $nrs_delta = $nrs - $nrs_compare;
                    $fcr_delta = $fcr - $fcr_compare;
                    $percent_volume_delta = $percent_volume - $percent_volume_compare;

                    $wtr_delta = number_format($wtr_delta, 2, '.', '');
                    $nrs_delta = number_format($nrs_delta, 2, '.', '');
                    $fcr_delta = number_format($fcr_delta, 2, '.', '');
                    $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                    $percent_volume = number_format($percent_volume, 2, '.', '');
                    $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
                    $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                    $secondary_array[$x] = array();
                    $secondary_array[$x]['leader'] = $values['name'];
                    $secondary_array[$x]['cid'] = "stl-".$values['cid'];
                    $secondary_array[$x]['surveys'] = $count;
                    $secondary_array[$x]['wtr'] = $wtr;
                    $secondary_array[$x]['nrs'] = $nrs;
                    $secondary_array[$x]['fcr'] = $fcr;
                    $secondary_array[$x]['surveys_compare'] = $count_compare;
                    $secondary_array[$x]['wtr_compare'] = $wtr_compare;
                    $secondary_array[$x]['nrs_compare'] = $nrs_compare;
                    $secondary_array[$x]['fcr_compare'] = $fcr_compare;
                    $secondary_array[$x]['surveys_delta'] = $surveys_delta;
                    $secondary_array[$x]['wtr_delta'] = $wtr_delta;
                    $secondary_array[$x]['nrs_delta'] = $nrs_delta;
                    $secondary_array[$x]['fcr_delta'] = $fcr_delta;
                    $secondary_array[$x]['percent_volume'] = $percent_volume;
                    $secondary_array[$x]['percent_volume_compare'] = $percent_volume_compare;
                    $secondary_array[$x]['percent_volume_delta'] = $percent_volume_delta;

                    $x++;
                }

            $key = 1;

            foreach ($secondary_array as $secondary) {

                if($secondary['surveys'] > 0) {
                        $wtr_style = getWTRStyle($secondary['wtr'],"stat");
                        $nrs_style = getNRSStyle($secondary['nrs'],"stat");
                        $fcr_style = getFCRStyle($secondary['fcr'],"stat");
                     }
                    else {
                        $wtr_style = "";
                        $nrs_style = "";
                        $fcr_style = "";
                    }

                    if($secondary['surveys_compare'] > 0) {
                        $compare_wtr_style = getWTRStyle($secondary['wtr_compare'],"stat");
                        $compare_nrs_style = getNRSStyle($secondary['nrs_compare'],"stat");
                        $compare_fcr_style = getFCRStyle($secondary['fcr_compare'],"stat");
                    }
                    else { 
                        $compare_wtr_style = "";
                        $compare_nrs_style = "";
                        $compare_fcr_style = "";
                    }

                    if ($secondary['surveys'] > 0 && $secondary['surveys_compare'] > 0) {

                        $delta_wtr_style = getWTRStyle($secondary['wtr_delta'],"delta");
                        $delta_nrs_style = getNRSStyle($secondary['nrs_delta'],"delta");
                        $delta_fcr_style = getFCRStyle($secondary['fcr_delta'],"delta");
                        $delta_percent_style = getPercentStyle($secondary['percent_volume_delta']);
                    }
                    else {
                        $delta_wtr_style = "";
                        $delta_nrs_style = "";
                        $delta_fcr_style = "";
                        $delta_percent_style = "";
                    }



                $table .= "<tr class='expand-child'>
                <td class='mt-secondary-border-both'>".$secondary['leader']."</td>
                <td class='mt-border-left'>".$secondary['surveys']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume']."</td>
                <td class='mt-no-border ".$wtr_style."'>".$secondary['wtr']."</td>
                <td class='mt-no-border ".$nrs_style."'>".$secondary['nrs']."</td>
                <td class='mt-border-right ".$fcr_style."'>".$secondary['fcr']."</td>
                <td class='mt-border-left'>".$secondary['surveys_compare']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume_compare']."</td>
                <td class='mt-no-border ".$compare_wtr_style."'>".$secondary['wtr_compare']."</td>
                <td class='mt-no-border ".$compare_nrs_style."'>".$secondary['nrs_compare']."</td>
                <td class='mt-border-right ".$compare_fcr_style."'>".$secondary['fcr_compare']."</td>
                <td class='mt-border-left'>".$secondary['surveys_delta']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume_delta']."</td>
                <td class='mt-no-border ".$delta_wtr_style."'>".$secondary['wtr_delta']."</td>
                <td class='mt-no-border ".$delta_nrs_style."'>".$secondary['nrs_delta']."</td>
                <td class='mt-border-right ".$delta_fcr_style."'>".$secondary['fcr_delta']."</td>
                <td class='mt-secondary-options-border-both'><a onClick=\"javascript:showVerbatims('".$secondary['cid']."','all')\"><img src='images/verbatim_icon.png'></img></a>&nbsp<a onClick=\"javascript:showDrivers('".$secondary['cid']."')\"><img src='images/driver_icon.png'></img></a></td>
                </tr>";

                $key++;
            }

            }
        
    }

    else {

        $explosion = explode('-',$leader);

        if($explosion[0] == 'stl') {
            $list_array = getLeadersBySenior($conn,$explosion[1]);
            $employee = "Leader";
        }
        elseif($explosion[0] == 'csd') {
            $list_array = getSeniorsByDirector($conn,$explosion[1]);
            $employee = "Senior";
            //$leader_surveys = getSurveys($current_from,$current_to,$leader);
            //$compare_leader_surveys = getSurveys($compare_from,$compare_to,$leader);
        }
        elseif($explosion[0] == 'tl'){
            $list_array = getAgentsByLeader($conn,$explosion[1]);
            $employee = "Agent";
            //$current_surveys = getSurveys($current_from,$current_to,$leader);
            //$compare_surveys = getSurveys($compare_from,$compare_to,$leader);
        }

        if($explosion[0] == 'stl') {
            
            $x = 0;

            foreach($list_array as $value) {

                $leader = "tl-".$value['cid'];
                $leadercid = $value['cid'];
                
                $filtered = filterSurveysTL($leadercid, $current_surveys);
                $compare_filtered = filterSurveysTL($leadercid, $compare_surveys);

                $count = getSurveyCount($leader,$filtered);
                $wtr = getLevel1WTR($leader,$filtered);
                $nrs = getLevel1NRS($leader,$filtered);
                $fcr = getLevel1FCR($leader,$filtered);

                $count_compare = getSurveyCount($leader,$compare_filtered);
                $wtr_compare = getLevel1WTR($leader,$compare_filtered);
                $nrs_compare = getLevel1NRS($leader,$compare_filtered);
                $fcr_compare = getLevel1FCR($leader,$compare_filtered);

                if($rollup_JUNE[0] == 0) { $percent_volume = 0; }
                else { $percent_volume = ($count / $rollup_JUNE[0]) * 100; }
                if($rollup_MAY[0] == 0) { $percent_volume_compare = 0; }
                else { $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100; }

                $surveys_delta = $count - $count_compare;
                $wtr_delta = $wtr - $wtr_compare;
                $nrs_delta = $nrs - $nrs_compare;
                $fcr_delta = $fcr - $fcr_compare;
                $percent_volume_delta = $percent_volume - $percent_volume_compare;

                $wtr_delta = number_format($wtr_delta, 2, '.', '');
                $nrs_delta = number_format($nrs_delta, 2, '.', '');
                $fcr_delta = number_format($fcr_delta, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $percent_volume = number_format($percent_volume, 2, '.', '');
                $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $team_array[$x] = array();
                $team_array[$x]['leader'] = $value['name'];
                $team_array[$x]['cid'] = "tl-".$value['cid'];
                $team_array[$x]['surveys'] = $count;
                $team_array[$x]['wtr'] = $wtr;
                $team_array[$x]['nrs'] = $nrs;
                $team_array[$x]['fcr'] = $fcr;
                $team_array[$x]['surveys_compare'] = $count_compare;
                $team_array[$x]['wtr_compare'] = $wtr_compare;
                $team_array[$x]['nrs_compare'] = $nrs_compare;
                $team_array[$x]['fcr_compare'] = $fcr_compare;
                $team_array[$x]['surveys_delta'] = $surveys_delta;
                $team_array[$x]['wtr_delta'] = $wtr_delta;
                $team_array[$x]['nrs_delta'] = $nrs_delta;
                $team_array[$x]['fcr_delta'] = $fcr_delta;
                $team_array[$x]['percent_volume'] = $percent_volume;
                $team_array[$x]['percent_volume_compare'] = $percent_volume_compare;
                $team_array[$x]['percent_volume_delta'] = $percent_volume_delta;

                $x++;
            }

            $key = 1;

            foreach ($team_array as $value) {

                if($value['surveys'] > 0) {
                        $wtr_style = getWTRStyle($value['wtr'],"stat");
                        $nrs_style = getNRSStyle($value['nrs'],"stat");
                        $fcr_style = getFCRStyle($value['fcr'],"stat");
                     }
                    else {
                        $wtr_style = "";
                        $nrs_style = "";
                        $fcr_style = "";
                    }

                    if($value['surveys_compare'] > 0) {
                        $compare_wtr_style = getWTRStyle($value['wtr_compare'],"stat");
                        $compare_nrs_style = getNRSStyle($value['nrs_compare'],"stat");
                        $compare_fcr_style = getFCRStyle($value['fcr_compare'],"stat");
                    }
                    else { 
                        $compare_wtr_style = "";
                        $compare_nrs_style = "";
                        $compare_fcr_style = "";
                    }

                    if ($value['surveys'] > 0 && $value['surveys_compare'] > 0) {

                        $delta_wtr_style = getWTRStyle($value['wtr_delta'],"delta");
                        $delta_nrs_style = getNRSStyle($value['nrs_delta'],"delta");
                        $delta_fcr_style = getFCRStyle($value['fcr_delta'],"delta");
                        $delta_percent_style = getPercentStyle($value['percent_volume_delta']);
                    }
                    else {
                        $delta_wtr_style = "";
                        $delta_nrs_style = "";
                        $delta_fcr_style = "";
                        $delta_percent_style = "";
                    }




                $table .= "<tr class='mt-primary'>
                <td class='mt-primary-border-both collapsed'>".$value['leader']."</td>
                <td class='mt-border-left'>".$value['surveys']."</td>
                <td class='mt-no-border'>".$value['percent_volume']."</td>
                <td class='mt-no-border ".$wtr_style."'>".$value['wtr']."</td>
                <td class='mt-no-border ".$nrs_style."'>".$value['nrs']."</td>
                <td class='mt-border-right ".$fcr_style."'>".$value['fcr']."</td>
                <td class='mt-border-left'>".$value['surveys_compare']."</td>
                <td class='mt-no-border'>".$value['percent_volume_compare']."</td>
                <td class='mt-no-border ".$compare_wtr_style."'>".$value['wtr_compare']."</td>
                <td class='mt-no-border ".$compare_nrs_style."'>".$value['nrs_compare']."</td>
                <td class='mt-border-right ".$compare_fcr_style."'>".$value['fcr_compare']."</td>
                <td class='mt-border-left'>".$value['surveys_delta']."</td>
                <td class='mt-no-border'>".$value['percent_volume_delta']."</td>
                <td class='mt-no-border ".$delta_wtr_style."'>".$value['wtr_delta']."</td>
                <td class='mt-no-border ".$delta_nrs_style."'>".$value['nrs_delta']."</td>
                <td class='mt-border-right ".$delta_fcr_style."'>".$value['fcr_delta']."</td>
                <td class='mt-primary-options-border-both'><a onClick=\"javascript:showVerbatims('".$value['cid']."','all')\"><img src='images/verbatim_icon.png'></img></a>&nbsp<a onClick=\"javascript:showDrivers('".$value['cid']."')\"><img src='images/driver_icon.png'></img></a></td>
                </tr>";
                
//START SECONDARY TL OF STL SECTION!!!!!!!!!!!!

                $tl_explosion = explode('-',$value['cid']);
                
                $tl_array = getAgentsByLeader($conn,$tl_explosion[1]);
                $x = 0;
                
                foreach($tl_array as $values) {

                    $leader = "tl-".$values['cid'];
                    $leadercid = $values['cid'];

                    $filtered = filterSurveysAgent($leadercid, $current_surveys);
                    $compare_filtered = filterSurveysAgent($leadercid, $compare_surveys);


                    $count = getSurveyCount($leader,$filtered);
                    $wtr = getLevel1WTR($leader,$filtered);
                    $nrs = getLevel1NRS($leader,$filtered);
                    $fcr = getLevel1FCR($leader,$filtered);

                    $count_compare = getSurveyCount($leader,$compare_filtered);
                    $wtr_compare = getLevel1WTR($leader,$compare_filtered);
                    $nrs_compare = getLevel1NRS($leader,$compare_filtered);
                    $fcr_compare = getLevel1FCR($leader,$compare_filtered);

                    if($rollup_JUNE[0] == 0) { $percent_volume = 0; }
                    else { $percent_volume = ($count / $rollup_JUNE[0]) * 100; }
                    if($rollup_MAY[0] == 0) { $percent_volume_compare = 0; }
                    else { $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100; }

                    $surveys_delta = $count - $count_compare;
                    $wtr_delta = $wtr - $wtr_compare;
                    $nrs_delta = $nrs - $nrs_compare;
                    $fcr_delta = $fcr - $fcr_compare;
                    $percent_volume_delta = $percent_volume - $percent_volume_compare;

                    $wtr_delta = number_format($wtr_delta, 2, '.', '');
                    $nrs_delta = number_format($nrs_delta, 2, '.', '');
                    $fcr_delta = number_format($fcr_delta, 2, '.', '');
                    $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                    $percent_volume = number_format($percent_volume, 2, '.', '');
                    $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
                    $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                    $secondary_array[$x] = array();
                    $secondary_array[$x]['leader'] = $values['name'];
                    $secondary_array[$x]['cid'] = "agent-".$values['cid'];
                    $secondary_array[$x]['surveys'] = $count;
                    $secondary_array[$x]['wtr'] = $wtr;
                    $secondary_array[$x]['nrs'] = $nrs;
                    $secondary_array[$x]['fcr'] = $fcr;
                    $secondary_array[$x]['surveys_compare'] = $count_compare;
                    $secondary_array[$x]['wtr_compare'] = $wtr_compare;
                    $secondary_array[$x]['nrs_compare'] = $nrs_compare;
                    $secondary_array[$x]['fcr_compare'] = $fcr_compare;
                    $secondary_array[$x]['surveys_delta'] = $surveys_delta;
                    $secondary_array[$x]['wtr_delta'] = $wtr_delta;
                    $secondary_array[$x]['nrs_delta'] = $nrs_delta;
                    $secondary_array[$x]['fcr_delta'] = $fcr_delta;
                    $secondary_array[$x]['percent_volume'] = $percent_volume;
                    $secondary_array[$x]['percent_volume_compare'] = $percent_volume_compare;
                    $secondary_array[$x]['percent_volume_delta'] = $percent_volume_delta;

                    $x++;
                }

            $key = 1;

            foreach ($secondary_array as $secondary) {

                if($secondary['surveys'] > 0) {
                        $wtr_style = getWTRStyle($secondary['wtr'],"stat");
                        $nrs_style = getNRSStyle($secondary['nrs'],"stat");
                        $fcr_style = getFCRStyle($secondary['fcr'],"stat");
                     }
                    else {
                        $wtr_style = "";
                        $nrs_style = "";
                        $fcr_style = "";
                    }

                    if($secondary['surveys_compare'] > 0) {
                        $compare_wtr_style = getWTRStyle($secondary['wtr_compare'],"stat");
                        $compare_nrs_style = getNRSStyle($secondary['nrs_compare'],"stat");
                        $compare_fcr_style = getFCRStyle($secondary['fcr_compare'],"stat");
                    }
                    else { 
                        $compare_wtr_style = "";
                        $compare_nrs_style = "";
                        $compare_fcr_style = "";
                    }

                    if ($secondary['surveys'] > 0 && $secondary['surveys_compare'] > 0) {

                        $delta_wtr_style = getWTRStyle($secondary['wtr_delta'],"delta");
                        $delta_nrs_style = getNRSStyle($secondary['nrs_delta'],"delta");
                        $delta_fcr_style = getFCRStyle($secondary['fcr_delta'],"delta");
                        $delta_percent_style = getPercentStyle($secondary['percent_volume_delta']);
                    }
                    else {
                        $delta_wtr_style = "";
                        $delta_nrs_style = "";
                        $delta_fcr_style = "";
                        $delta_percent_style = "";
                    }



                $table .= "<tr class='expand-child'>
                <td class='mt-secondary-border-both'>".$secondary['leader']."</td>
                <td class='mt-border-left'>".$secondary['surveys']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume']."</td>
                <td class='mt-no-border ".$wtr_style."'>".$secondary['wtr']."</td>
                <td class='mt-no-border ".$nrs_style."'>".$secondary['nrs']."</td>
                <td class='mt-border-right ".$fcr_style."'>".$secondary['fcr']."</td>
                <td class='mt-border-left'>".$secondary['surveys_compare']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume_compare']."</td>
                <td class='mt-no-border ".$compare_wtr_style."'>".$secondary['wtr_compare']."</td>
                <td class='mt-no-border ".$compare_nrs_style."'>".$secondary['nrs_compare']."</td>
                <td class='mt-border-right ".$compare_fcr_style."'>".$secondary['fcr_compare']."</td>
                <td class='mt-border-left'>".$secondary['surveys_delta']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume_delta']."</td>
                <td class='mt-no-border ".$delta_wtr_style."'>".$secondary['wtr_delta']."</td>
                <td class='mt-no-border ".$delta_nrs_style."'>".$secondary['nrs_delta']."</td>
                <td class='mt-border-right ".$delta_fcr_style."'>".$secondary['fcr_delta']."</td>
                <td class='mt-secondary-options-border-both'><a onClick=\"javascript:showVerbatims('".$secondary['cid']."','all')\"><img src='images/verbatim_icon.png'></img></a>&nbsp<a onClick=\"javascript:showDrivers('".$secondary['cid']."')\"><img src='images/driver_icon.png'></img></a></td>
                </tr>";

                $key++;
            }

            }

        } 
        
        elseif($explosion[0] == 'csd') {
            
            $x = 0;
            
            foreach($list_array as $value) {

                $leader = "stl-".$value['cid'];
                $leadercid = $value['cid'];
                
                $filtered = filterSurveysSTL($leadercid, $current_surveys);
                $compare_filtered = filterSurveysSTL($leadercid, $compare_surveys);

                $count = getSurveyCount($leader,$filtered);
                $wtr = getLevel1WTR($leadercid,$filtered);
                $nrs = getLevel1NRS($leader,$filtered);
                $fcr = getLevel1FCR($leader,$filtered);

                $count_compare = getSurveyCount($leader,$compare_filtered);
                $wtr_compare = getLevel1WTR($leadercid,$compare_filtered);
                $nrs_compare = getLevel1NRS($leadercid,$compare_filtered);
                $fcr_compare = getLevel1FCR($leadercid,$compare_filtered);

                if($rollup_JUNE[0] == 0) { $percent_volume = 0; }
                else { $percent_volume = ($count / $rollup_JUNE[0]) * 100; }
                if($rollup_MAY[0] == 0) { $percent_volume_compare = 0; }
                else { $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100; }

                $surveys_delta = $count - $count_compare;
                $wtr_delta = $wtr - $wtr_compare;
                $nrs_delta = $nrs - $nrs_compare;
                $fcr_delta = $fcr - $fcr_compare;
                $percent_volume_delta = $percent_volume - $percent_volume_compare;

                $wtr_delta = number_format($wtr_delta, 2, '.', '');
                $nrs_delta = number_format($nrs_delta, 2, '.', '');
                $fcr_delta = number_format($fcr_delta, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $percent_volume = number_format($percent_volume, 2, '.', '');
                $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $team_array[$x] = array();
                $team_array[$x]['leader'] = $value['name'];
                $team_array[$x]['cid'] = "stl-".$value['cid'];
                $team_array[$x]['surveys'] = $count;
                $team_array[$x]['wtr'] = $wtr;
                $team_array[$x]['nrs'] = $nrs;
                $team_array[$x]['fcr'] = $fcr;
                $team_array[$x]['surveys_compare'] = $count_compare;
                $team_array[$x]['wtr_compare'] = $wtr_compare;
                $team_array[$x]['nrs_compare'] = $nrs_compare;
                $team_array[$x]['fcr_compare'] = $fcr_compare;
                $team_array[$x]['surveys_delta'] = $surveys_delta;
                $team_array[$x]['wtr_delta'] = $wtr_delta;
                $team_array[$x]['nrs_delta'] = $nrs_delta;
                $team_array[$x]['fcr_delta'] = $fcr_delta;
                $team_array[$x]['percent_volume'] = $percent_volume;
                $team_array[$x]['percent_volume_compare'] = $percent_volume_compare;
                $team_array[$x]['percent_volume_delta'] = $percent_volume_delta;

                $x++;
            }

            $key = 1;

            foreach ($team_array as $value) {

                if($value['surveys'] > 0) {
                        $wtr_style = getWTRStyle($value['wtr'],"stat");
                        $nrs_style = getNRSStyle($value['nrs'],"stat");
                        $fcr_style = getFCRStyle($value['fcr'],"stat");
                     }
                    else {
                        $wtr_style = "";
                        $nrs_style = "";
                        $fcr_style = "";
                    }

                    if($value['surveys_compare'] > 0) {
                        $compare_wtr_style = getWTRStyle($value['wtr_compare'],"stat");
                        $compare_nrs_style = getNRSStyle($value['nrs_compare'],"stat");
                        $compare_fcr_style = getFCRStyle($value['fcr_compare'],"stat");
                    }
                    else { 
                        $compare_wtr_style = "";
                        $compare_nrs_style = "";
                        $compare_fcr_style = "";
                    }

                    if ($value['surveys'] > 0 && $value['surveys_compare'] > 0) {

                        $delta_wtr_style = getWTRStyle($value['wtr_delta'],"delta");
                        $delta_nrs_style = getNRSStyle($value['nrs_delta'],"delta");
                        $delta_fcr_style = getFCRStyle($value['fcr_delta'],"delta");
                        $delta_percent_style = getPercentStyle($value['percent_volume_delta']);
                    }
                    else {
                        $delta_wtr_style = "";
                        $delta_nrs_style = "";
                        $delta_fcr_style = "";
                        $delta_percent_style = "";
                    }




                $table .= "<tr class='mt-primary'>
                <td class='mt-primary-border-both collapsed'>".$value['leader']."</td>
                <td class='mt-border-left'>".$value['surveys']."</td>
                <td class='mt-no-border'>".$value['percent_volume']."</td>
                <td class='mt-no-border ".$wtr_style."'>".$value['wtr']."</td>
                <td class='mt-no-border ".$nrs_style."'>".$value['nrs']."</td>
                <td class='mt-border-right ".$fcr_style."'>".$value['fcr']."</td>
                <td class='mt-border-left'>".$value['surveys_compare']."</td>
                <td class='mt-no-border'>".$value['percent_volume_compare']."</td>
                <td class='mt-no-border ".$compare_wtr_style."'>".$value['wtr_compare']."</td>
                <td class='mt-no-border ".$compare_nrs_style."'>".$value['nrs_compare']."</td>
                <td class='mt-border-right ".$compare_fcr_style."'>".$value['fcr_compare']."</td>
                <td class='mt-border-left'>".$value['surveys_delta']."</td>
                <td class='mt-no-border'>".$value['percent_volume_delta']."</td>
                <td class='mt-no-border ".$delta_wtr_style."'>".$value['wtr_delta']."</td>
                <td class='mt-no-border ".$delta_nrs_style."'>".$value['nrs_delta']."</td>
                <td class='mt-border-right ".$delta_fcr_style."'>".$value['fcr_delta']."</td>
                <td class='mt-primary-options-border-both'><a onClick=\"javascript:showVerbatims('".$value['cid']."','all')\"><img src='images/verbatim_icon.png'></img></a>&nbsp<a onClick=\"javascript:showDrivers('".$value['cid']."')\"><img src='images/driver_icon.png'></img></a></td>
                </tr>";
                
//BEGIN TL LISTINGS FOR EACH STL!!!!!!!!!
               
                $stl_explosion = explode('-',$value['cid']);
                
                $stl_array = getLeadersBySenior($conn,$stl_explosion[1]);
                $x = 0;
                
                foreach($stl_array as $values) {

                    $leader = "tl-".$values['cid'];
                    $leadercid = $values['cid'];

                    $filtered = filterSurveysTL($leadercid, $current_surveys);
                    $compare_filtered = filterSurveysTL($leadercid, $compare_surveys);


                    $count = getSurveyCount($leader,$filtered);
                    $wtr = getLevel1WTR($leader,$filtered);
                    $nrs = getLevel1NRS($leader,$filtered);
                    $fcr = getLevel1FCR($leader,$filtered);

                    $count_compare = getSurveyCount($leader,$compare_filtered);
                    $wtr_compare = getLevel1WTR($leader,$compare_filtered);
                    $nrs_compare = getLevel1NRS($leader,$compare_filtered);
                    $fcr_compare = getLevel1FCR($leader,$compare_filtered);

                    if($rollup_JUNE[0] == 0) { $percent_volume = 0; }
                    else { $percent_volume = ($count / $rollup_JUNE[0]) * 100; }
                    if($rollup_MAY[0] == 0) { $percent_volume_compare = 0; }
                    else { $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100; }

                    $surveys_delta = $count - $count_compare;
                    $wtr_delta = $wtr - $wtr_compare;
                    $nrs_delta = $nrs - $nrs_compare;
                    $fcr_delta = $fcr - $fcr_compare;
                    $percent_volume_delta = $percent_volume - $percent_volume_compare;

                    $wtr_delta = number_format($wtr_delta, 2, '.', '');
                    $nrs_delta = number_format($nrs_delta, 2, '.', '');
                    $fcr_delta = number_format($fcr_delta, 2, '.', '');
                    $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                    $percent_volume = number_format($percent_volume, 2, '.', '');
                    $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
                    $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                    $secondary_array[$x] = array();
                    $secondary_array[$x]['leader'] = $values['name'];
                    $secondary_array[$x]['cid'] = "tl-".$values['cid'];
                    $secondary_array[$x]['surveys'] = $count;
                    $secondary_array[$x]['wtr'] = $wtr;
                    $secondary_array[$x]['nrs'] = $nrs;
                    $secondary_array[$x]['fcr'] = $fcr;
                    $secondary_array[$x]['surveys_compare'] = $count_compare;
                    $secondary_array[$x]['wtr_compare'] = $wtr_compare;
                    $secondary_array[$x]['nrs_compare'] = $nrs_compare;
                    $secondary_array[$x]['fcr_compare'] = $fcr_compare;
                    $secondary_array[$x]['surveys_delta'] = $surveys_delta;
                    $secondary_array[$x]['wtr_delta'] = $wtr_delta;
                    $secondary_array[$x]['nrs_delta'] = $nrs_delta;
                    $secondary_array[$x]['fcr_delta'] = $fcr_delta;
                    $secondary_array[$x]['percent_volume'] = $percent_volume;
                    $secondary_array[$x]['percent_volume_compare'] = $percent_volume_compare;
                    $secondary_array[$x]['percent_volume_delta'] = $percent_volume_delta;

                    $x++;
                }

            $key = 1;

            foreach ($secondary_array as $secondary) {

                if($secondary['surveys'] > 0) {
                        $wtr_style = getWTRStyle($secondary['wtr'],"stat");
                        $nrs_style = getNRSStyle($secondary['nrs'],"stat");
                        $fcr_style = getFCRStyle($secondary['fcr'],"stat");
                     }
                    else {
                        $wtr_style = "";
                        $nrs_style = "";
                        $fcr_style = "";
                    }

                    if($secondary['surveys_compare'] > 0) {
                        $compare_wtr_style = getWTRStyle($secondary['wtr_compare'],"stat");
                        $compare_nrs_style = getNRSStyle($secondary['nrs_compare'],"stat");
                        $compare_fcr_style = getFCRStyle($secondary['fcr_compare'],"stat");
                    }
                    else { 
                        $compare_wtr_style = "";
                        $compare_nrs_style = "";
                        $compare_fcr_style = "";
                    }

                    if ($secondary['surveys'] > 0 && $secondary['surveys_compare'] > 0) {

                        $delta_wtr_style = getWTRStyle($secondary['wtr_delta'],"delta");
                        $delta_nrs_style = getNRSStyle($secondary['nrs_delta'],"delta");
                        $delta_fcr_style = getFCRStyle($secondary['fcr_delta'],"delta");
                        $delta_percent_style = getPercentStyle($secondary['percent_volume_delta']);
                    }
                    else {
                        $delta_wtr_style = "";
                        $delta_nrs_style = "";
                        $delta_fcr_style = "";
                        $delta_percent_style = "";
                    }



                $table .= "<tr class='expand-child'>
                <td class='mt-secondary-border-both'>".$secondary['leader']."</td>
                <td class='mt-border-left'>".$secondary['surveys']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume']."</td>
                <td class='mt-no-border ".$wtr_style."'>".$secondary['wtr']."</td>
                <td class='mt-no-border ".$nrs_style."'>".$secondary['nrs']."</td>
                <td class='mt-border-right ".$fcr_style."'>".$secondary['fcr']."</td>
                <td class='mt-border-left'>".$secondary['surveys_compare']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume_compare']."</td>
                <td class='mt-no-border ".$compare_wtr_style."'>".$secondary['wtr_compare']."</td>
                <td class='mt-no-border ".$compare_nrs_style."'>".$secondary['nrs_compare']."</td>
                <td class='mt-border-right ".$compare_fcr_style."'>".$secondary['fcr_compare']."</td>
                <td class='mt-border-left'>".$secondary['surveys_delta']."</td>
                <td class='mt-no-border'>".$secondary['percent_volume_delta']."</td>
                <td class='mt-no-border ".$delta_wtr_style."'>".$secondary['wtr_delta']."</td>
                <td class='mt-no-border ".$delta_nrs_style."'>".$secondary['nrs_delta']."</td>
                <td class='mt-border-right ".$delta_fcr_style."'>".$secondary['fcr_delta']."</td>
                <td class='mt-secondary-options-border-both'><a onClick=\"javascript:showVerbatims('".$secondary['cid']."','all')\"><img src='images/verbatim_icon.png'></img></a>&nbsp<a onClick=\"javascript:showDrivers('".$secondary['cid']."')\"><img src='images/driver_icon.png'></img></a></td>
                </tr>";

                $key++;
            }

 
            }
        }

        elseif($explosion[0] == 'tl') {
            
            $x = 0;

            foreach($list_array as $value) {

                $agent_surveys = filterSurveysAgent($value['cid'],$current_surveys);
                $compare_agent_surveys = filterSurveysAgent($value['cid'],$compare_surveys);
                
                
   
                $count = getSurveyCount($value['cid'],$agent_surveys);
                $wtr = getLevel1WTR($value['cid'],$agent_surveys);
                $nrs = getLevel1NRS($value['cid'],$agent_surveys);
                $fcr = getLevel1FCR($value['cid'],$agent_surveys);
                
                $count_compare = getSurveyCount($value['cid'],$compare_agent_surveys);
                $wtr_compare = getLevel1WTR($value['cid'],$compare_agent_surveys);
                $nrs_compare = getLevel1NRS($value['cid'],$compare_agent_surveys);
                $fcr_compare = getLevel1FCR($value['cid'],$compare_agent_surveys);

                if($rollup_JUNE[0] == 0) { $percent_volume = 0; }
                else { $percent_volume = ($count / $rollup_JUNE[0]) * 100; }
                if($rollup_MAY[0] == 0) { $percent_volume_compare = 0; }
                else { $percent_volume_compare = ($count_compare / $rollup_MAY[0]) * 100; }

                $surveys_delta = $count - $count_compare;
                $wtr_delta = $wtr - $wtr_compare;
                $nrs_delta = $nrs - $nrs_compare;
                $fcr_delta = $fcr - $fcr_compare;
                $percent_volume_delta = $percent_volume - $percent_volume_compare;

                $wtr_delta = number_format($wtr_delta, 2, '.', '');
                $nrs_delta = number_format($nrs_delta, 2, '.', '');
                $fcr_delta = number_format($fcr_delta, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $percent_volume = number_format($percent_volume, 2, '.', '');
                $percent_volume_compare = number_format($percent_volume_compare, 2, '.', '');
                $percent_volume_delta = number_format($percent_volume_delta, 2, '.', '');

                $team_array[$x] = array();
                $team_array[$x]['agent'] = $value['name'];
                $team_array[$x]['cid'] = $value['cid'];
                $team_array[$x]['surveys'] = $count;
                $team_array[$x]['wtr'] = $wtr;
                $team_array[$x]['nrs'] = $nrs;
                $team_array[$x]['fcr'] = $fcr;
                $team_array[$x]['surveys_compare'] = $count_compare;
                $team_array[$x]['wtr_compare'] = $wtr_compare;
                $team_array[$x]['nrs_compare'] = $nrs_compare;
                $team_array[$x]['fcr_compare'] = $fcr_compare;
                $team_array[$x]['surveys_delta'] = $surveys_delta;
                $team_array[$x]['wtr_delta'] = $wtr_delta;
                $team_array[$x]['nrs_delta'] = $nrs_delta;
                $team_array[$x]['fcr_delta'] = $fcr_delta;
                $team_array[$x]['percent_volume'] = $percent_volume;
                $team_array[$x]['percent_volume_compare'] = $percent_volume_compare;
                $team_array[$x]['percent_volume_delta'] = $percent_volume_delta;

                $x++;
            }

            $key = 1;

            foreach ($team_array as $value) {

                if($value['surveys'] > 0) {
                        $wtr_style = getWTRStyle($value['wtr'],"stat");
                        $nrs_style = getNRSStyle($value['nrs'],"stat");
                        $fcr_style = getFCRStyle($value['fcr'],"stat");
                     }
                    else {
                        $wtr_style = "";
                        $nrs_style = "";
                        $fcr_style = "";
                    }

                    if($value['surveys_compare'] > 0) {
                        $compare_wtr_style = getWTRStyle($value['wtr_compare'],"stat");
                        $compare_nrs_style = getNRSStyle($value['nrs_compare'],"stat");
                        $compare_fcr_style = getFCRStyle($value['fcr_compare'],"stat");
                    }
                    else { 
                        $compare_wtr_style = "";
                        $compare_nrs_style = "";
                        $compare_fcr_style = "";
                    }

                    if ($value['surveys'] > 0 && $value['surveys_compare'] > 0) {

                        $delta_wtr_style = getWTRStyle($value['wtr_delta'],"delta");
                        $delta_nrs_style = getNRSStyle($value['nrs_delta'],"delta");
                        $delta_fcr_style = getFCRStyle($value['fcr_delta'],"delta");
                        $delta_percent_style = getPercentStyle($value['percent_volume_delta']);
                    }
                    else {
                        $delta_wtr_style = "";
                        $delta_nrs_style = "";
                        $delta_fcr_style = "";
                        $delta_percent_style = "";
                    }




                $table .= "<tr class='mt-primary'>
                <td class='mt-primary-border-both collapsed'>".$value['agent']."</td>
                <td class='mt-border-left'>".$value['surveys']."</td>
                <td class='mt-no-border'>".$value['percent_volume']."</td>
                <td class='mt-no-border ".$wtr_style."'>".$value['wtr']."</td>
                <td class='mt-no-border ".$nrs_style."'>".$value['nrs']."</td>
                <td class='mt-border-right ".$fcr_style."'>".$value['fcr']."</td>
                <td class='mt-border-left'>".$value['surveys_compare']."</td>
                <td class='mt-no-border'>".$value['percent_volume_compare']."</td>
                <td class='mt-no-border ".$compare_wtr_style."'>".$value['wtr_compare']."</td>
                <td class='mt-no-border ".$compare_nrs_style."'>".$value['nrs_compare']."</td>
                <td class='mt-border-right ".$compare_fcr_style."'>".$value['fcr_compare']."</td>
                <td class='mt-border-left'>".$value['surveys_delta']."</td>
                <td class='mt-no-border'>".$value['percent_volume_delta']."</td>
                <td class='mt-no-border ".$delta_wtr_style."'>".$value['wtr_delta']."</td>
                <td class='mt-no-border ".$delta_nrs_style."'>".$value['nrs_delta']."</td>
                <td class='mt-border-right ".$delta_fcr_style."'>".$value['fcr_delta']."</td>
                <td class='mt-primary-options-border-both'><a onClick=\"javascript:showVerbatims('agent-".$value['cid']."','all')\"><img src='images/verbatim_icon.png'></img></a>&nbsp<a onClick=\"javascript:showDrivers('agent-".$value['cid']."')\"><img src='images/driver_icon.png'></img></a></td>
                </tr>";
                
                $agent_surveys = filterSurveysAgent($value['cid'],$current_surveys);
                $compare_agent_surveys = filterSurveysAgent($value['cid'],$compare_surveys);

                                        
                $agent_array = createTableArray($level_1_drivers,$agent_surveys,$compare_agent_surveys,$rollup_JUNE,$rollup_MAY);

                foreach ($agent_array as $secondary) {
        
                    if($secondary['surveys'] > 0) {
                        $wtr_style = getWTRStyle($secondary['wtr'],"stat");
                        $nrs_style = getNRSStyle($secondary['nrs'],"stat");
                        $fcr_style = getFCRStyle($secondary['fcr'],"stat");
                     }
                    else {
                        $wtr_style = "";
                        $nrs_style = "";
                        $fcr_style = "";
                    }

                    if($secondary['surveys_compare'] > 0) {
                        $compare_wtr_style = getWTRStyle($secondary['wtr_compare'],"stat");
                        $compare_nrs_style = getNRSStyle($secondary['nrs_compare'],"stat");
                        $compare_fcr_style = getFCRStyle($secondary['fcr_compare'],"stat");
                    }
                    else { 
                        $compare_wtr_style = "";
                        $compare_nrs_style = "";
                        $compare_fcr_style = "";
                    }

                    if ($secondary['surveys'] > 0 && $secondary['surveys_compare'] > 0) {

                        $delta_wtr_style = getWTRStyle($secondary['wtr_delta'],"delta");
                        $delta_nrs_style = getNRSStyle($secondary['nrs_delta'],"delta");
                        $delta_fcr_style = getFCRStyle($secondary['fcr_delta'],"delta");
                        $delta_percent_style = getPercentStyle($secondary['percent_volume_delta']);
                    }
                    else {
                        $delta_wtr_style = "";
                        $delta_nrs_style = "";
                        $delta_fcr_style = "";
                        $delta_percent_style = "";
                    }

                    $table .= "<tr class='expand-child'>
                        <td class='mt-secondary-border-both'>".$secondary['level_1']."</td>
                        <td class='mt-border-left'>".$secondary['surveys']."</td>
                        <td class='mt-no-border'>".$secondary['percent_volume']."</td>
                        <td class='mt-no-border ".$wtr_style."'>".$secondary['wtr']."</td>
                        <td class='mt-no-border ".$nrs_style."'>".$secondary['nrs']."</td>
                        <td class='mt-border-right ".$fcr_style."'>".$secondary['fcr']."</td>
                        <td class='mt-border-left'>".$secondary['surveys_compare']."</td>
                        <td class='mt-no-border'>".$secondary['percent_volume_compare']."</td>
                        <td class='mt-no-border ".$compare_wtr_style."'>".$secondary['wtr_compare']."</td>
                        <td class='mt-no-border ".$compare_nrs_style."'>".$secondary['nrs_compare']."</td>
                        <td class='mt-border-right ".$compare_fcr_style."'>".$secondary['fcr_compare']."</td>
                        <td class='mt-border-left'>".$secondary['surveys_delta']."</td>
                        <td class='mt-no-border'>".$secondary['percent_volume_delta']."</td>
                        <td class='mt-no-border ".$delta_wtr_style."'>".$secondary['wtr_delta']."</td>
                        <td class='mt-no-border ".$delta_nrs_style."'>".$secondary['nrs_delta']."</td>
                        <td class='mt-border-right ".$delta_fcr_style."'>".$secondary['fcr_delta']."</td>
                        <td class='mt-secondary-options-border-both'><a onClick=\"javascript:showVerbatims('agent-".$value['cid']."','l1-".$secondary['level_1']."')\"><img style='float: left; margin-left: 4px;' src='images/verbatim_icon.png'></img></a></td>
                    </tr>";


                    }   

            }
        }

    }

     $table .= "</tbody>
    <tfoot>
        <tr>
            <th class='mt-cat-header'>Roll-up</th>
            <th class='mt-cat-header'>".$rollup_JUNE[0]."</th>
            <th class='mt-cat-header'></th>
            <th class='mt-cat-header'>".$rollup_JUNE[1]."</th>
            <th class='mt-cat-header'>".$rollup_JUNE[2]."</th>
            <th class='mt-cat-header'>".$rollup_JUNE[3]."</th>
            <th class='mt-cat-header'>".$rollup_MAY[0]."</th>
            <th class='mt-cat-header'></th>
            <th class='mt-cat-header'>".$rollup_MAY[1]."</th>
            <th class='mt-cat-header'>".$rollup_MAY[2]."</th>
            <th class='mt-cat-header'>".$rollup_MAY[3]."</th>
            <th class='mt-cat-header'>".$total_delta_surveys."</th>
            <th class='mt-cat-header'></th>
            <th class='mt-cat-header'>".$total_delta_wtr."</th>
            <th class='mt-cat-header'>".$total_delta_nrs."</th>
            <th class='mt-cat-header'>".$total_delta_fcr."</th>
            <th class='mt-cat-header'></th>
        </tr>
    </tfoot>
    </table>";
    
    return $table;
    
    
}

function getLeaders($conn) {
    
    $x = 0;
    
    try {
        
        $PDO = $conn->prepare('SELECT name,cid FROM leadership WHERE (title = "Production MGR" OR title = "CEST MGR" OR title = "CESA MGR") AND lob = "Android"');
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);

        while ($row = $PDO->fetch()) {

            $leaders[$x]['name'] = $row->name;
            $leaders[$x]['cid'] = $row->cid;
            $x++;

        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $leaders;
    
}

function getSeniorsByDirector($conn,$leader) {
 
     try {
        
        $PDO = $conn->prepare('SELECT name FROM leadership WHERE cid = :leader');
        $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);
          
        $row = $PDO->fetch();
        $csd = $row->name;
         
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    try {
        
        $PDO = $conn->prepare('SELECT name,cid FROM leadership WHERE supervisor = :csd AND title="STL" AND lob = "Android"');
        $PDO->bindParam(':csd', $csd, PDO::PARAM_STR);
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);
        
        $x = 0;
          
        while ($row = $PDO->fetch()) {
        
            $leaders[$x]['name'] = $row->name;
            $leaders[$x]['cid'] = $row->cid;
            $x++;

        }
         
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
        
    return $leaders;
    
    
}

function getLeadersBySenior($conn,$leader) {
    
    try {
        
        $PDO = $conn->prepare('SELECT name FROM leadership WHERE cid = :leader');
        $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);
          
        $row = $PDO->fetch();
        $senior = $row->name;
         
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    try {
        
        $PDO = $conn->prepare('SELECT name,cid FROM leadership WHERE supervisor = :leader AND  (title = "Production MGR" OR title = "CEST MGR" OR title = "CESA MGR") AND lob = "Android"');
        $PDO->bindParam(':leader', $senior, PDO::PARAM_STR);
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);
        
        $x = 0;
          
        while ($row = $PDO->fetch()) {
        
            $leaders[$x]['name'] = $row->name;
            $leaders[$x]['cid'] = $row->cid;
            $x++;

        }
         
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $leaders;
    
}

function getAgentsByLeader($conn,$leader) {
    

    
    try {
        
        $PDO = $conn->prepare('SELECT name FROM leadership WHERE cid = :leader');
        $PDO->bindParam(':leader', $leader, PDO::PARAM_STR);
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);
          
        $row = $PDO->fetch();
        $name = $row->name;
         
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    try {
        
        $PDO = $conn->prepare('SELECT agent_name,cid FROM agents WHERE supervisor = :leader  AND lob  = "Android"');
        $PDO->bindParam(':leader', $name, PDO::PARAM_STR);
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);
        
        $x = 0;
          
        while ($row = $PDO->fetch()) {
        
            $leaders[$x]['name'] = $row->agent_name;
            $leaders[$x]['cid'] = $row->cid;
            $x++;

        }
         
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $leaders;
    
}

function getSeniors($conn) {
    
    $x = 0;
    
    try {
        
        $PDO = $conn->prepare('SELECT name,cid FROM leadership WHERE title = "STL" AND lob = "Android"');
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);

        while ($row = $PDO->fetch()) {

            $leaders[$x]['name'] = $row->name;
            $leaders[$x]['cid'] = $row->cid;
            $x++;

        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $leaders;
        
}

function getDirectors($conn) {
    
    $x = 0;
    
    try {
        $PDO = $conn->prepare('SELECT name,cid FROM leadership WHERE title = "CSD" AND lob = "Android"');
        $PDO->execute();

        $PDO->setFetchMode(PDO::FETCH_OBJ);

        while ($row = $PDO->fetch()) {

            $leaders[$x]['name'] = $row->name;
            $leaders[$x]['cid'] = $row->cid;
            $x++;

        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $leaders;    
}
    
function getTopFiveLeadersLevel1($conn,$survey_data,$driver) {
    
    $filtered = filterSurveys($driver,$survey_data);
    
    $leaders = getLeaders($conn);
    
    $x = 0;
        
    foreach($leaders AS $value) {
        
        try {
            $PDO = $conn->prepare('SELECT supervisor FROM leadership WHERE cid = :cid');
            $PDO->bindParam(':cid', $value['cid'], PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);
            
            $row = $PDO->fetch();

            
                
        } catch(PDOException $e) {
                echo 'ERROR: '.$e->getMessage();    
        }
        
        $leader_surveys = filterSurveysTL($value['cid'],$filtered);
        $wtr = getLevel1WTR($driver,$leader_surveys);
        $wtr_rank[$x]['wtr'] = $wtr;
        $wtr_rank[$x]['leader'] = $value['name'];
        $wtr_rank[$x]['supervisor'] = $row->supervisor;
        $x++;
        
    }
    
    $wtr_rank = record_sort($wtr_rank,'wtr',true);

    return $wtr_rank;
}

function getTeamRanksLevel1($conn,$survey_data,$driver,$leader,$sort) {
    
    $explosion = explode('-',$leader);
    
    $filtered = filterSurveys($driver,$survey_data);
    
    $x = 0;
    
    $wtr_rank = array(array());
    
    if($leader == 'all') {
        $agents = getSeniors($conn);
        
        foreach($agents AS $value) {
            
            $code = 'stl-'.$value['cid'];
            
            $agent_surveys = filterSurveysSTL($value['cid'],$filtered);
            $wtr = getLevel1WTR($driver,$agent_surveys);
            $wtr_rank[$x]['wtr'] = $wtr;
            $wtr_rank[$x]['agent'] = $value['name'];
            $wtr_rank[$x]['surveys'] = getSurveyCount($value['cid'],$agent_surveys);
            $x++;
        }
    }
    elseif($explosion[0] == 'csd') {
        $agents = getSeniorsByDirector($conn,$explosion[1]);
        
        foreach($agents AS $value) {
            
            $code = 'stl-'.$value['cid'];
            
            $agent_surveys = filterSurveysSTL($value['cid'],$filtered);
            $wtr = getLevel1WTR($driver,$agent_surveys);
            $wtr_rank[$x]['wtr'] = $wtr;
            $wtr_rank[$x]['agent'] = $value['name'];
            $wtr_rank[$x]['surveys'] = getSurveyCount($value['cid'],$agent_surveys);
            $x++;
        }
    }
    elseif($explosion[0] == 'stl') {
        $agents = getLeadersBySenior($conn,$explosion[1]);
        
        foreach($agents AS $value) {
            
            $code = 'tl-'.$value['cid'];
            
            $agent_surveys = filterSurveysTL($value['cid'],$filtered);
            $wtr = getLevel1WTR($driver,$agent_surveys);
            $wtr_rank[$x]['wtr'] = $wtr;
            $wtr_rank[$x]['agent'] = $value['name'];
            $wtr_rank[$x]['surveys'] = getSurveyCount($value['cid'],$agent_surveys);
            $x++;
        }   
    }
    elseif($explosion[0] == 'tl') {
        $agents = getAgentsByLeader($conn,$explosion[1]);
        
        foreach($agents AS $value) {
            $agent_surveys = filterSurveysAgent($value['cid'],$filtered);
            $wtr = getLevel1WTR($driver,$agent_surveys);
            $wtr_rank[$x]['wtr'] = $wtr;
            $wtr_rank[$x]['agent'] = $value['name'];
            $wtr_rank[$x]['surveys'] = getSurveyCount($value['cid'],$agent_surveys);
            $x++;
        }
    }
    
    
    
        
    $wtr_rank = val_sort($wtr_rank,'wtr',$sort);
    //$wtr_rank = record_sort($wtr_rank,'wtr',true);
    
    return $wtr_rank;
    
}

function getBottomFiveAgentsLevel1($conn,$survey_data,$driver,$leader) {
    
    $leader = explode('-',$leader);
    
    $filtered = filterSurveys($driver,$survey_data);
    
    $agents = getAgentsByLeader($conn,$leader[1]);
    
    $x = 0;
    
    $wtr_rank = array(array());
    
    foreach($agents AS $value) {
        $agent_surveys = filterSurveysAgent($value['cid'],$filtered);
        $wtr = getLevel1WTR($driver,$agent_surveys);
        $wtr_rank[$x]['wtr'] = $wtr;
        $wtr_rank[$x]['agent'] = $value['name'];
        $wtr_rank[$x]['surveys'] = getSurveyCount($value['cid'],$agent_surveys);
        $x++;
    }
    
    $wtr_rank = val_sort($wtr_rank,'wtr',false);
    //$wtr_rank = record_sort($wtr_rank,'wtr',true);
    
    return $wtr_rank;
    
}

function spitItemTable($conn,$focus1,$focus2,$focus3) {
  
    $table = "<table id='item-table'>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Tags</th>
                    </tr>
                </thead>
                <tbody>";
    
    try {
        
        $PDO = $conn->prepare('SELECT tag1,tag2,tag3,name,description FROM items WHERE tag1 = :focus1 OR tag2 = :focus1 OR tag3 = :focus1');
        $PDO->bindParam(':focus1', $focus1, PDO::PARAM_STR);
        $PDO->execute();
        
        $PDO->setFetchMode(PDO::FETCH_OBJ);

        $x = 0;

        while($row = $PDO->fetch()){ 
            $table .=   "<tr>
                            <td class='it-name'>".$row->name."</td>
                            <td class='it-description'>".$row->description."</td>
                            <td class='it-location'>Download</td>
                            <td class='it-tags'>".$row->tag1." ".$row->tag2." ".$row->tag3."</td>
                        </tr>";
        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    try {
        
        $PDO = $conn->prepare('SELECT tag1,tag2,tag3,name,description FROM items WHERE tag1 = :focus2 OR tag2 = :focus2 OR tag3 = :focus2');
        $PDO->bindParam(':focus2', $focus2, PDO::PARAM_STR);
        $PDO->execute();
        
        $PDO->setFetchMode(PDO::FETCH_OBJ);

        $x = 0;

        while($row = $PDO->fetch()){  
            $table .=   "<tr>
                            <td class='it-name'>".$row->name."</td>
                            <td class='it-description'>".$row->description."</td>
                            <td class='it-location'>Download</td>
                            <td class='it-tags'>".$row->tag1." ".$row->tag2." ".$row->tag3."</td>
                        </tr>";
        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    
    try {
        
        $PDO = $conn->prepare('SELECT tag1,tag2,tag3,name,description FROM items WHERE tag1 = :focus3 OR tag2 = :focus3 OR tag3 = :focus3');
        $PDO->bindParam(':focus3', $focus3, PDO::PARAM_STR);
        $PDO->execute();
        
        $PDO->setFetchMode(PDO::FETCH_OBJ);

        $x = 0;

        while($row = $PDO->fetch()){  
            $table .=   "<tr>
                            <td class='it-name'>".$row->name."</td>
                            <td class='it-description'>".$row->description."</td>
                            <td class='it-location'>Download</td>
                            <td class='it-tags'>".$row->tag1." ".$row->tag2." ".$row->tag3."</td>
                        </tr>";
        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    $table .= "</tbody>
                </table>";
    
    return $table;
    
    
}

function val_sort($array,$key,$dir) {
	
	//Loop through and get the values of our specified key
	foreach($array as $k=>$v) {
		$b[] = strtolower($v[$key]);
	}
	

	
    if($dir == true) { arsort($b); }
    else { asort($b); }
	

	
	foreach($b as $k=>$v) {
		$c[] = $array[$k];
	}
    

	return $c;
}

function get_fantasy_roster($conn,$leader) {
    

    
    
}

function get_bottom_50($conn,$level1) {
    
    $from = '2014-08-01';
    $to = '2014-10-31';
    $leader = 'all';
    //$level1 = 'Billing';
    $surveys = getSurveys($conn,$from,$to,$leader);
    $filtered = filterSurveys($level1,$surveys);
    
    $array = array();
    $x = 0;
    
    $PDO = $conn->prepare('SELECT agent_name,eid,cid,supervisor FROM agents WHERE lob = "Android"');
    $PDO->execute();
        
    $PDO->setFetchMode(PDO::FETCH_OBJ);
    
    while($row = $PDO->fetch()) {
        
        $agentid = $row->cid;
        
        $agent_surveys = filterSurveysAgent($agentid,$filtered);
        
        $count = getSurveyCount($leader,$agent_surveys);
        
        $wtr = getLevel1WTR($level1,$agent_surveys);
        $nrs = getLevel1NRS($level1,$agent_surveys);
        $fcr = getLevel1FCR($level1,$agent_surveys);
        
        $array[$x]['agent_name'] = $row->agent_name;
        $array[$x]['eid'] = $row->eid;
        $array[$x]['cid'] = $row->cid;
        $array[$x]['supervisor'] = $row->supervisor;
        $array[$x]['wtr'] = $wtr;
        $array[$x]['nrs'] = $nrs;
        $array[$x]['fcr'] = $fcr;
        $array[$x]['surveys'] = $count;
        
        $x++;
        
        unset($agent_surveys);
        
    }
    
   
    
    return $array;
    
}
function fantasy_getAgentName($conn,$cid) {
    
    if($cid == 'open') { $name = 'Open'; }
    else {
    
        try {
            $PDO = $conn->prepare('SELECT agent_name FROM agents where cid = :cid');
            $PDO->bindParam(':cid', $cid, PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);

            $row = $PDO->fetch();

            $name = $row->agent_name;
            $name = $name.' ('.$cid.')';


        } catch(PDOException $e) {
            echo 'ERROR: '.$e->getMessage();    
        }
    }
    
    return $name;
    
}

function chat_getAgents($conn) {
    
    $array = array();
    
    try {
        
        $PDO = $conn->prepare('SELECT DISTINCT name FROM chat_wtr');
        $PDO->execute();
        
        $PDO->setFetchMode(PDO::FETCH_OBJ);

        $x = 0;

        while ($row = $PDO->fetch()) {
            $array[$x] = $row->name;
            $x++;
        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $array;
}

function chat_getDates($conn) {
    
    $array = array();
    
    try {
        
        $PDO = $conn->prepare('SELECT DISTINCT date FROM chat_wtr');
        $PDO->execute();
        
        $PDO->setFetchMode(PDO::FETCH_OBJ);

        $x = 0;

        while ($row = $PDO->fetch()) {
            $array[$x] = $row->date;
            $x++;
        }
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();    
    }
    
    return $array;
}

function chat_getWTR($conn,$dates,$agent) {
    
    $array = array();
    
    $x = 0;
    $overall_surveys = 0;
    $overall_detractors = 0;
    $overall_promoters = 0;
    $overall_score = 0;
    
    foreach($dates AS $date) {
    
        try {

            $PDO = $conn->prepare('SELECT * FROM chat_wtr WHERE name = :name AND date = :date');
            $PDO->bindParam(':name',$agent,PDO::PARAM_STR);
            $PDO->bindParam(':date',$date,PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);

            
            
            $row = $PDO->fetch();
            
            if($row) {
                $one = $row->one;
                $two = $row->two;
                $three = $row->three;
                $four = $row->four;
                $five = $row->five;
                $six = $row->six;
                $nine = $row->nine;
                $ten = $row->ten;

                $detractors = $one + $two + $three + $four + $five + $six;
                $promoters = $nine + $ten;
                $surveys = $row->surveys;

                $overall_detractors += $detractors;
                $overall_promoters += $promoters;
                $overall_surveys += $surveys;
                
                $score = (($promoters*100) + ($detractors*(-100)))/$surveys;
            } else { 
                $score = '-'; 
                $surveys = 0;
            }
            
            
            $array[$x]['date'] = $date;
            $array[$x]['wtr'] = $score;
            $array[$x]['surveys'] = $surveys;
                     
            
        } catch(PDOException $e) {
            echo 'ERROR: '.$e->getMessage();    
        }
        
        $x++;
    }
    
    if($overall_surveys == '') {
        $overall_score = '-';
        $overall_surveys = 0;
    } else {
        $overall_score = (($overall_promoters*100) + ($overall_detractors*(-100)))/$overall_surveys;
    }
    
    $array[$x]['date'] = 'MTD';
    $array[$x]['wtr'] = $overall_score;
    $array[$x]['surveys'] = $overall_surveys;
    
    return $array;
    
}

function chat_getNRS($conn,$dates,$agent) {
    
    $array = array();
    
    $x = 0;
    $overall_surveys = 0;
    $overall_detractors = 0;
    $overall_promoters = 0;
    $overall_score = 0;
    
    foreach($dates AS $date) {
    
        try {

            $PDO = $conn->prepare('SELECT * FROM chat_nrs WHERE name = :name AND date = :date');
            $PDO->bindParam(':name',$agent,PDO::PARAM_STR);
            $PDO->bindParam(':date',$date,PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);

            
            
            $row = $PDO->fetch();
            
            if($row) {
                $one = $row->one;
                $two = $row->two;
                $three = $row->three;
                $four = $row->four;
                $five = $row->five;
                $six = $row->six;
                $nine = $row->nine;
                $ten = $row->ten;

                $detractors = $one + $two + $three + $four + $five + $six;
                $promoters = $nine + $ten;
                $surveys = $row->surveys;

                $overall_detractors += $detractors;
                $overall_promoters += $promoters;
                $overall_surveys += $surveys;
                
                $score = (($promoters*100) + ($detractors*(-100)))/$surveys;
            } else { 
                $score = '-';
                $surveys = 0;
            }
            
            
            $array[$x]['date'] = $date;
            $array[$x]['nrs'] = $score;
            $array[$x]['surveys'] = $surveys;
                     
            
        } catch(PDOException $e) {
            echo 'ERROR: '.$e->getMessage();    
        }
        
        $x++;
    }
    
    if($overall_surveys == '') {
        $overall_score = '-';
        $overall_surveys = 0;
    } else {
        $overall_score = (($overall_promoters*100) + ($overall_detractors*(-100)))/$overall_surveys;
    }
    
    $array[$x]['date'] = 'MTD';
    $array[$x]['nrs'] = $overall_score;
    $array[$x]['surveys'] = $overall_surveys;
    
    return $array;
    
}
    
function chat_getFCR($conn,$dates,$agent) {
    
    $array = array();
    
    $x = 0;
    $overall_surveys = 0;
    $overall_detractors = 0;
    $overall_promoters = 0;
    $overall_score = 0;
    
    foreach($dates AS $date) {
    
        try {

            $PDO = $conn->prepare('SELECT * FROM chat_fcr WHERE name = :name AND date = :date');
            $PDO->bindParam(':name',$agent,PDO::PARAM_STR);
            $PDO->bindParam(':date',$date,PDO::PARAM_STR);
            $PDO->execute();

            $PDO->setFetchMode(PDO::FETCH_OBJ);

            
            
            $row = $PDO->fetch();
            
            if($row) {
                $yes = $row->yes;
                $no = $row->no;
                
                $surveys = $row->surveys;

                $overall_detractors += $no;
                $overall_promoters += $yes;
                $overall_surveys += $surveys;
                
                $score = $yes/$surveys;
            } else { 
                $score = '-';
                $surveys = 0;
            }
            
            
            $array[$x]['date'] = $date;
            $array[$x]['fcr'] = $score;
            $array[$x]['surveys'] = $surveys;
                     
            
        } catch(PDOException $e) {
            echo 'ERROR: '.$e->getMessage();    
        }
        
        $x++;
    }
    
    if($overall_surveys == '') {
        $overall_score = '-';
        $overall_surveys = 0;
    } else {
        $overall_score = $overall_promoters/$overall_surveys;
    }
    
    $array[$x]['date'] = 'MTD';
    $array[$x]['fcr'] = $overall_score;
    $array[$x]['surveys'] = $overall_surveys;
    
    return $array;
    
}
