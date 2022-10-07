<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content=".7"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>LOGIN</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            /* background: linear-gradient( rgba(0,0,0,.5),#ffae98 ), url(images/wb.jpg); */
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
            background: #0089c4;
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
    include("includes/header.php");
    ?>

    <div id="sideNav">
        <nav>
            <ul>
                <li> <a href="index.php">HOME</a> </li>
                <li> <a href="reg.php">REGISTRATION</a> </li>
                <li class="active"> <a href="login.php">LOGIN</a> </li>
                <li> <a href="#footer">ABOUT US</a> </li>
            </ul>
        </nav>
    </div>
    <div id="menuBtn">
        <img src="images/menu.png" id="menu">
    </div>

    <?php
    require("includes/db.php");
    $error = "";
    $success = "";
    if (isset($_POST['login'])) {
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        $select = "select * from users_db where user_email='$user_email' and user_password='$user_password';";
        $run = $conn->query($select);
        if ($run->num_rows > 0) {
            while ($row = $run->fetch_array()) {
                $_SESSION['user_name'] = $user_name = $row['user_name'];
                $_SESSION['user_email'] = $user_email = $row['user_email'];
                echo "<script>window.location.href='welcome.php'</script>";
                //$success="<p class='text text-center text-danger'>Login Successfully!</p>";
            }
        } else {
            $error = "<p class='text text-center text-danger'>Invalid Email or password! TRY AGAIN</p>";
        }
    }
    ?>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 alert alert-info" style="box-shadow: 2px 2px 2px 2px gray;">

                <form method="POST">
                    <h4 class="text text-center bg-primary alert" style="color: white ;"> LOGIN</h4>

                    <?php
                    if ($error != "") {
                        echo $error;
                    }
                    if ($success != "") {
                        echo $success;
                    }
                    ?>

                    <div class="form-group">
                        <label for="Email"> Email-Address:</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="Enter valid email..." required>
                    </div>

                    <div class="form-group">
                        <label for="password">Enter password :</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password..." required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                        <!-- onclick="alert('Your Request Submitted')" -->
                    </div>
                </form>
            </div>

            <div class="col-sm-6">
                <div class="single-service">
                    <img src="images/phishing-g12b09e63a_1280.png">
                    <div class="overlay"></div>
                    <div class="service-desc">
                        <h3>ONLINE VOTING SYSTEM</h3>
                        <hr>
                        <p> Online voting systems are software platforms used to securely conduct votes and elections. As a digital platform, they eliminate the need to cast your votes using paper or having to gather in person.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php
    include("includes/footer.php");
    ?>


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