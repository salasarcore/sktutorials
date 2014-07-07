<?php 
include('scs_config.php');
include('sa_conn.php');

include_once(SH_INC_DIR.'/functions/common.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Gallery: S K Tutorials</title>
	<meta name="keywords" content="S K Tutorials, CBSE School, SSC School, College, Commerce">
	<meta name="description" content="To become the Number One Institute in India for Guiding and Coaching Students for being Successful in Academic as well as in Competitive Examinations.">
	<meta name="author" content="Salasar Core Solution">

	<?php include(SH_INC_DIR.'/js_css_common.php');?>
	<link rel="stylesheet" href="css/lightbox.css" media="screen"/>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script src="js/lightbox-2.6.min.js"></script>

</head>
<body>
	
<div class="container" >

<?php include(SH_INC_DIR.'/header.php');?>
<div id="wrapper">
<?php include(SH_INC_DIR.'/menu.php');?>

	<main id="main">
		<div class="container">
		<?php include_once(SH_INC_DIR.'/banner/banner.php');?>
			<div class="twelve columns">
				
							<div class="block-green">

							<div style="width: 600px;color: #236B8E;font-weight: bold;font-size: 14px;text-align: center;">Gallery Name:<?php echo $_REQUEST['name'];?></div>
			
							<div class="img_gallery" id="img_gallery2">
														
					  </div>
	
							</div>
				</div>	<!--twelve columns-->
								 <input type="hidden" id="gallery" name="gallery" value='<?php echo $_REQUEST['gallery'];?>'/>
					  <script>
					  
					  $.ajaxSetup({async: false});
					  var dataString='gallery_id='+$('#gallery').val();
	    $.ajax({
		    
	    	type: "GET",
	    	async: false, 
			
	    	url:"http://skt.salasaredu.com/api/subgalleryfront.php",
	    	 data: dataString,
	    	dataType: 'json',

		    success: function(html){
		    	if(html.count==0)
		    	{
		    		$("#img_gallery2").append("<div style='text-align:center;padding-top:3px;padding-bottom:3px;'>No Images Found</div>");
		    	}
		    	else {
		    	for(i=0;i<html.count;i++){
		    		
		    	$("#img_gallery2").append("<a title='' data-lightbox='example-set' href='http://"+html.imgPath1[i]+"'><img width='115px' height='115px' src='http://"+html.imgPath1[i]+"'></a>");
		    	}
		    	}
		    	
			}
   		});</script>
			<?php include(SH_INC_DIR.'/right.php');?>
			
			</div><!-- container-->
			<br />
		</div><!--wrapper-->
	</main>
	<?php include(SH_INC_DIR.'/footer.php');?>
	


</body> 
</html>