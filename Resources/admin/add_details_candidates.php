<?php
    session_start();
    if(!$_SESSION['admin_id'])
    {
        header("location:adminLogin.php");
    }

    if(isset($_SESSION['admin_id']))
    {
        if(time()-$_SESSION['time']>360)
        {
            unset($_SESSION['admin_id']);
        unset($_SESSION['admin_password']);
        // unset($_SESSION['user_id_generated']);
        session_destroy();
        header("location:adminLogin.php");
        }
        else
        {
            $_SESSION['time']=time();
        }
    }
    else
    {
        header("location:adminLogin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content=".7"> -->
    <link rel="icon" type="image/x-icon" href="images/vote-picture_600x600.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>ADD DETAILS CANDIDATE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            /* background-color: #0089c4; */
            /* background: linear-gradient( rgba(0,0,0,.5),#ffae98 ), url(images/wb.jpg); */
        }
        .bgg{
            background-image: url(images/wallpaper.png);
            /* background: linear-gradient( skyblue,blue ); */
        }

        /* new */
        header {
            position: relative;
            width: 100%;
            height: 90px;
            /* background: #27c0ff; */
            /* background: linear-gradient( #27c0ff,skyblue ); */
            background: linear-gradient(#27c0ff,white);
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            font-size: larger;
            font-family: Georgia, 'Times New Roman', Times, serif;
            display: flex;
            align-items: center;
            height: 100%;
            padding-left: 110px;
            padding-bottom: 1%;
            width: 100%;
        }

        .logo {
            width: 60px;
            position: absolute;
            top: 14%;
            left: 3%;
        }

        

        #sideNav {
            width: 250px;
            height: 100vh;
            position: fixed;
            right: -250px;
            top: 0;
            background: #3ea9d7;
            z-index: 2;
            transition: 0.4s;
        }

        nav ul li {
            list-style: none;
            margin: 50px 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
        }

        #menuBtn {
            width: 50px;
            height: 50px;
            /* background: #94dfff; */
            /* background: #ffae98; */
            background: linear-gradient(white, #27c0ff);
            text-align: center;
            position: fixed;
            right: 30px;
            top: 20px;
            border-radius: 3px;
            z-index: 3;
            cursor: pointer;
        }

        #menuBtn img {
            width: 20px;
            margin-top: 15px;
        }

        /* services */
        #service {
            width: 100%;
            padding: 70px 0;
            background: #efefef;
        }

        .service-box {
            width: 80%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: auto;
        }

        .single-service {
            flex-basis: 48%;
            text-align: center;
            border-radius: 7px;
            margin-bottom: 25px;
            color: white;
            position: relative;
        }

        .single-service img {
            width: 100%;
            border-radius: 7px;
        }

        .overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            border-radius: 7px;
            cursor: pointer;
            background: linear-gradient(rgba(0, 0, 0, 0.5), #009688);
            opacity: 0;
            transition: .5s;
        }

        .single-service:hover .overlay {
            opacity: 1;
        }

        .service-desc {
            width: 80%;
            position: absolute;
            bottom: 0%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: 0.5s;
        }

        hr {
            background-color: white;
            height: 2px;
            border: 0;
            margin: 15px auto;
            width: 60%;
        }

        .service-desc p {
            font-size: 14px;
        }

        .single-service:hover .service-desc {
            opacity: 1;
            bottom: 40%;
        }

        @media screen and (max-width: 770px) {
            .brand {
            display: flex;
            align-items: center;
            height: 100%;
            /* padding: 4%; */
            padding-left: 90px;
            padding-bottom: 1%;
            width: 100%;
        }
            .single-service {
                flex-basis: 99%;
                margin-bottom: 25px;
            }

            .service-desc p {
                font-size: 10px;
            }

            hr {
                height: 1px;
                margin: 5px auto;
            }

            .single-service:hover .service-desc {
                bottom: 25%;
            }
        }
    </style>
</head>
<body>


<?php
    $success="";
    $conn=new mysqli("localhost","root","","votingsystem_db");
    if(isset($_POST['add_detail_candidates']))
    {
        $total_candidates=$_GET['total_candidates'];
        $elections_name=$_POST['elections_name'];

        for($i=1; $i<=$total_candidates; $i++)
        {
            $candidates_name[]=$_POST['candidates_name'.$i];
        }
        for ($i=0; $i<$total_candidates ; $i++) 
        { 
            $insert="insert into candidates_tbl (candidates_name,elections_name) values('$candidates_name[$i]','$elections_name');";
            $run=$conn->query($insert);
        }
            if($run)
            {
                $success="<b><p class='text text-center text-danger'><span class='glyphicon glyphicon-gift' aria-hidden='true' style='color:red'></span> Candidate Added SUccessfully...!</p></b>";

            }
            else
            {
                echo "error";
            }

    }
?>

<div class="bgg">

<script>
        const toggle = () => {
            document.getElementById("nav").classList.toggle("navactive");
        };
    </script>
    <header>
    <a href="../front.php"><img src="images/vote-picture_600x600.png" class="logo"></a>
        <div class="brand">
            <!-- <span class="fab fa-vimeo-square"></span> -->
            <h1 style="color: white;
  text-shadow: 2px 2px 4px #000000;">E-Vote</h1>
        </div>
    </header>

    <div id="sideNav">
        <nav>
            <ul>
                <li> <a href="../front.php"style="text-decoration:none ;"><span class="
                    glyphicon glyphicon-home" aria-hidden="true" style="color:bisque"></span> HOME</a> </li>
                <li> <a href="add_new_elections.php"style="text-decoration:none ;"><span class="
                glyphicon glyphicon-plus" aria-hidden="true" style="color:greenyellow"></span> ADD NEW ELECTION</a> </li>
                <li> <a href="add_candidates.php"style="text-decoration:none ;"> <span class="
                glyphicon glyphicon-user" aria-hidden="true" style="color:fuchsia"></span> ADD CANDIDATES</a> </li>
                <li> <a href="idrequest.php"style="text-decoration:none ;"><span class="
                glyphicon glyphicon-qrcode" aria-hidden="true" style="color:gold"></span> ID REQUEST</a> </li>
                <li> <a href="adminlogout.php" style="color: red;text-decoration:none ;"><span class="
                glyphicon glyphicon-off" aria-hidden="true" style="color:red"></span> LOGOUT</a> </li>
            </ul>
        </nav>
    </div>
    <div id="menuBtn">
        <img src="images/menu.png" id="menu">
    </div>

    <br><br><br><br><br>
<div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 alert alert-info" style="box-shadow: 3px 3px 3px 3px black;">

                <form method="POST">
                    <h4 class="text text-center bg-primary alert" style="color: white ;"><span class='
                    glyphicon glyphicon-tasks' aria-hidden='true' style='color:gold'></span> ADD Details of Candidates</h4>

                    <?php
                        if($success!="")
                        {
                            echo $success;
                        }
                    ?>

                    <?php
                        
                        $elections_name=$_GET['elections_name'];
                        $total_candidates=$_GET['total_candidates'];

                        ?>
                            
                            <div class="form-group">
                            <label>Name of Election:</label>
                            <input type="text" name="elections_name" id="" class="form-control" value="<?php echo$elections_name?>"readonly> 
                    </div>
                        
                        <?php
                        for($i=1;$i<=$total_candidates;$i++)
                        {
                            ?>
                                <div class="form-group">
                                    <label>Name of Candidate 
                                        <?php echo $i ?> :
                                    </label>
                                    <input type="text" name="candidates_name<?php echo $i?>"class="form-control" required>
                                </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" name="add_detail_candidates"><span class='
                        glyphicon glyphicon-saved' aria-hidden='true' style='color:gold'></span> SUBMIT</button>
                    <!-- onclick="alert('Your Request Submitted')" -->
                     </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br> <br><br><br> <br><br>
    <div class="container" style="width: 100%;background: linear-gradient(white, #27c0ff);">
        <div class="row">
            <h4 class="text text-center"> &copy; Copyrights Argho'1807066 </h4>
        </div>

    </div>

</div>


    
<script>
        var menuBtn = document.getElementById("menuBtn")
        var sideNav = document.getElementById("sideNav")
        var menu = document.getElementById("menu")

        sideNav.style.right = "-250px";
        menuBtn.onclick = function() {
            if (sideNav.style.right == "-250px") {
                sideNav.style.right = "0";
                menu.src = "images/exit.png";
            } else {
                sideNav.style.right = "-250px";
                menu.src = "images/menu.png";
            }
        }
        // All animations will take exactly 400ms
        var scroll = new SmoothScroll('a[href*="#"]', {
            speed: 400,
            speedAsDuration: true
        });
    </script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-3.6.9.js"></script>
</body>
</html>


