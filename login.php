<?php session_start(); ?>
<?php include('gestion/connect_db.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>authentification</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="php.php" id="signup-form" class="signup-form">
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Mot de passe"/>
                           <i id="togglePassword"> <span toggle="password" class="zmdi zmdi-eye field-icon toggle-password" ></span></i>
                        </div>
                        <div class="button-panel">
                            <input type="submit" class="form-submit" title="Log In" name="login" value="Connexion"></input>
                        </div>
                    </form>
                    <br>
                    <?php 
                    if (isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                    ?>
                        
                     <p class="loginhere">
                         <a href="#" class="loginhere-link">Mot de passe oublié ?</a>
                        </p>
                        <p class="loginhere">
                            Créer un <a href="authentification.php" class="loginhere-link">Compte</a>
                        </p>
                    </div>
                </div>
            </section>
            
        </div>
        
        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            const togglePassword = document.querySelector("#togglePassword"); 
            const password = document.querySelector("#password"); 
            togglePassword.addEventListener("click", function () { 
                // toggle the type attribute 
                const type = password.getAttribute("type") === "password" ? "text" : "password"; 
                password.setAttribute("type", type); 
                // toggle the icon 
                this.classList.toggle("bi-eye"); });
            </script>
</body>
</html>
