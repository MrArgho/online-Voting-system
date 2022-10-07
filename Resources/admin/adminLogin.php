<?php
session_start();
ob_start();
// if(time()-$_SESSION['time'] >10000000 )
// {
//     unset($_SESSION['admin_id']);
//     unset($_SESSION['admin_password']);
//     // unset($_SESSION['user_id_generated']);
//     session_destroy();
//     header("location:../front.php");
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content=".5"> -->
    <link rel="stylesheet" href="fontawesome.css" />
    <script src="fontawesome.js"></script>
    <link rel="icon" type="image/x-icon" href="images/vote-picture_600x600.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Admin LOGIN</title>
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
        .dirreg {
            padding-left: 870px;
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
            .brand .dirreg {
                padding-left: 160px;
            }
        }
    </style>
</head>

<body>
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
            <h3 class="dirreg" style="color: white;
                text-shadow: 2px 2px 4px #000000; "><span class='glyphicon glyphicon-link' aria-hidden='true' style='color:fuchsia;'></span>Welcome to Admin Panel</h3>
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

    <?php
    $conn = new mysqli("localhost", "root", "", "votingsystem_db");
    $error = "";
    $success = "";
    // $remember="";
    if (isset($_POST['login'])) {
        $admin_id = $_POST['id'];
        $admin_password = $_POST['password'];
        // $remember=$_POST['remember'];

        $select = "select * from adminlogin where admin_id='$admin_id' and admin_password='$admin_password';";
        $run = $conn->query($select);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_array()) {
                $_SESSION['admin_id'] = $admin_id = $row['admin_id'];
                $_SESSION['admin_password'] = $admin_password = $row['admin_password'];
                $_SESSION['time'] = time();
                if(isset($_POST['remember']))
{
    setcookie('id',$admin_id,time()+60*60*24*7);
    setcookie('password',$admin_password,time()+60*60*24*7,);
}

                $error = "<p class='text text-center text-danger'> <b>Successfully Logged In <span class='glyphicon glyphicon-heart' aria-hidden='true' style='color:fuchsia;'></span></b></p>";
                // echo "<script>window.location.href='welcome.php'</script>";
                //$success="<p class='text text-center text-danger'>Login Successfully!</p>";
            }
        } else {
            $error = "<b><p class='text text-center text-danger'><span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span> Invalid Email or password! TRY AGAIN</p></b>";
        }
    }
    ?>

<br><br><br><br>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-6 alert alert-success" style="box-shadow: 3px 3px 3px 3px black;">

                <form method="POST">
                    <h4 class="text text-center bg-primary alert" style="color: white ;"><span class='glyphicon glyphicon-bookmark' aria-hidden='true' style='color:gold'></span> ADMIN LOGIN</h4>

                    <?php
                    if ($error != "") {
                        echo $error;
                    }
                    if ($success != "") {
                        echo $success;
                    }
                    ?>

                    <div class="form-group">
                        <label>Admin ID:</label>
                        <input type="text" name="id" id="" class="form-control" placeholder="...Enter Admin ID..." value="<?php if(isset($_COOKIE['id'])) echo $_COOKIE['id'];?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Enter password :</label>
                        <input type="password" name="password" class="form-control" placeholder="...Enter your password..." value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>" required>
                    </div>
                    <div class="form-group" style="text-align:left;">
                        <label><input type="checkbox" name="remember" value="1"> Remember me </label>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" name="login"><span class="
                    glyphicon glyphicon-send" aria-hidden="true" style="color:gold"></span> ENTER</button>
                        <!-- onclick="alert('Your Request Submitted')" -->
                    </div>
                </form>
            </div>

            <div class="col-sm-6" >
                <div class="single-service">
                    <img src="images/phishing-g12b09e63a_1280 - Copy.png">
                    <div class="overlay"></div>
                    <div class="service-desc">
                        <h3>Welcome to Admin Panel</h3>
                        <hr>
                        <p> By accessing the Admin Panel, You can <i>ADD NEW ELECTION</i>,<i> ADD CANDIDATE</i>,approve <i>ID REQUEST</i> of an user & many more... </p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- footer -->
    <br> <br> <br><br><br><br> <br><br><br>
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
</body> </html>
<?php
    ob_end_flush(); // Flush the output from the buffer
?>