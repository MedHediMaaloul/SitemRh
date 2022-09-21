<?php
include ('gestion/header.php');
?>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">S'inscrire</h2>
                        <div>
                         <form>
                            <input type="radio" id="employe" onclick="display()"
                            name="user" value="1" >
                            <label for="userChoice1">Employé</label>
                            
                            <input type="radio" id="responsable" onclick="display()"
                            name="user" value="2">
                            <label for="userChoice2">Responsable</label>
                            
                            <input type="radio" id="comptable" onclick="display()"
                            name="user" value="3">
                            <label for="userChoice3">Comptable</label>
                         </form>
                        </div>
                        
                        <div id="sh2" style="display:none;">
                            
                            <select name="poste" id="poste" class="form-input">
                                <option value="Choisissez" selected disabled>Choisissez Poste</option>
                                <option value="Designeur">Designeur</option>
                                <option value="Developpeur">Développeur</option>
                                <option value="CM">CM</option>
                            </select>                            
                        </div>  
                                                                
                        <div id="sh1" style="display:none;">
                            <div class="form-group">
                                <input type="number" class="form-input" name="numCIN" id="numCIN" placeholder="numCIN"/>
                            </div>  
                        </div>    
                                     
                        <div class="form-group">
                            <input type="text" class="form-input" name="nom" id="nom" placeholder="Nom"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="prenom" id="prenom" placeholder="Prénom"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="numTel" id="numTel" placeholder="Téléphone"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Mot de passe"/>
                            <i id="togglePassword"><span toggle="password" class="zmdi zmdi-eye field-icon toggle-password"></span></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="confirmPassword" placeholder="Confirmer votre mot de passe"/>
                        </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>J'ai lu et j'accepte les <a href="#" class="breadcrumb-item">termes de Confidentialité*</a></label>
                    </div>
                    <div class="form-group">
                        <button class="form-submit" id="btn_ajout_user">S'inscrire</button>
                    </div>
                </form>
                <p id="message"></p>
                <p class="loginhere">
                    Vous avez déjà un <a href="login.php" class="loginhere-link">Compte ?</a>
                </p>
            </div>
        </div>
    </section>
</div>
    

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

<script>
		function display() {
			var checkRadio = document.querySelector(
				'input[name="user"]:checked');
			
			if(checkRadio != null) {
                if (checkRadio.value =="1"){
                    document.getElementById('sh1').style.display = 'block';
                    document.getElementById('sh2').style.display = 'block';


                }else if ( checkRadio.value =="2"){
                    document.getElementById('sh1').style.display = 'block';
                    document.getElementById('sh2').style.display = 'none';


                }else{
                    document.getElementById('sh1').style.display = 'none';
                    document.getElementById('sh2').style.display = 'none';


                }
                
                
			}
			
		}
    </script>
        

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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>