<?php
session_start();
if (!$_SESSION['user_email']) {
    header("location:welcome.php");
    // echo "<script> location.href='welcome.php'; </script>";
}
if(isset($_SESSION['user_email']))
    {
        if(time()-$_SESSION['tm']>3600)
        {
            unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);
         unset($_SESSION['user_id_generated']);
        session_destroy();
        echo "<script> location.href='welcome.php'; </script>";
        // header("location:adminLogin.php");
        }
        else
        {
            $_SESSION['tm']=time();
        }
    }
    else
    {
        // header("location:adminLogin.php");
        echo "<script> location.href='welcome.php'; </script>";
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
    <title>VOTE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            /* background-color: #0089c4; */
            /* background: linear-gradient( rgba(0,0,0,.5),#ffae98 ), url(images/wb.jpg); */
        }

        .bgg {
            /* background-image: url(images/white-wooden-background.jpg); */
            /* background: linear-gradient( skyblue,blue ); */
            /* background: linear-gradient(skyblue, white, skyblue), url(images/white-wooden-background.jpg); */
            background-image: url(images/wallpaper.png);
        }

        .dirreg {
            padding-left: 920px;
        }

        /* new */
        header {
            position: relative;
            width: 100%;
            height: 90px;
            /* background: #27c0ff; */
            background: linear-gradient(skyblue, white);
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
            background: linear-gradient(white, skyblue);
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

        /* imp */
        .single-service:hover .service-desc {
            opacity: 1;
            bottom: 15%;
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

            .brand .dirreg {
                padding-left: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="bgg">
        <?php
        require("includes/db.php");
        $sms = "";
        $special_sms = "";
        $elections_start_date = "";
        $elections_end_date = "";
        $error = "";
        // include("includes/loginheader.php");
        if (!$_SESSION['user_id_generated']) {
            header("location:elections.php");
        }
        ?>


        <?php
        date_default_timezone_set("Asia/Dhaka");
        if (isset($_POST['search_candidate'])) {
            $elections_name = $_POST['elections_name'];
            $select = "select * from elections_tbl where elections_name='$elections_name';";
            $run = $conn->query($select);
            if ($run->num_rows > 0) {
                while ($row = $run->fetch_array()) {
                    $elections_start_date = $row['elections_start_date'];
                    $elections_end_date = $row['elections_end_date'];
                }
            }
            $current_ts = time();
            $elections_start_date_ts = strtotime($elections_start_date);
            $elections_end_date_ts = strtotime($elections_end_date);
            if ($elections_start_date == "") {
                // echo "plz Select an Election";
                $sms = "<p class='text text-center text-danger'>Please Select an Election</p>";
            } else if ($elections_start_date_ts > $current_ts) {
                // echo "Election has not Started! Plz WAIT...";
                $sms = "<p class='text text-center text-danger'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Election has not Started! Please WAIT...</p>";
            } else if ($current_ts > $elections_end_date_ts) {
                // echo "Election has been CLOSED!";
                $sms = "<p class='text text-center text-danger'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Election has been CLOSED!</p>";
            } else {
                $special_sms = "temp";
            }
        }
        ?>


        <script>
            const toggle = () => {
                document.getElementById("nav").classList.toggle("navactive");
            };
        </script>
        <header>
            <a href="front.php"><img src="images/vote-picture_600x600.png" class="logo"></a>

            <div class="brand">
                <!-- <span class="fab fa-vimeo-square"></span> -->
                <h1 style="color: white;
            text-shadow: 2px 2px 4px #000000;">E-Vote</h1>
            </div>
        </header>

        <div id="sideNav">
            <nav>
                <ul>
                    <li> <a href="welcome.php" style="text-decoration:none ;"><span class="
                    glyphicon glyphicon-home" aria-hidden="true" style="color:bisque"></span>  HOME</a> </li>
                    <li> <a href="reg.php" style="text-decoration:none ;"><span class="
                    glyphicon glyphicon-send" aria-hidden="true"style="color:greenyellow"></span> Registration</a> </li>
                    <li> <a href="elections.php" style="text-decoration:none ;"><span class="
                    glyphicon glyphicon-hdd" aria-hidden="true" style="color:fuchsia"></span> ELECTIONs</a> </li>
                    <li> <a href="idgenerate.php" style="text-decoration:none ;"><span class="
                    glyphicon glyphicon-bookmark" aria-hidden="true" style="color:darkorange"></span> ID Generate</a> </li>
                    <li> <a href="results.php" style="text-decoration:none ;"><span class="
                    glyphicon glyphicon-stats" aria-hidden="true" style="color:gold"></span> Results</a> </li>
                    <li> <a href="logout.php" style="text-decoration:none ;"> <span class="
                    glyphicon glyphicon-off" aria-hidden="true" style="color:red"></span>  LOGOUT</a> </li> <br><br><br><br><br><br><br><br>
                    <li>
                        <a href="" style="color: white; text-align:right;text-shadow: 2px 2px 4px #000000; text-decoration:none">
                            <strong>Welcome</strong>
                            <i>
                                <?php echo $_SESSION['user_name'];?> <span class="
                                glyphicon glyphicon-heart-empty" aria-hidden="true" style="color:gold;text-shadow:none"></span>
                            </i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="menuBtn">
            <img src="images/menu.png" id="menu">
        </div>
        <br><br><br><br>
        <div class="container">
            <div class="col-sm-8 col-sm-offset-2 alert alert-info" style="box-shadow: 2px 2px 2px 2px gray;">
                <h4 class="text text-center bg-primary alert" style="color: white ;"><span class="glyphicon glyphicon-search" aria-hidden="true"style='color:gold'></></span> Which Election are you Searching For?</h4> <b>
                    <?php
                    if ($sms != "") {
                        echo $sms;
                    }
                    if ($special_sms != "") {
                        ?>

                            <p class='text text-center text-danger'>Your selected Election is ONGOING! <span class="glyphicon glyphicon-time" aria-hidden="true" style="color: red;"></span> <br> To cast your Vote </p>
                            <a href="votecaste.php?elections_name=<?php echo $elections_name; ?>"><p class='text text-center' style="color:red"> CLICK HERE! <span class="glyphicon glyphicon-hand-left" aria-hidden="true" style="color: green;"></span></p></a>

                        <?php
                            
                        
                    }
                    ?></b>
                <form method="POST">
                    <label for="elections_name">Election Name :</label>
                    <select class="form-control" name="elections_name">
                        <option value="" selected="selected">Select Election</option>
                        <?php
                        // require("includes/db.php");
                        $select = "select * from elections_tbl;";
                        $run = $conn->query($select);
                        if ($run->num_rows > 0) {
                            while ($row = $run->fetch_array()) {
                                echo $row['1'];


                        ?>
                                <option value="<?php echo $row['elections_name']; ?>"><?php echo $row['elections_name']; ?></option>

                        <?php }
                        } ?>
                    </select> <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" name="search_candidate"> <span class="glyphicon glyphicon-search" aria-hidden="true" style="color: gold"></span> Search Candidate</button>
                        <!-- onclick="alert('Your Request Submitted')" -->
                    </div>
                </form>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
        include("includes/footer.php");
        ?>


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