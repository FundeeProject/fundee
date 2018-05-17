<?php
//session_start();
//$_SESSION['mystoryPage']='showmystory';
//$_GET['page'];
?>

<div class="row adminAddCategoryPage">
	<div class="marginAuto divBtn min-h">
	
		<div class="row marginAuto boxImgLogo">
			<p class="marginL20"><b>Manage Category</b></p>
		</div>
		<div class="icon48 icon-folder marginB10"></div>
		<div class="blockAdmin marginAuto marginT20">
			<div class="divTextDetail">
				<div class="icon24 icon-add"></div>
				<p class="text-blue"><b>Add Category</b></p>
			
					<input type="text" class="form-control" id="textCategory" placeholder="Type Category name" name="" >
					
					<div class="row marginT20">
						<div class="col-xs-12">
							<div  class="text-center sizeBtn " >
								<button type="button" class="btn btn-back" style="" id="backBtn">Back</button>
								<button type="button" class="btn btn-info" style="" id="addBtn">Add</button>
							</div>
							<p class="marginB10"></p>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>

  
<script type="text/javascript">
	$(document).ready(function(){
		$(".adminPage").addClass('active')
		$(".storyPage").hide()
			
		$("#addBtn").click(function(){
			var Categoryname = $("#textCategory").val();
			//alert(Categoryname)
			if(Categoryname == "" ){
				alert("กรุณากรอกข้อมูลให้ครบ");
				//$("#exampleModal").modal()// เปิดใช้ popup
				//$(".modal-body").html(data)	 //ใส่ข้อความที่ต้องการ alert	
			}else{
				$.ajax({
					type:'POST',
					url:'qs/qs_add_Category.php',
					dataType: "text",
					data: {Categoryname:Categoryname},
					success:function( datajson ) {  
						if(datajson == 'ok'){
							alert("Added finished");
							window.location.href="main.php?page=admin_manageCategory";
						}
						else{ alert("Unsuccessful ! "+datajson);
						}
					},
					error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
				});
			}
			 
				//window.location.href="main.php?page=admin_manageCategory";
		});
			
		$("#backBtn").click(function(){
			window.location.href="main.php?page=admin_manageCategory";
		});
	});
			
</script>
<!--
</body>
</html>
-->