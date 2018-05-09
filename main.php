<?php
session_start();
$_GET['page'];
$_GET['storyID'];
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- สริปต์ปุ่มสีๆ -->
	<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
	<!-- Add icon library -->
	<!--<link rel="stylesheet" href="css/fontawesome-all.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	
	<link rel="stylesheet" href="css/style.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.navbarH {
  overflow: hidden!important; 
  background-color:#085b6b!important; 
  position: fixed!important; 
  top: 0!important; 
  width: 100%!important; 
  height:188px!important; 
  border:0px!important; 
	left:0px;
  z-index: 99;
}


.navbarHK{
	position:relative!important; 

}


.nav-tabs{border:0}

.mainH {
  background-color:#085b6b!important; 
  position: absolute;
  top: 188!important; 
  width: 100%!important; 
  /*height:260px!important;*/ 
  border:0px!important; 
  left:0px;
  z-index: 0;
  overflow-x: hidden;
}

.mainBg{  
	width: 95%!important;    
	margin-left: auto!important;
	margin-right: auto!important;
}
.mainDetail{
	background-color: #FFF;
	padding:0 16px!important;
	border-bottom-left-radius: 10px!important;
    border-bottom-right-radius: 10px!important;
}

.bgW_login{
	padding-top: 37px!important;
}

/*modal*/
.modal{
	top: 40%;
    width: 90%;
    left: 0;
    right: 0;
    margin: 0 auto;"
}
.modal-footer{
	border:0!important;
	width: 220px;
    position: absolute;
    bottom: 0px;
    margin: 0 auto;
    left: 0;
    right: 0;	
}

</style>
</head>
<body class="bgHome container">
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1948365968761538',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
	
	FB.getLoginStatus(function(response) {
     // statusChangeCallback(response);
		if(response.status === 'connected'){
			//document.getElementById('status').innerHTML ='We are connected';
			//document.getElementById('login').style
		}
		 else if(response.status === 'not_authorized'){
			//document.getElementById('status').innerHTML ='We are not login';
		}
		else{
			//document.getElementById('status').innerHTML ='you are not logged into faceboook ';
		}
    });
	
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   function login(){
		FB.login(function(response){
			if(response.status === 'connected'){
				document.getElementById('status').innerHTML ='We are connected';
				window.location.href='index2.php'; /// เปิดไปหน้าใหม่
				//return false;
			}
			 else if(response.status === 'not_authorized'){
				document.getElementById('status').innerHTML ='We are not login';
			}
			else{
				document.getElementById('status').innerHTML ='you are not logged into faceboook ';
			}
		});
   }
   function info(){
		FB.api(	'/me',
				'GET',
				{fileds:'first_name,last_name_name_id'},
				function(response){
					document.getElementById('status').innerHTML=response.name;
				}
				);
   }
$(document).ready(function(){
	
});
	
	
</script>


<div class="navbarH">
	

<div style="position:absolute"><?php echo $_SESSION["role_id"];?> </div>

   <div class="masterProfile">
	   <i class="fa fa-sign-out-alt"></i>
	   <span class="glyphicon glyphicon-log-out">
   </div>
   <div class="nameLogo" style="width: 130px; height: 53px;"></div>
   <div class="w100 logoHome login marginT10" style="position:retative; top:-20px;"></div>

	<div class="row ">
		<div class="col-xs-12 col-lg-offset-3 col-lg-6">
			<div class="bgW_login contentStory marginB10 border-bottom" style="">
				<section class="area">
					 <div class="row">
						<div class="col-md-12" style="padding:0px;">
							<ul class="nav nav-tabs list-group" style="margin-bottom:0;">
								<li class="homePage"><a href="main.php?page=home">HOME</a></li>
								<!--<li class="homePage"><a href="">HOME</a></li>-->
								<li class="categoryPage"><a href="main.php?page=category">CATEGORY</a></li>
								<li class="storyPage"><a href="main.php?page=mystory">MY STORY </a></li>
								<?php if($_SESSION["role_id"] == 0){echo '<li class="adminPage"><a href="main.php?page=admin">ADMIN </a></li>';} ?>
							</ul>
						</div>
					 </div>
				</section>
			</div>
		</div>
	</div>
</div>

<div class="mainH">
	<div class="row marginB10">
		<div class="col-xs-12 col-lg-offset-3 col-lg-6">
			<div class="mainBg" >
				<div class="mainDetail" >
					<?php 
						if($_GET['page'] == 'home'){include("home.php");
						}else if($_GET['page'] == 'category'){include("category.php");
						}else if($_GET['page'] == 'mystory'){include("mystory.php");
						}else if($_GET['page'] == 'admin'){include("admin.php");
						}else if($_GET['page'] == 'admin_addNews'){include("admin_addNews.php");
						}else if($_GET['page'] == 'admin_manageNews'){include("admin_manageNews.php");
						}else if($_GET['page'] == 'admin_manageCategory'){include("admin_manageCategory.php");
						}else if($_GET['page'] == 'admin_addCategory'){include("admin_addCategory.php");
						}else if($_GET['page'] == 'admin_approveStory'){include("admin_approveStory.php");
						}else if($_GET['page'] == 'admin_manageStory'){include("admin_manageStory.php");
						}else if($_GET['page'] == 'create_story'){include("create_story.php");
						}else if($_GET['page'] == 'admin_approveStoryDetail'){
							if($_GET['storyid'] != ""){include("admin_approveStoryDetail.php");	}
						}else if($_GET['page'] == 'admin_manageStoryDetail'){include("admin_manageStoryDetail.php");
						}else if($_GET['page'] == 'admin_manageStoryEdit'){include("admin_manageStoryEdit.php");
						}else if($_GET['page'] == 'admin_manageStoryEditAll'){include("admin_manageStoryEditAll.php");
						}else if($_GET['page'] == 'full_page'){
							if($_GET['storyid'] != ""){include("full_page.php");}
						}else if($_GET['page'] == 'play_story'){
							if($_GET['storyID'] != ""){
								include("play_story.php");
							}
						}else if($_GET['page'] == 'play_storydetail'){
							if($_GET['storyID'] != ""){
								include("play_storydetail.php");
							}
						}else if($_GET['page'] == 'play_storydetail_formystory'){
							if($_GET['storyID'] != ""){
								include("play_storydetail_formystory.php");
							}
						}else if($_GET['page'] == 'create_page'){
							if($_GET['storyid'] != ""){
								include("create_page.php");
							}
						}else if($_GET['page'] == 'create_page_detail'){
							if($_GET['storyid'] != "" && $_GET['pageid'] != ""){
								include("create_page_detail.php");
							}
						}else if($_GET['page'] == 'uesr_edit_story'){
							if($_GET['storyidToEdit'] != "" ){
								include("uesr_edit_story.php");
							}
						}else if($_GET['page'] == 'user_edit_story_page'){
							if($_GET['storyid'] != "" ){
								include("user_edit_story_page.php");
							}
						}else if($_GET['page'] == 'user_edit_story_page_detail'){
							if($_GET['storyid'] != "" && $_GET['pageid'] != ""){
								include("user_edit_story_page_detail.php");
							}
						}
						//
						
						
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->

<div class="modal fade exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="min-height: 150px;">
      <div class="modal-body" style="text-align:center;">
      </div>
      <div class="modal-footer marginAuto" style="" >
        <!--<button type="button" class="btn btn-secondary noBtn" id="noModalBtn" style="width:90px;" data-dismiss="modal">Close</button>-->
		<button type="button" class="btn btn-back noBtn" style="width:80px;" id="noModalBtn" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info okBtn" id="okModalBtn" style="width:80px;">Yes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
//=======================>>>>> logout <<<<<=======================
	$(".glyphicon-log-out").click(function(){ 
		window.location.href="logout.php";
	});
	
	/*$(".homePage").click(function(){ 
		window.location.href="main.php?page=home";
	});*/

	
	
	
	
});
</script>
</body>
</html>