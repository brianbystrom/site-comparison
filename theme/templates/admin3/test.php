<?
	
	//session_start();
	include('./include/include.inc');
	include('../../scripts/library.php');

	
?>

<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.0
Version: 3.2.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>QI Tools | Team Analyzer</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="../../assets/global/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.0.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES-->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<!-- END PAGE LEVEL STYLES-->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css">
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="../../assets/admin/layout3/css/themes/blue-steel.css" rel="stylesheet" type="text/css" id="style_color">
<link href="../../assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">

	<? 
		site_header('brian','123'); 
		page_nav();
	?>

	
</div>
<!-- END HEADER -->
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">

	<? 
		page_header('page');
	?>
	
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="#">AT&T</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="#">Android</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Team Analyzer
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			

			
				
				<div class="row">
					<div class="col-lg-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table font-blue-steel"></i>
								<span class="caption-subject font-blue-steel bold uppercase">Team Analyzer Table</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						
						<div class="portlet-body">
							


							<? echo $filter_table; ?>


						</div>
					</div>
					</div>
				</div>
				<div class="row">
				<div class="col-lg-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-eye font-blue-steel"></i>
								<span class="caption-subject font-blue-steel bold uppercase">Recommended Driver Focus</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						
						
						<div class="portlet-body">
						<div class="caption">
								<i class="fa fa-star-o font-blue-steel"></i>
								<span class="caption-subject font-blue-steel bold uppercase">Billing</span>
							</div>
							<div class="row">
								<div class="col-md-4">
								<div class="table-scrollable">
									<table class="table table-striped table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>BOT 5 YOUR TEAM</b>
										</th>
									</tr>
									<tr>
										<th class="text-center">
										<b>Team Member</b>
										</th>
										<th class="text-center">
										<b>Manager</b>
										</th>
										<th class="text-center">
										<b>WTR</b>
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Woods, Natashia
										</td>
										<td class="text-center">
										Garah, Jose
										</td>
										<td class="text-center">
										100.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Pimble, Teresa
										</td>
										<td class="text-center">
										Smith, Ann
										</td>
										<td class="text-center">
										75.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Buchinski, Eric
										</td>
										<td class="text-center">
										Anderson, Keith
										</td>
										<td class="text-center">
										60.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Farris, Troy
										</td>
										<td class="text-center">
										Garay, Jose
										</td>
										<td class="text-center">
										50.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Pursel Deborah
										</td>
										<td class="text-center">
										Garay, Jose
										</td>
										<td class="text-center">
										33.3
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>
							<div class="col-md-4">
								<div class="table-scrollable">
									<table class="table table-striped table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>TOP 5 YOUR TEAM</b>
										</th>
									</tr>
									<tr>
										<th class="text-center ">
										Team Member
										</th>
										<th class="text-center ">
										Surveys
										</th>
										<th class="text-center ">
										WTR
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Donelson, Ann
										</td>
										<td class="text-center">
										10
										</td>
										<td class="text-center">
										60.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Smith, Ann
										</td>
										<td class="text-center">
										10
										</td>
										<td class="text-center">
										50.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Shock, Beth
										</td>
										<td class="text-center">
										12
										</td>
										<td class="text-center">
										50.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Anderson, Keith
										</td>
										<td class="text-center">
										28
										</td>
										<td class="text-center">
										33.3
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Gibson, Jacqueline
										</td>
										<td class="text-center">
										16
										</td>
										<td class="text-center">
										20.0
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>
							<div class="col-md-4">
								<div class="table-scrollable">
									<table class="table table-striped table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>BOT 5 YOUR TEAM</b>
										</th>
									</tr>
									<tr>
										<th class="text-center">
										<b>Team Member</b>
										</th>
										<th class="text-center">
										<b>Surveys</b>
										</th>
										<th class="text-center">
										<b>WTR</b>
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Guariglia, Anthony
										</td>
										<td class="text-center">
										Garah, Jose
										</td>
										<td class="text-center">
										-18.18
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Martinez, Melissa
										</td>
										<td class="text-center">
										Smith, Ann
										</td>
										<td class="text-center">
										0.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Lazenby, Clay
										</td>
										<td class="text-center">
										Anderson, Keith
										</td>
										<td class="text-center">
										0.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Garrison, Aletha
										</td>
										<td class="text-center">
										Garay, Jose
										</td>
										<td class="text-center">
										0.0
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Garay, Jose
										</td>
										<td class="text-center">
										11
										</td>
										<td class="text-center">
										18.2
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>

						</div>
						<div class="caption">
								<i class="fa fa-star-o font-blue-steel"></i>
								<span class="caption-subject font-blue-steel bold uppercase">Driver #2</span>
							</div>
						<div class="row">

								<div class="col-md-4">
								<div class="table-scrollable">
									<table class="table table-striped table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>TOP 5 OVERALL</b>
										</th>
									</tr>
									<tr>
										<th class="text-center ">
										Person
										</th>
										<th class="text-center ">
										Surveys
										</th>
										<th class="text-center ">
										WTR
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Person 1
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 2
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 3
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 4
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 5
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>
							<div class="col-md-4">
							
								<div class="table-scrollable">
									<table class="table table-striped table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>TOP 5 OVERALL</b>
										</th>
									</tr>
									<tr>
										<th class="text-center">
										<b>Person</b>
										</th>
										<th class="text-center">
										<b>Surveys</b>
										</th>
										<th class="text-center">
										<b>WTR</b>
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Person 1
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 2
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 3
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 4
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 5
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>
							<div class="col-md-4">
								<div class="table-scrollable">
									<table class="table table-striped table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>TOP 5 OVERALL</b>
										</th>
									</tr>
									<tr>
										<th class="text-center">
										<b>Person</b>
										</th>
										<th class="text-center">
										<b>Surveys</b>
										</th>
										<th class="text-center">
										<b>WTR</b>
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Person 1
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 2
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 3
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 4
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 5
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>
							
						</div>
						<div class="caption">
							<i class="fa fa-star-o font-blue-steel"></i>
							<span class="caption-subject font-blue-steel bold uppercase">Driver #3</span>
						</div>
						<div class="row">
						
								<div class="col-md-4">
								<div class="table-scrollable">
									<table class="table table-striped table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>TOP 5 OVERALL</b>
										</th>
									</tr>
									<tr>
										<th class="text-center">
										<b>Person</b>
										</th>
										<th class="text-center">
										<b>Surveys</b>
										</th>
										<th class="text-center">
										<b>WTR</b>
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Person 1
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 2
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 3
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 4
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 5
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>
							<div class="col-md-4">
								<div class="table-scrollable">
									<table class="table table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>TOP 5 OVERALL</b>
										</th>
									</tr>
									<tr>
										<th class="text-center bg-grey-steel">
										Person
										</th>
										<th class="text-center bg-grey-steel">
										Surveys
										</th>
										<th class="text-center bg-grey-steel">
										WTR
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Person 1
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 2
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 3
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 4
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 5
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>
							<div class="col-md-4">
								<div class="table-scrollable">
									<table class="table table-striped table-bordered2 table-hover">
									<thead>
									<tr>
										<th colspan="3" class="text-center bg-blue-steel">
											 <b>TOP 5 OVERALL</b>
										</th>
									</tr>
									<tr>
										<th class="text-center">
										<b>Person</b>
										</th>
										<th class="text-center">
										<b>Surveys</b>
										</th>
										<th class="text-center">
										<b>WTR</b>
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td class="text-center">
										Person 1
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 2
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 3
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 4
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									<tr>
										<td class="text-center">
										Person 5
										</td>
										<td class="text-center">
										123
										</td>
										<td class="text-center">
										44.6
										</td>
									</tr>
									</tbody>
									</table>
								</div>	
							</div>
							</div>
						</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
			</div>
			<!-- /.modal -->
							<div class="modal fade bs-modal-sm" id="filter_validate" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											
											<h4 class="modal-title font-red"><i class="fa fa-exclamation-triangle"></i>&nbsp<b>Error!<b></h4>
										</div>
										<div class="modal-body font-normal" id="error_message">
											 
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default red" data-dismiss="modal">Close</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?

	site_footer();

?>
<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../../assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/table-advanced.js"></script>
<script src="../../assets/admin/pages/scripts/components-pickers.js"></script>
<script src="../../assets/admin/pages/scripts/form-validation.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo(theme settings page)
   ComponentsPickers.init();
   TableAdvanced.init();
   FormValidation.init();
   $('.progress .progress-bar').progressbar({display_text: 'fill'});


   
   
});

	function validateForm() {
	    var primary = document.forms["filter"]["filter_primary"].value;
	    var compare = document.forms["filter"]["filter_compare"].value;
	    var cid = document.forms["filter"]["filter_cid"].value;
	    var view = document.forms["filter"]["filter_view"].value;
	    var error = '';

	    if (primary == null || primary == "") {
	      	error += "Please enter a primary date range.<br>";  
	    }
	    if (compare == null || compare == "") {
	      	error += "Please enter a compare date range.<br>";  
	    }
	    if (cid == null || cid == "") {
	      	error += "Please select a leader.<br>";  
	    }
	    if (view == null || view == "") {
	      	error += "Please select a view.<br>";  
	    }

	    if(error != '') {
	    	$('#error_message').html(error);
	    	$('#filter_validate').modal('toggle');
	       return false;
	    }
	}

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>