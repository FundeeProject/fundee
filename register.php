<?php
/*
session_start();
include "include/config.php";
include "include/function.php";*/
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/ytLoad.jquery.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/ytLoad.jquery.js"></script>
</head>
<body class="bgHome">
    <div class="w100 logoHome login marginT10" style="position:retative"></div>
		<div class="bgW_login">
			<div style="padding-top:60px; width :70%;margin-left:auto; margin-right:auto;">
                 <h4 class="textCenter">Register</h4>
                 <form class="form-horizontal" method="post" name="fregis" id="fregis">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="username">User Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">          
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" style="width: 80px;" id="regis">Submit</button>
                            <button type="button" class="btn btn-secondary" style="width: 80px;" id="back">Back</button>
                        </div>
                        <p class="marginB10"></p>
                    </div>
                 </form>
            </div>
        </div>
    </div>
 
    <script type="text/javascript">
        $(function(){
            $("#regis").click(function(){///alert("click");
                $.post("action.php?op=regis",$("form").serialize(), function(data){
                    //alert("-"+data+"-");
                    if(data=='ok'){
						alert("สมัครสมาชิคเรียบร้อยแล้ว");
                        <?php  
                            //$row = insert("username,password,email,user_point,role_id","'$username','$password','$email','0','1'","user");
                        ?>
                        window.location.href='index.php';
                        //return true;
                    }
                });
            });

            $("#back").click(function(){
                 window.location.href='index.php';

            });
        });
    </script>


</body>
</html>