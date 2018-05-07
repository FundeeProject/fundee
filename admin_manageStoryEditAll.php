<div class="row adminManageStoryEditAllPage">
	<div class="marginAuto divBtn min-h">
		<p class="text-center text-blue marginT10" ><b>Story Name : <span class="text-orenge" id="textStory"></span> </b></p>
		<div class="marginAuto marginB20" style="width:90%; height:auto;">
			<p style="text-align:  left; font-style:italic; padding-left: 10px;    margin-bottom: 0px;">
				<i class="glyphicon glyphicon-triangle-bottom text-14 text-blue"></i>
				Click button for Add picture and Record
			</p>
			<div class="text-center marginAuto" style="width:95%; height:100%; background-color:#bbd3de; border-radius: 5px;">
			
				<div id="" class="form-group">
					<div class='row marginAuto'  style="width:95%" id="showStory" >
						<!--
					    <div class="col-xs-4 col-lg-2 boxImg"> 
							<div class="viewDetail" > 
								<div class="imgbox icon-page1">
									<div class="iconNbr"><span class="text-white">1<span></div>
								</div> 
							</div>
						</div>
						-->
					</div>
				</div> 
			</div>
			<div class="row marginT20">
				<div class="col-xs-12">
					<div  class="text-center sizeBtn " >
						<button type="button" class="btn btn-back" style="" id="backBtn">Back</button>
						<button type="button" class="btn btn-info" style="" id="updateBtn">Update</button>
					</div>
					<p class="marginB10"></p>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//สีฟ้าที่ปุ่ม admin
		$(".adminPage").addClass('active')
		$(".storyPage").hide()
		//สี bg
		$(".mainDetail").css('background-color', '#fcf8e3');
		
		$("#textStory").text("TEST..........")
		
		//วนสร้าง กรอบ img 
		for (i = 1; i < 10; i++) { 
			//alert(i)
			var div = '<div class="col-xs-4 col-lg-2 boxImg"> '+
							'<div class="viewDetail" >'+
								'<div class="imgbox icon-page1">'+
									'<div class="iconNbr"><span class="text-white">'+i+'<span></div>'+
								'</div>'+
							'</div>'+
					  '</div>'
		   // $("showStory")
			$('#showStory').append(div);	
		}
		
		$("#backBtn").click(function(){
			window.location.href="main.php?page=admin_manageStoryEdit";
		});
		  
		$("#updateBtn").click(function(){
			alert("ทำต่อด้วย ")
		});
		
		
		
	});
	
	
		
	
</script>