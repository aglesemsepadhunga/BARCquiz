<?php 
    session_start();
    include('config/connect.php');
    
    //check GET request ,id parameter

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        //make sql
        $sql = "SELECT * FROM qa WHERE id=$id";
        //get query results
        $result=mysqli_query($conn,$sql);
        //fetch result in array format
        $dish = mysqli_fetch_assoc($result);
    }

    if(isset($_POST['next']) && isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
         
        if($id==1)
        {   if(empty($_POST['ans'])) header('Location:quiz.php?id=2'); 
            $response = $_POST['ans'];
            $roll = mysqli_real_escape_string($conn,$_SESSION['roll']);
            echo $roll;
            $sql = "UPDATE response SET a=$response WHERE roll=$roll";
            if (mysqli_query($conn,$sql)) {
                    # code...sucess
                    header('Location:quiz.php?id=2');
                }else{
                    //error
                    echo 'query error'.mysqli_error($conn);
                }
            
        }
        if($id==2)
        {
            if(empty($_POST['ans'])) header('Location:quiz.php?id=3'); 
            $response = $_POST['ans'];
            $roll = mysqli_real_escape_string($conn,$_SESSION['roll']);
            echo $roll;
            $sql = "UPDATE response SET b=$response WHERE roll=$roll";
            if (mysqli_query($conn,$sql)) {
                    # code...sucess
                    header('Location:quiz.php?id=3');
                }else{
                    //error
                    echo 'query error'.mysqli_error($conn);
                }
            
        }
        if($id==3)
        {
            if(empty($_POST['ans'])) header('Location:quiz.php?id=4'); 
            $response = $_POST['ans'];
            $roll = mysqli_real_escape_string($conn,$_SESSION['roll']);
            
            $sql = "UPDATE response SET c=$response WHERE roll=$roll";
            if (mysqli_query($conn,$sql)) {
                    # code...sucess
                    header('Location:quiz.php?id=4');
                }else{
                    //error
                    echo 'query error'.mysqli_error($conn);
                }
            
        }
        if($id==4)
        {
            if(empty($_POST['ans'])) header('Location:quiz.php?id=1'); 
            $response = $_POST['ans'];
            $roll = mysqli_real_escape_string($conn,$_SESSION['roll']);
            echo $roll;
            $sql = "UPDATE response SET d=$response WHERE roll=$roll";
            if (mysqli_query($conn,$sql)) {
                    # code...sucess
                    header('Location:quiz.php?id=1');
                }else{
                    //error
                    echo 'query error'.mysqli_error($conn);
                }
            
        }
        
    }
     mysqli_free_result($result);
        mysqli_close($conn);
 ?>


 <!DOCTYPE html>
 <html>
 <?php include ('header.php'); ?>
        
    <form class="ques" action="quiz.php?id=<?php echo($dish['id']) ?>" method="POST" >
        <h3 style="color:#g4f1f9"><?php echo htmlspecialchars($dish['question']); ?></h3><hr>
        
        <label>
            <input type="radio" id="a" name="ans" value="1" class="with-gap" />
            <span style="font-size: 25px;"><?php echo htmlspecialchars($dish['a']); ?></span>
        </label><br>
        <label>
            <input type="radio" id="b" name="ans" value="2" class="with-gap" />
            <span style="font-size: 25px;"><?php echo htmlspecialchars($dish['b']); ?></span>
        </label><br>
        <label>
            <input type="radio" id="c" name="ans" value="3" class="with-gap" />
            <span style="font-size: 25px;"><?php echo htmlspecialchars($dish['c']); ?></span>
        </label><br>
        <label>
            <input type="radio" id="d" name="ans" value="4" class="with-gap" />
            <span style="font-size: 25px;"><?php echo htmlspecialchars($dish['d']); ?></span>
        </label><br><hr><br>

        <input type="submit" name="next" value="Save & Next" class="btn">
    </form>
        <div class="contain" id="main">
            <span id="spn" style="text-align: center;display: block;font-family: sans-serif;color: white;font-size: 25px;background-color: #446cb3;margin-bottom: 0px;padding: 5px;">Questions</span>
            <a href="quiz.php?id=1"><div class="box " id="box1">1</div></a>
            <a href="quiz.php?id=2"><div class="box " id="box2">2</div></a>
            <a href="quiz.php?id=3"><div class="box " id="box3">3</div></a>
            <a href="quiz.php?id=4"><div class="box " id="box4">4</div></a>
            <a href="quiz.php?id=5"><div class="box " id="box5">5</div></a>
            <a href="quiz.php?id=6"><div class="box " id="box6">6</div></a>
            <a href="quiz.php?id=7"><div class="box " id="box7">7</div></a>
            <a href="quiz.php?id=8"><div class="box " id="box8">8</div></a>
            <a href="quiz.php?id=9"><div class="box " id="box9">9</div></a>
            <!-- <button class="hidden" id="hid" onclick="replay()">Restart the Match</button> -->
        </div>
 </body>
 </html>