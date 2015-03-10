<?
	
	session_start();
	include('./include/include.inc');

	$name = $_SESSION['name'];
	$cid = $_SESSION['cid'];
	$site = 'SYKES at Home';
	$page = 'Attainment Board';

	$explosion = explode(',',$name);
	$fname = $explosion[1];

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
<title>QI Tools | Attainment Board</title>
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
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES-->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
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
		site_header($name,$cid); 
		page_nav();
	?>

	
</div>
<!-- END HEADER -->
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">

	<? 
		page_header($page);
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
					 Attainment Board
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="note note-info">
								<h4 class="block">Welcome to your Attainment Board <? echo $fname; ?>!</h4>
								<p>
									 Below you will see your current months Attainment Board.
								</p>
								<p>
									<b>NOTE:</b> The default view is your current team.
								</p>
							</div>
				</div>
			</div>

			<div class="row margin-top-10">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
					
					

					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table font-blue-steel"></i>
								<span class="caption-subject font-blue-steel bold uppercase">Attainment Board</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						
						<div class="portlet-body">
							


							<table class="table table-striped table-bordered table-hover" id="">
							<thead>
							<tr>
								
								<th colspan='14' class='bg-blue-steel text-center'>
									 All Up
								</th>
								<th rowspan='4' class='bg-blue-steel text-center'>
									 <i class="fa fa-cogs"></i>
								</th>
							</tr>
							<tr>
								<th rowspan='3' class='text-center v-align-header-middle bg-grey'>
									Team Member
								</th>
								<th rowspan='3' class='text-center bg-grey'>
									Behavior Shoutouts
								</th>
								<th rowspan='2' colspan='2' class='text-center bg-grey'>
									WTR (target: 42)
								</th>
								<th  rowspan='2' colspan='2' class='text-center bg-grey'>
									FCR (target: 72%)
								</th>
								<th rowspan='2' colspan='2' class='text-center bg-grey'>
									DF (target: 35%)
								</th>
								<th colspan='6' class='text-center bg-blue-ebonyclay'>
									Timeliness
								</th>
								
							</tr>
							<tr>
								<th colspan='2' class='text-center bg-grey'>
									AHT (target: 480x20)
								</th>
								<th colspan='2' class='text-center bg-grey'>
									Transfer (target: 18.5%)
								</th>
								<th colspan='2' class='text-center bg-grey'>
									Hold (target: 24%)
								</th>
								
							</tr>
							<tr>	
								<th class='text-center'>
									OCT
								</th>
								<th class='text-center'>
									MTD
								</th>
								<th class='text-center'>
									OCT
								</th>
								<th class='text-center'>
									MTD
								</th>
								<th class='text-center'>
									OCT
								</th>
								<th class='text-center'>
									MTD
								</th>
								<th class='text-center'>
									OCT
								</th>
								<th class='text-center'>
									MTD
								</th>
								<th class='text-center'>
									OCT
								</th>
								<th class='text-center'>
									MTD
								</th>
								<th class='text-center'>
									OCT
								</th>
								<th class='text-center'>
									MTD
								</th>
								

							</tr>
							
							</thead>
							<tbody>
								<tr>
									<td>
										Team Member #1
									</td>
									<td class='text-center'>
										
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center analyze-green'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										
									</td>
								</tr>
								<tr>
									<td>
										Team Member #2
									</td>
									<td class='text-center'>
										
									</td>
									<td class='text-center analyze-green'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center analyze-red'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center analyze-red'>
										100
									</td>
									<td class='text-center analyze-green'>
										100
									</td>
									<td class='text-center'>
										
									</td>
								</tr>
								<tr>
									<td>
										Team Member #3
									</td>
									<td class='text-center'>
										
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center analyze-red'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										100
									</td>
									<td class='text-center'>
										
									</td>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
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
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/table-advanced.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo(theme settings page)
   TableAdvanced.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>