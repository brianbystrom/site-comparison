<?
	

	session_start();
	include('../templates/admin3/include/include.inc');
	include('library.php');
	
	$item = $_POST['item'];
	$pdate = $_SESSION['filter_primary'];
	//$cdate = $_SESSION['filter_compare'];
	$csite = $_SESSION['filter_csite'];
	$site = $_SESSION['filter_site'];
	$scount = $_SESSION['total_surveys'];
	$cscount = $_SESSION['total_csurveys'];
	$view = $_SESSION['filter_view'];
	

	/*$item = 'Billing';
	$pdate = '03/01/2015 - 03/02/2015';
	//$cdate = $_SESSION['filter_compare'];
	$csite = 'Fairborn Call Center';
	$site = 'Fairborn Call Center';
	$scount = 50;
	$view = 0;*/

	//$team = get_team_base($conn,$cid);

	$primary_explode = explode(' - ',$pdate);
	//$compare_explode = explode(' - ',$cdate);

	$pstart = date('Y-m-d', strtotime($primary_explode[0]));
	$pend = date('Y-m-d', strtotime($primary_explode[1]));
	//$cstart = date('Y-m-d', strtotime($compare_explode[0]));
	//$cend = date('Y-m-d', strtotime($compare_explode[1]));

	if ($view == '0') {
		$sub = get_level_3($conn,$pstart,$pend,$item);
	} else {
		$regExp = "/\(([^)]+)\)/";
        preg_match($regExp,$item,$new);
        $sub = get_team($conn,$new[1]);

	}

	$array = array();	//final array to return
	$sort = array();	//array to be sorted by level 3 surveys
	$list = array();	//unsorted array of level 3 data

	$x = 0;

	if($sub != 'empty') {	
		foreach($sub AS $value) {

			if ($view == '0') {
				$line = create_table_row($conn,$pstart,$pend,$value['level_3'],'level_3',$site,$csite,$scount,$cscount);

				$sort[$x]['item'] = $value['level_3'];
				$sort[$x]['surveys'] = $line[0];

				$list[$value['level_3']] = $line;

			} else {
				$line = create_table_row($conn,$pstart,$pend,$value,'team',$site,$csite,$scount);
				$sitem = get_name($conn,$value);	

				$sort[$x]['item'] = $sitem;
				$sort[$x]['surveys'] = $line[0];

				$list[$sitem] = $line;
			}

			$x++;
		}

		$sort = val_sort($sort,'surveys',true);

		foreach($sort AS $value) {

			$line = $list[$value['item']];

			$style2 = get_style($conn,$line[0],$line[2],'WTR','stat');
			$style3 = get_style($conn,$line[0],$line[3],'NRS','stat');
			$style4 = get_style($conn,$line[0],$line[4],'FCR','stat');
			$style7 = get_style($conn,$line[5],$line[7],'WTR','stat');
			$style8 = get_style($conn,$line[5],$line[8],'NRS','stat');
			$style9 = get_style($conn,$line[5],$line[9],'FCR','stat');

			$sOut = '<td></td>';
		    $sOut .= '<td>'.$value['item'].'</td>';
		    $sOut .= '<td class="text-center analyze-border-left">'.number_format($line[1], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center '.$style2.'">'.number_format($line[2], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center">'.number_format($line[15], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center '.$style3.'">'.number_format($line[3], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center">'.number_format($line[16], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center '.$style4.'">'.number_format($line[4], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center">'.number_format($line[17], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center analyze-border-left">'.number_format($line[6], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center '.$style7.'">'.number_format($line[7], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center '.$style8.'">'.number_format($line[8], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center '.$style9.'">'.number_format($line[9], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center analyze-border-left">'.number_format($line[11], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center">'.number_format($line[12], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center">'.number_format($line[13], 2, '.', '').'</td>';
		    $sOut .= '<td  class="text-center analyze-border-right">'.number_format($line[14], 2, '.', '').'</td>';
		    $sOut .= '<td class="text-center"><i class="glyphicon glyphicon-comment"></i>&nbsp<i class="glyphicon glyphicon-list-alt font-grey-silver"></i></i></td>';
		    $array[] = $sOut;
	    }

	} else {
		$sOut = '<td colspan="19" class="text-center">No team members to report.</td>';
		$array[] = $sOut;
	}

    echo json_encode($array);

    unset($array);
   
?>