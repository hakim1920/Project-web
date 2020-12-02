<?php
  include_once '../Models/Utilisateur.php';
  include_once '../Controller/UtilisateurC.php';
 $error = "";
 $utilisateur = null;
 $utilisateurC = new UtilisateurC();

 if (isset($_POST["CIN"]) &&isset($_POST["nom"])&& isset($_POST["prenom"]) &&isset($_POST["telephone"]) && isset($_POST["dateNais"]) && isset($_POST["email"]) && isset($_POST["adresse"]) && isset($_POST["login"]) && isset($_POST["pass"])) 
 {
    if($utilisateurC->unique_log($_POST["login"])==false)
    {
     $utilisateur = new Utilisateur(
        $_POST["CIN"],
         $_POST['nom'],
         $_POST['prenom'],
         $_POST["telephone"],
         $_POST['dateNais'], 
         $_POST['email'],
         $_POST['adresse'],
         $_POST['login'],
         $_POST['pass']
         
     );
$utilisateurC->ajouterUtilisateur($utilisateur);
    }else {echo('<script> alert("Compte existant"); </script>');}
 }



?>
<!DOCTYPE html>
<html lang="fr"><!-- Basic -->


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
	<meta name="author" content="GeeksLabs">
	<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
	<link rel="shortcut icon" href="img/favicon.png">
	<title>SIGN UP page</title>
	<!-- Bootstrap CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- bootstrap theme -->
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<!--external css-->
	<!-- font icon -->
	<link href="../css/elegant-icons-style.css" rel="stylesheet" />
	<link href="../css/font-awesome.css" rel="stylesheet" />
	<!-- Custom styles -->
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/style-responsive.css" rel="stylesheet" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond.min.js"></script>
	  <![endif]-->

	<!-- =======================================================
		Theme Name: NiceAdmin
		Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
		Author: BootstrapMade
		Author URL: https://bootstrapmade.com
	  ======================================================= -->
</head>

<body class="login-img3-body">
	<!-- Start header -->
    
    <div class="container">

<form action="Signup.php" method="POST">
<div class="login-form">
    <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        Cin:
        <div class="input-group">
            <span class="input-group-addon"><i></i></span>
            <input type="number" class="form-control" id="CIN" name="CIN" placeholder="CIN" minlength="8"
                maxlength="8" onfocusout="cinfc()" Required autofocus>
            <label id="elementcin" name="erreur" style="color: red;display: none;">Le CIN est erroné</label>
        </div>
        Nom :
        <div class="input-group">
            <span class="input-group-addon"><i></i></span>
            <input type="text" class="form-control" id="nom" name="nom" onfocusout="majus_nom()" Required>
            <label id="element" name="erreur" style="color: red;display: none;">Le nom doit commencer par une
                majuscule </label>
        </div>
        Prenom :
        <div class="input-group">
            <span class="input-group-addon"><i></i></span>
            <input type="text" class="form-control" id="prenom" name="prenom" onfocusout="majus_prenom()"
                Required> <label id="element1" name="erreur" style="color: red;display: none;">Le prenom doit
                commencer par une majuscule </label>
        </div>
        DateNais :
        <div class="input-group">
            <span class="input-group-addon"><i></i></span>
            <input type="date" class="form-control" id="dateNais" name="dateNais" onfocusout="age()" Required>
            <label id="elementdate" name="erreur" style="color: red;display: none;">date invalide </label>
        </div>
        Email :
        <div class="input-group">
            <span class="input-group-addon"><ins></i></span>
            <input type="email" class="form-control" name="email" id="email" pattern=".+@gmail.com"
                placeholder="Enter mail" onfocusout="ad_email()" Required>
            <label id="elementemail" name="erreur" style="color: red;display: none;">L'adresse email est
                invalide . </label>
        </div>
        
        Sexe :
        <div class="input-group">
        <label class="checkbox">
            <input type="radio" class="form-control" name="genre" value="f" checked>
            Femme
            <input type="radio"class="form-control" name="genre" value="h">
            Homme
        </label>
        </div>
        Telephone :
        <div class="input-group">
            <span class="input-group-addon"><i></i></span>
            <input type="number" class="form-control" id="telephone" name="telephone" placeholder="24123856"
                minlength="8" maxlength="8" onfocusout="telephonefc()" Required>
            <label id="element2" name="erreur" style="color: red;display: none;">Le numéro de
                téléphone est erroné' </label>
        </div>
        Profession :
        <div class="input-group">
            <select id="profession" onfocusout="prof()" Required>
                <option value="select">select</option>
                <option value="client">Client</option>
                <option value="administrateur">Administrateur</option>
            </select>
        </div>
        <label id="elementpr" name="erreur" style="color: red;display: none;">Veuillez choisir un type </label>
    </div>
    Adresse:

    <div class="input-group">
        <span class="input-group-addon"></span>
        <textarea name="adresse" class="form-control" id="adresse" cols="30" rows="10" Required></textarea>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="icon_profile"></i></span>
        <input type="text" class="form-control" id="login" name="login" placeholder="Username" onfocusout="vide_unique_log()"Required>
        <label id="elementlog" name="erreur" style="color: red;display: none;">Le login est obligatoire et doit etre unique</label>

    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
        <input type="password" class="form-control" name="pass" id="pass1" placeholder="Password">
    </div>
    confirmer mot de passe:
    <div class="input-group">
        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
    <input type="password" class="form-control" id="pass2" placeholder="*****" onfocusout="passf()" Required> <label id="elementpass" name="erreur"
            style="color: red;display: none;">Veuillez verifier votre mot de passe </label>
    </div>


            <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="S'inscrire" onClick="validation()">
            </div>
    </div>


</form>
</div>
<!-- <div id="error">
            
            <a href="../Views/afficher.php"> afficher ma base de donnees</a><br>
           
    <?php// echo $error; ?>
            </div>
            <form action="supprimerutilisateur.php" method="POST">
            <table border="1" align="center">
            <tr>
                <td><label for="Supprimer">Supprimer selon id:
                            </label></td>
                            <td><input type="text" name="id" id="id" ></td>
                            <td>
                            <input type="submit" value="Supprimer" > 
                        </td>
        </tr>
            </table>
                </form>
                <form action="modifierutilisateur.php" method="GET">
            <table border="1" align="center">
            <tr>
                <td><label for="Modifier">Modifier selon id:
                            </label></td>
                            <td><input type="text" name="id" id="id" ></td>
                            <td>
                            <input type="submit" value="Modifier" > 
                        </td>
        </tr>
            </table>
                </form>-->
            
    <script>
        function majus_nom() {
            var ch = document.getElementById("nom").value;
            var element = document.getElementById("element");
            if ((ch === "") || (ch.charCodeAt(0) < 65) || (ch.charCodeAt(0) > 91)) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function majus_prenom() {
            var ch = document.getElementById("prenom").value;
            var element = document.getElementById("element1");
            if ((ch === "") || (ch.charCodeAt(0) < 65) || (ch.charCodeAt(0) > 91)) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function ad_email() {
            var expressionReguliere = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
            var element = document.getElementById("elementemail");
            if (expressionReguliere.test(document.getElementById("email").value)) { element.style.display = "none"; } else { element.style.display = "block"; }
        }
        function age() {
            var today = new Date();
            var element = document.getElementById("elementdate");
            var dateNais = document.querySelector("#dateNais").value;
            dateNais = new Date(dateNais);
            if ((today.getFullYear() - dateNais.getFullYear()) < 0) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function telephonefc() {
            var element = document.getElementById("element2");
            if ( Number(document.getElementById("telephone").value) < 10000000) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function cinfc() {
            var element = document.getElementById("elementcin");
            if ( Number(document.getElementById("CIN").value) < 10000000) { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        function prof() {
            var pr = document.getElementById("profession").value;
            var element = document.getElementById("elementpr");
            if (pr === "select") { element.style.display = "block"; } else { element.style.display = "none"; }
        }
        
        function passf() {
            var ch1 = document.getElementById("pass1").value;
            var ch2 = document.getElementById("pass2").value;
            var element = document.getElementById("elementpass");
            if ((ch1 != "") && (ch2 != "") && (ch1 == ch2)) { element.style.display = "none"; } else { element.style.display = "block"; }
        }
        function vide_unique_log() {
            var ch = document.getElementById("login").value;
            var element = document.getElementById("elementlog");
            if (ch === "") { element.style.display = "block"; } else { element.style.display = "none"; }
            
        } 
        function validation() {
            majus_nom();majus_prenom();ad_email();age();telephonefc();cinfc();prof();passf();vide_unique_log();
            var error1 = document.getElementById("element");
            var error2 = document.getElementById("element1");
            var error3 = document.getElementById("element2");
            var error4 = document.getElementById("elementdate");
            var error5 = document.getElementById("elementpr");
            var error6 = document.getElementById("elementemail");
            var error7 = document.getElementById("elementpass");
            var error8 = document.getElementById("elementlog");
            var error0 = document.getElementById("elementcin");
            var ch = document.getElementById("nom").value;
            var ch1 = document.getElementById("prenom").value;

            if ((error0.style.display == "none") &&(error1.style.display == "none") && (error2.style.display == "none") && (error4.style.display == "none") && (error3.style.display == "none") && (error5.style.display == "none")  && (error6.style.display == "none")&& (error7.style.display == "none")&& (error8.style.display == "none"))
                alert("Bienvenue" + ch + ch1);else alert("Votre formulaire est mal rempli");
        }
    </script>
    </form>
</body>


</html>