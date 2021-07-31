<html>
    <head>
         <link href="style/Orange/bootstrap.min.css" rel="stylesheet">
        <link href="style/Orange/bootstrap.css" rel="stylesheet">
        <link href="style/Orange/_bootswatch.scss" rel="stylesheet">
        <link href="style/Orange/_variables.scss" rel="stylesheet">
        <link href="style/index.css" rel="stylesheet">

        <script src="https://kit.fontawesome.com/b74d867b34.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md bg-light justify-content-md-center justify-content-start">
            <a class="nav-link navbar-brand mx-0 d-none d-md-inline" >Index</a>
            <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
                    <ul class="navbar-nav mx-auto text-md-center text-left">
                        <li class="nav-item">
                            <a class="nav-link" href="#">--</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">--</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link navbar-brand mx-0 d-none d-md-inline" href="home.php"><strong><big>QuizEd</big></strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">--</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">--</a> 
                        </li>
                    </ul>
            </div> 
        </nav>
        <div id="xcontainer">
            <div class="box ">
                <br>
                <h2>Log In</h2>
                <form id = "login" method="post" action="authenticate.php" class="form">
                    <div class = userkey>
                    <i class="fas fa-user fa-lg"></i>&nbsp;
                    <input type="text" placeholder="User-Key" id="username" name="username" class="form-control form-control-lg">
                    </div>
                     <br>
                    <div class = userkey>
                    <i class="fas fa-unlock fa-lg"></i>&nbsp;
                    <input type="password" placeholder="Password" id="password" name="password" class="form-control form-control-lg">
                    </div>
                    <br>
                    <input type="submit" value="Login" class="btn btn-primary btn-lg">         
                </form>
                <br>
            </div>
        </div>
        
        
    </body>
</html>