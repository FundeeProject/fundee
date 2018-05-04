<?php
session_start();
$_GET['storyID'];
?>

<div class="home" id="showStory">
	<center>
		<p>play mystory</p>
	</center>
</div>
<div>
	<button type="button" id = "go" class="btn btn-primary wp100">Play</button>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script>
$(document).ready(function(){
	
	$(".storyPage").addClass('active');
	$(".adminPage").hide();
	
	var storyid = ""+<?php echo $_GET['storyID']; ?>+"" ;
	$.ajax({ //// เริ่มต้นมาให้ดึงนิทานทั้งหมดที่เป็นของ user มาแสดง
		type:'POST',
		url:'qs/qs_findbookby_id.php',
		dataType: "json",
		data: {storyid:storyid},
		success:function( datajson ) { 
			var img = "";
			if(datajson.length !=0){
				$.each(datajson, function(i,item){
					var no =i+1;
					if(datajson[i].story_pic == 'NULL' ){
						img +="<div class='col-xs-4 col-lg-2  boxImg'><div class='h100 testClick'><input type='hidden'  value ='"+datajson[i].story_id+"'><img src ='imgStory/img_00.png'/></div></div>"
					}else{
						img +="<div class='col-xs-4 col-lg-2  boxImg'><div class='h100 testClick'><input type='hidden'  value ='"+datajson[i].story_id+"'><img src ='imgStory/"+ datajson[i].story_pic + "'/></div></div>";
					}
					img += "<p> Name : "+ datajson[i].story_name+"</p>"+
					"<p> Description :"+datajson[i].story_description+"</p>"+
					"<p> Category :"+ datajson[i].category_name +"</p>"+
					"<p> Creator :"+ datajson[i].username+"</p>";
				});	
				
				$('#showStory').append("<div class='row' style='width:95%'>" +img+ "</div>"); 
			}
			else{
				  //alert("ไม่พบข้อมูลผู้ใช้");
				  //window.location.href = "index.php";
			}
		},
		error:function(jqXHR, textStatus, errorThrown){alert(errorThrown);}		
	});	
	$("#go").click(function(){ 
		window.location.href = "full_page.php?storyid="+storyid+"";
	});
});
</script>   