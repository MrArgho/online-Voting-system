
<div class="container">
  <nav class="navbar navbar-default" style="background-color:#00ffff;" >
    <div class="container-fluid"  >
      <div class="navbar-header">
        <a href="#" class="navbar-brand">ONLINE VOTING System</a>
      </div>
      <ul class="nav navbar-nav" >
        <li><a href="welcome.php">Home</a></li>
        <li><a href="elections.php">Election</a></li>
        <li><a href="idgenerate.php">ID Generate</a></li>
        <li><a href="results.php">Results</a></li>
        <li><a href="vote.php">Vote</a></li>
        <li><a href="logout.php" style="color: red;">Logout</a></li>
        <li>
            <a href="" style="color: #00008b; text-align:right"> 
            <strong>Welcome</strong> 
                <?php
                    echo $_SESSION['user_name'];
                ?>
            </a>
        </li>
      </ul>
    </div>

  </nav>
</div>


    <!-- <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 img-thumbnail" style="background-color: cyan;">
                <img src="images/VOTE-2.jpg" class="img img-responsive">
            </div>
        </div>
    </div> <br> -->