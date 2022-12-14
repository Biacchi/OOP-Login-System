<?php 
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>PHP OOP Login System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <div>
                        <?php 
                            if(isset($_SESSION["userid"])) {
                        ?>
                            <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
                            <li><a href="includes/logout.inc.php">LOGOUT</a></li>
                        <?php 
                            }
                            else 
                            {
                        ?>
                            <li><a href="#">SIGN UP</a></li>
                            <li><a href="#">LOGIN</a></li>
                        <?php 
                            }
                        ?>
                    </div>
                </ul>
                </div>
            </div>
        </nav>
    </header>

    <br>

    <div>
        <h4>SIGN UP!</h4>
        <form class="mb-3" action="includes/signup.inc.php" method="post">
            <input class="form-control" type="text" name="uid" placeholder="Username">
            <input class="form-control" type="password" name="pwd" placeholder="Password">
            <input class="form-control" type="password" name="pwdrepeat" placeholder="Repeat Password">
            <input class="form-control" type="text" name="email" placeholder="E-mail">
            <br>
            <button class="btn btn-primary" type="submit" name="submit">SIGN UP</button>
        </form>
    </div>
        
        <h4>LOGIN</h4>
        <form action="includes/login.inc.php" method="post">
            <input class="form-control" type="text" name="uid" placeholder="Username">
            <input class="form-control" type="password" name="pwd" placeholder="Password">
            <br>
            <button class="btn btn-primary" type="submit" name="submit">LOGIN</button>
        </form>
    </div>


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>