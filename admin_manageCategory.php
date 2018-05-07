<?php
//session_start();
//$_SESSION['mystoryPage']='showmystory';
//$_GET['page'];
?>

<div class="row adminManageCategoryPage">
	<div class="marginAuto divBtn min-h">
		<div class="row marginAuto boxImgLogo">
			<p ><b class="marginL20">Manage Category</b></p>
		</div>
		<div class="icon64 icon-folder marginB10"></div>
		<div class="blockAdmin marginAuto marginT20">
			<div class="marginT20 iconBtn">
				<div class="icon36 icon-add" id="addBtn" ></div>
				<div class="icon36 icon-delete" id="" data-toggle="modal" data-target="#exampleModal"></div>
			</div>
			<div class="" style="padding-top:80px;">
				<div class="form-group borderBlue marginAuto"  style="width:95%;">
					<ul class="list-group" id = "textCategory" style="margin:0">
					</ul>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<div  class="text-center sizeBtn" >
						
						<button type="button" class="btn btn-back" style="" id="backBtn">Back</button>
					</div>
					<p class="marginB10"></p>
				</div>
			</div>

		
		</div>
	</div>
</div>
   
<script type="text/javascript">
	$(document).ready(function(){
		$(".adminPage").addClass('active')
		$(".textName").text("Manage Category")
		$(".storyPage").hide() ///ซ่อนมายสตอรี่
		
		
		//////เมื่อโหลดหน้านี้มาให้ดึง category มาจาก Db ก่อน
		$.ajax({
			type:'POST',
			url:'qs/qs_showCategory.php',
			dataType: "json",
			data: {},
			success:function( datajson ) {      ///ถ้ามีข้อมูลกลับมา
				if(datajson.length !=0){ 
					$('#textCategory').empty();
					$.each(datajson, function(i,item){
						//var no = i;
						//var textCategory = '<li class="list-group-item">'+datajson[i].category_name+'</li>';
						var no = i+1;
						var textCategory = '<li class="list-group-item" data-id='+datajson[i].category_id+'>'+no+". "+datajson[i].category_name+'</li>';
						
						$('#textCategory').append(textCategory);
					});	
				}
				else{ 
					$('#textCategory').append("<p class='list-group-item' style=' text-align: center; ' >ไม่มีข้อมูล</p>");
				}
				$('.list-group-item:first').addClass('active'); ///ทำให้อันแรกของลิสเป็นสีฟ้า
				$('ul li').click(function() {
					$('ul.list-group li.active').removeClass('active');
					$(this).closest('li').addClass('active');
					$(".adminPage").addClass('active');
				});
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		
		
		//////////////// เพิ่ม Category
		$("#addBtn").click(function(){
			window.location.href="main.php?page=admin_addCategory";
		});

		//popup
		$(".modal-body").html("ยืนยันการลบข้อมูล")

		$("#okModalBtn").click(function(){//note !!! ส้รางปุ่มไว้ที่ file main
			var text = $('#textCategory li.active').text();
			var categoryId =  $('#textCategory li.active').data("id") // มาจาก  data-id='+datajson[i].news_id+'
			//alert(categoryId ) // เอาค่านี้ไปใช้
		
			//alert(text)
			$.ajax({
				type:'POST',
				url:'qs/qs_deleteCategory.php',
				dataType: "text",
				data: {text:categoryId},
				success:function( datajson ) {     
					if(datajson == 'ok'){
						//alert("ลบแล้ว");
						window.location.href="main.php?page=admin_manageCategory";
					}
					else{ alert("ลบไม่สำเร็จ");
					}
				},
				error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
			});
			
		});


		$("#backBtn").click(function(){
			window.location.href="main.php?page=admin";
		});

		/////////ลบ Category  
		/*
		$("#delBtn").click(function(){
			//var text = $('ul li.active').text();
			var text = $('#textCategory li.active').text();
			alert("del : " +text);
			$.ajax({
				type:'POST',
				url:'qs/qs_deleteCategory.php',
				dataType: "text",
				data: {text:text},
				success:function( datajson ) {     
					if(datajson == 'ok'){
						alert("ลบแล้ว");
						window.location.href="main.php?page=admin_manageCategory";
					}
					else{ alert("ลบไม่สำเร็จ");
					}
				},
				error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
			});
		});*/
	});
		
</script>
<!--
</body>
</html>-->