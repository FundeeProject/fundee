<?php
/*session_start();
$_SESSION['mystoryPage']='showmystory';
$_GET['page'];*/
?>



<div class="row adminManageNewsPage">
	<div class="marginAuto divBtn min-h">
		<div class="row marginAuto boxImgLogo">
			<p><b>Manage News</b></p>
		</div>
		<div class="icon48 icon-news2 marginB10"></div>
		<div class="blockAdmin marginAuto marginT20">
			<div class="marginT20 iconBtn">
				<div class="icon36 icon-add" id="addBtn" ></div>
				<div class="icon36 icon-delete" id="" data-toggle="modal" data-target="#exampleModal"></div>
				<!--<div class="icon36 icon-delete" id="delBtn"></div>-->
			</div>
			<div class="" style="padding-top:80px;">
				<div class="form-group borderBlue marginAuto"  style="width:95%;">
					<ul class="list-group" id = "textNews" style="margin:0">
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
		$(".storyPage").hide()
		///DB
		$.ajax({
			type:'POST',
			url:'qs/qs_showNews.php',
			dataType: "json",
			data: {},
			success:function( datajson ) {     
				if(datajson.length !=0){
					$('#textNews').empty();
					$.each(datajson, function(i,item){
						var no = i+1;
						var textNews = '<li class="list-group-item" data-id='+datajson[i].news_id+'>'+no+". "+datajson[i].description+'</li>';
						//var textNews = '<li class="list-group-item">'+datajson[i].description+'</li>';
						$('#textNews').append(textNews);
					});	
				}
				else{
					$('#textNews').append("<p class='list-group-item' style=' text-align: center; ' >ไม่มีข้อมูล</p>");
				}
				
				$('.list-group-item:first').addClass('active');
	
				$('ul li').click(function() {
					$('ul.list-group li.active').removeClass('active');
					$(this).closest('li').addClass('active');
					$(".adminPage").addClass('active');
				});
			},
			error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
		});
		
		//
		
		
		  
		$("#addBtn").click(function(){
			//window.location.href='addmin_addNews.php';
			//window.location.href="main.php?page=addmin_addNews";
			window.location.href="main.php?page=admin_addNews";
		});

		//popup
		$(".modal-body").html("ยืนยันการลบข้อมูล")
		
		$("#okModalBtn").click(function(){//note !!! ส้รางปุ่มไว้ที่ file main
			var text = $('#textNews li.active').text();
			var newId =  $('#textNews li.active').data("id") // มาจาก  data-id='+datajson[i].news_id+'
			//alert(newId ) // เอาค่านี้ไปใช้
		
			//alert(text)
			
			$.ajax({
				type:'POST',
				url:'qs/qs_deleteNews.php',
				dataType: "text",
				data: {news_id:newId},
				success:function( datajson ) {     
					if(datajson == 'ok'){
						//alert("ลบแล้ว");
						window.location.href="main.php?page=admin_manageNews";
					}
					else{ alert("ลบไม่สำเร็จ กรุณาลองใหม่");
					}
				},
				error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
			});
		});


		$("#backBtn").click(function(){
			window.location.href="main.php?page=admin";
		});
		
	});
</script>

<!-- 
	1.ตอนนี้ข้อมูลไม่ลบ ต้องเปลี่ยนจากส่ง id ไปลบ แก้แล้วค่ะ
	2.กดปุ่ม back แล้วไปไหน แก้แล้วค่ะ

-->
