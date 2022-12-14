<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- <meta http-equiv="refresh" content=".7"> -->
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Registration</title>
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
            background: linear-gradient(skyblue, white, skyblue), url(images/white-wooden-background.jpg);
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

    <?php
    // include("includes/header.php");
    ?>

    <?php
    require("includes/db.php");
    $emailError = "";
    $accountSuccess = "";
    if (isset($_POST['register'])) {


        $user_name = $_POST['fullname'];
        $user_email = $_POST['email'];
        $user_gender = $_POST['gender'];
        $user_province = $_POST['province'];
        $user_password = $_POST['password'];

        $select = "select * from users_db where user_email='$user_email';";
        $exe = $conn->query($select);
        if ($exe->num_rows > 0) {
            $emailError = "<b><p class='text text-center text-danger'><span class='glyphicon glyphicon-warning-sign' aria-hidden='true'style='color:fuchsia'></span> Email Already Registered</p></b>";
        } else {
            $insert = "insert into users_db(user_name,user_email,user_gender,user_province,user_password) values('$user_name','$user_email','$user_gender','$user_province','$user_password');";
            $run = $conn->query($insert);
            if ($run) {
                $accountSuccess = "<b><p class='text text-center text-danger'><span class='glyphicon glyphicon-ok' aria-hidden='true' style='color:fuchsia'></span> Account Created Successfully</p></b>";
            } else {
                echo "error";
            }
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
            <a href="front.php"><img src="images/vote-picture_600x600.png" class="logo"></a>

            <div class="brand">
                <!-- <span class="fab fa-vimeo-square"></span> -->
                <h1 style="color: white;text-shadow: 2px 2px 4px #000000;">E-Vote</h1>
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
                    <!-- <li>
                        <a href="" style="color: #00008b; text-align:right">
                            <strong>Welcome</strong>
                            <?php
                            // echo $_SESSION['user_name'];
                            ?>
                        </a>
                    </li> -->
                </ul>
            </nav>
        </div>
        <div id="menuBtn">
            <img src="images/menu.png" id="menu">
        </div>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-8  alert alert-info" style="box-shadow: 2px 2px 2px 2px black;">

                    <form method="POST">
                        <h4 class="text text-center bg-primary alert" style="color: white ;"><span class="
                    glyphicon glyphicon-send" aria-hidden="true"style="color:gold"></span> Registration</h4>

                        <?php
                        if ($emailError != "") {
                            echo $emailError;
                        }
                        if ($accountSuccess != "") {
                            echo $accountSuccess;
                        }
                        ?>
                        <div class="form-group">
                            <label for="Username"> Full Name :</label>
                            <input type="text" name="fullname" id="" class="form-control" placeholder="Enter full name.." required>
                        </div>

                        <div class="form-group">
                            <label for="Email"> Email-Address:</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="Enter valid email..." required>
                        </div>

                        <div class="form-group">
                            <label for="Gender"> Gender :</label>
                            <select name="gender" class="form-control">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="province"> Division :</label>
                            <select name="province" class="form-control">
                                <option value="">Select</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Chattogram">Chattogram</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Barishal">Barishal</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Enter password :</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password..." required>
                        </div>





                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="register" onclick=""> <span class="glyphicon glyphicon-ok-sign" aria-hidden="true" style="color: gold;"></span> SUBMIT</button>
                        </div>
                    </form>
                </div>

                <div class="col-sm-4">
                    <div class="single-service">
                        <img src="images/depositphotos_45610937-stock-photo-voter-registration-at-the-university.jpg">
                        <div class="overlay"></div>
                        <div class="service-desc">
                            <h4>Terms of Registration</h4>
                            <hr>
                            <ul>
                                <li>Be a <b>citizen </b>of the Bangladesh;</li>
                                <li>Be at least <b>18 years</b> of age at the time of the next election;</li>
                                <li>Not currently be serving a state or federal prison term for the conviction of a felony;</li>
                                <li>Not currently be judged mentally incompetent by a court of law;</li>
                                <li>Not be serving a sentence of detention, confinement, or parole for a felony conviction.</li>
                                <li>Not be adjudicated by a court as ???non compos mentis??? (not of sound mind);</li>
                                <li>Not currently be incarcerated for a criminal conviction.</li>
                                <li>Athourity has the right to cancel your Registration anytime;</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div> <br>

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