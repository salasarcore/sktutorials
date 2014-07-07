<style>
.gallery{
	margin:0px;
	padding:0px;
	font-family: Calibri, Arial, Verdana;
	font-size: 20px;

}
</style>

 
<div class="five columns">
<script>
 var nt_example1 = $('#nt-example1').newsTicker({
                row_height: 80,
                max_rows: 3,
                duration: 4000,
                prevButton: $('#nt-example1-prev'),
                nextButton: $('#nt-example1-next')
            });
			</script>

	<div class='block clearfix' style="height:175px;">
		<div class="block_head_blue"> <h2>News / Announcement</h2></div>
		<marquee behavior="scroll" direction="up" height="100px" scrolldelay="200">
	    <div class="block-text">
		
			<i class="fa fa-arrow-up" id="nt-example1-prev"></i>
		                <ul id="nt-example1">
		                </ul>
		                <i class="fa fa-arrow-down" id="nt-example1-next"></i>
		</div>
	</marquee>

	</div>
	<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script type="text/javascript" src="js/modernizr.custom.26633.js"></script>
	<div class='block clearfix'>
		<div class="block_head_orange"><div style="display: inline;"><h2>Image Gallery</h2></div><div style="float:right;display: inline; margin-top: -15px;"><a href="gallerylist.php" style="color: #FFFFFF;"><b>View All</b></a></div></div>
	    <div class="block-text">
<div id="ri-grid" class="ri-grid ri-grid-size-1">
	
</div>

	</div>

</div><!-- container-->
<div class="clear"></div>
</div>

<script>
		$.ajaxSetup({async: false});
		var gallerycount=0;
		var imagecount=0;
		var galleryname="";
	    $.ajax({
		    
	    	type: "GET",
	    	async: false, 
	    	url:"http://skt.salasaredu.com/api/galleryfront.php",
	    	dataType: 'json',

		    success: function(html){
		    	gallerycount=html.count;
		    	if(gallerycount==0)
		    	{
		    		$("#ri-grid").append("<div style='text-align:center;padding-top:3px;padding-bottom:3px;'>No Images Found</div>");
		    	}
		    	else {
		   
		    		$.ajax({
					    
				    	type: "GET",
				    	async: false, 
						
				    	url:"http://skt.salasaredu.com/api/subgalleryfront.php",

				    	dataType: 'json',

					    success: function(data){

						    
						    
					    	if(data.count==0)
					    	{
					    		$('#ri-grid').append("<div class='gallery' style='  z-index: 4; float:right; display:inline; width: 140px; height: 140px;'>No Images Found</div>");
					    		
					    	}
					    	else {
					    		$('#ri-grid').append("<ul id='list1'>");
					    	for(j=0;j<data.count;j++){
					    		for(k=0;k<gallerycount;k++){
						    		if(data.gallery_id[j]==html.gallery_id[k])
						    			galleryname=html.gallery_name[k];
					    		}
					    		
					    	
					    	$('#list1').append(" <li style='width: 140px; height: 140px;'><a href='gallery1.php?gallery="+data.gallery_id[j]+"&name="+galleryname+"'><img width: 140px; height: 140px; src='http://"+data.imgPath1[j]+"' /></a></li>");
					    	}
					    	$('#list1').append("</ul>");
					    	}
					    	
						}
			   		});

			   		
		  
		    	}
		    	
			}
	    });

 
		var countrec=0;
	    $.ajax({
	    	type: "GET",
	    	async: false, 
	    	url:"http://skt.salasaredu.com/api/news_listfrntend.php",
	    	dataType:"JSON",
		    success: function(html){

		    	if(html.count==0)
		    	{
		    		$("#nt-example1").append("<div style='text-align:center;padding-top:3px;padding-bottom:3px;'>No News Found</div>");
		    	}
		    	else {
			    if(html.count>5)
				    countrec=5;
			    else
				    countrec=html.count;
			    
		    	for(i=0;i<countrec;i++){
		    		
		    	$("#nt-example1").append("<li><a title='"+html.subject[i]+"' href='http://skt.salasaredu.com/news.php'>"+html.subject[i]+"</a></li>");
		    	}
		    	}
			}
   		});
			 
		</script>
		
		<script type="text/javascript" src="js/jquery.gridrotator.js"></script>
		<script type="text/javascript">	
			$(function() {
			
				$( '#ri-grid' ).gridrotator( {
					w320 : {
						rows : 3,
						columns : 4
					},
					w240 : {
						rows : 3,
						columns : 3
					}
				} );
			
			});
		</script>
		