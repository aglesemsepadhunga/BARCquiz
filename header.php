<head>
	<title>
	
	</title>
	<style type="text/css">
		.brand{
			background: #5CDB95 !important;
		}
		.brand-text{
			color : #5CDB95 !important;

		}
		form{
			max-width: 500px;
			margin: 20px auto;
			padding: 20px;
		}
		.pic{
			width: 200px;
			margin: 40px,auto;
			border-radius: 50px;
		}
		.nav{margin-bottom: 50px; }
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!-- CSS -->
	<style type="">
		.timeout{color: red; }
         .contain{width: 150px;overflow: hidden;margin: 0px;background-color: grey;position: fixed;top: 70px;}
         .contain .box{float: left;width: 100%;height: 60px;border: 1px solid whitesmoke;color: whitesmoke;
                            transition: all .25s ease-in-out;font-family: sans-serif;font-size: 40px; text-align: center; cursor:grab;}
         .contain .box:hover{background-color: #5CDB95;}
         .ques{background-color: white;
				border-radius: 20px;
				line-height: 50px;
				left: 30%;
				width: 75%;}
		form span{font-family: all;color: grey;}
		form label{
			
		}
	</style>

	<!-- JAVASCRIPT FOR TIMER -->
	<script>
		
		<?php
                  $start=$_SESSION['startTime'];
                  $current=new DateTime(); 
                  $interval = $current->diff($start);          ?>
          var tim;
            var hour= 00;
            var min = '<?php echo $interval->format('%i'); ?>';
            var sec = '<?php echo $interval->format('%s'); ?>';
            
            function f2() {
                if (parseInt(sec) > 0) {
                    sec = parseInt(sec) - 1;
                    document.getElementById("showtime").innerHTML = "Left Time:"+hour+" hours:"+min+" Minutes :" + sec+" Seconds";
                    tim = setTimeout("f2()", 1000);if (parseInt(min) == 0){
                        	var showtime=document.getElementById("showtime");
                        	showtime.classList.add("timeout");
                        }

                }
                else {
                    if (parseInt(sec) == 0) {
                        min = parseInt(min) - 1;
                        if (parseInt(min) == 0){
                        	var showtime=document.getElementById("showtime");
                        	showtime.classList.add("timeout");
                        }
                        if (parseInt(min) == -1) {
                            clearTimeout(tim);
                            
                            location.href ="finish.php";
                        }
                        else {
                            sec = 59;
                            document.getElementById("showtime").innerHTML = "Left Time:"+hour+" hours:"+min+" Minutes :" + sec+" Seconds";
                            tim = setTimeout("f2()", 1000);
                        }
                    }
                }
            }
	</script>
	
</head>
  <body onload="f2()" class="grey lighten-3">
  	<nav class="grey lighten-2 nav" style="height: 70px;">
  		<div class="container"><a href="index.php" class="brand-logo brand-text">BARC</a>
  		<ul id="nav-mobile" class="right hide-on-small-and-down">
  			<li><a href="" class="btn brand" ><div id="showtime"></div></a></li>
  			<li><a href="finish.php" class="btn brand " >FINISH</a></li>
  		</ul>		
  		</div>
  				
  	</nav>
