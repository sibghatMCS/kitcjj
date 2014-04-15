<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />



        <!----integratin design---->
        <!-- basic styles -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
                
                <link href="assets/css/bootstrap-lightbox.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />

		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->


		<!-- page specific plugin styles -->
		
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<!-- res styles -->
		<link rel="stylesheet" href="assets/css/res.min.css" />
		<link rel="stylesheet" href="assets/css/res-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/res-skins.min.css" />
       
		<!--[if lt IE 9]>
		  <link rel="stylesheet" href="assets/css/res-ie.min.css" />
		<![endif]-->
<!---end integration-->
        
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    
   <?php if(Yii::app()->controller->action->id!='screen') { ?> 
<div class="navbar navbar-inverse" style="margin-bottom: 0px;">
		  <div class="navbar-inner">
		   <div class="container-fluid">


			  <a class="brand" href="#"><small>Mohsin Foods </small> </a>
			  <ul class="nav res-nav pull-right">

					<li class="light-blue user-profile">
						<a class="user-menu dropdown-toggle" href="#" data-toggle="dropdown">
						<i class="icon-user icon-only"></i>
							<span id="user_info">
								<small>Welcome</small>Admin							</span>
							<i class="icon-caret-down"></i>
						</a>
						<ul id="user_menu" class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
							<li><a href="index.php?r=site/Logout"><i class="icon-off"></i> Logout</a></li>
						</ul>
					</li>




			  </ul><!--/.res-nav-->

		   </div><!--/.container-fluid-->
		  </div><!--/.navbar-inner-->
		</div><!--/.navbar-->
    
  
		<div class="container-fluid" id="main-container">
			<a href="#" id="menu-toggler"><span></span></a><!-- menu toggler -->

			<div id="sidebar">
				<ul class="nav nav-list">
					
					<li class='active'>
					  <a href="index.php">
						<i class="icon-desktop"></i>
						<span>Dashboard</span>
					  </a>
					</li>

					<li>
					  <a href="index.php?r=SalesOrder">
						<i class="icon-list-alt"></i>
						<span>Orders</span>
					  </a>
					</li>
					
					<li>
					  <a href="index.php?r=cook/admin">
						<i class="icon-retweet"></i>
						<span>Cook</span>
					  </a>
					</li>

					
					<li>
					  <a href="index.php?r=degh/admin">
						<i class="icon-file"></i>
						<span>Daigh</span>
					  </a>
					</li>
                                    
                                    	<li>
					  <a href="index.php?r=kits/admin">
						<i class="icon-file"></i>
						<span>Kits</span>
					  </a>
					</li>

				<!--	<li>
					  <a href="settings.html">
						<i class="icon-cog"></i>
						<span>Settings</span>
					  </a>
					</li>-->

                                <li>
					  <a href="index.php?r=SalesOrder/Addorder">
						<i class="icon-file"></i>
						<span>Sales</span>
					  </a>
					</li>
                                
                                
					<li>
					  <a href="index.php?r=site/logout">
						<i class="icon-reply"></i>
						<span>Logout</span>
						
					  </a>
					</li>

					
				</ul><!--/.nav-list-->

				<div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>


			</div><!--/#sidebar-->
                        
                        <div id="main-content" class="clearfix">
					
					
     <div id="breadcrumbs">
<ul class="breadcrumb">
<li><i class="icon-home"></i> <span class="divider">
        <i class="icon-angle-right"></i></span></li>
<li class="active"><?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?></li>
</ul><!--.breadcrumb-->
					</div>
                        <!--#breadcrumbs-->



<div id="page-content" class="clearfix">  
    
    
 

   <?php } echo $content; ?>                  
                                     <?php if(Yii::app()->controller->action->id!='screen') { ?>        
   </div><!--/#page-content-->
					  


			</div><!-- #main-content -->


		</div><!--/.fluid-container#main-container-->


                                     <?php } ?>

		<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only"></i>
		</a>


		<!-- basic scripts -->
	
		<script type="text/javascript">
		window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.min.js'>\x3C/script>");
		</script>
		
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		
		<!--[if lt IE 9]>
		<script type="text/javascript" src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                
                <script type="text/javascript" src="assets/css/bootstrap-lightbox.js"></script>

		<script type="text/javascript" src="assets/js/jquery.dataTables.bootstrap.js"></script>
        
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
       


		<!-- res scripts -->
		<script src="assets/js/res-elements.min.js"></script>
		<script src="assets/js/res.min.js"></script>


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
                    
                    
                    function fancy (id)
                    {
                         $.ajax({
            
			   type: "POST",
			   url: "index.php?r=SalesOrder/Getrecipe&id="+id,
success: function(data){
    //alert(data)
$("#recipedata").html(data);
			 
     $('#demoLightbox').lightbox();
    }
                         
			 });
                          }
                
                $(function() {
                			var oTable1 = $('#table_report').dataTable( {
					 } );
				
					$('[data-rel=tooltip]').tooltip();
				});
				
				$('.date-picker').datepicker();

		</script>
    
    <script>


var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');



</script>
    

</body>
</html>
