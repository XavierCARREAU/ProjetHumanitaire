   

<?php
/*---------------------------------------------------------------*/
/*
    Titre : Formulaire complet d'envoi de mail

    URL   : https://phpsources.net/code_s.php?id=57
    Auteur           : Mathieu
    Date édition     : 01 Sept 2004
    Date mise à jour : 13 Sept 2019
    Rapport de la maj:
    - refactoring du code en PHP 7
    - fonctionnement du code vérifié
    - correction du code
    - amélioration du code
    - modification de la description
*/
/*---------------------------------------------------------------*/?>

 <!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <title>Un nouvel espoir - Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.cdnfonts.com/css/qualy" rel="stylesheet">
</head>
<body>

 <!--   HEADER    -->
 <header>
            <div>
                <a href="accueil.html">
                    <img class="logo" src="img/logotype_unnouvelespoir.jpg" alt="">
                </a>
                <h1 class="titre">UN NOUVEL ESPOIR</h1>
            </div>
        </header>
                <!--   PETIT MENU MEDIA 500PX    -->
        <div class="ajout_nav">
            <div>
                <a href="accueil.html" class="acceuil">Page d'acceuil</a>
            </div>
            <div class="button_cont">
                <a class="boutton_ptitnav" href="https://www.leetchi.com/c/aidons-samuel-et-sa-famille">Je Donne</a>
            </div>
        </div>

                <!--    NAVBAR    -->
        <nav class="menu">
            <a href="#" class="boutton-burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar">
            <ul class="liens">
            <li class="pas_voir"><a href="accueil.html">Page d'acceuil</a></li>
            <li><a href="qui_sommes_nous.html">Qui sommes-nous</a></li>
            <li><a href="galerie.html">Galerie</a></li>
            <li><a href="la_famille.html">Famille</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li class="pas"><a href="https://www.leetchi.com/c/aidons-samuel-et-sa-famille">Je donne</a></li>
            <div class="button">
                <a class="boutton_nav" href="https://www.leetchi.com/c/aidons-samuel-et-sa-famille" >Je Donne</a>
            </div>
        </ul>
            </div>
        </nav>

        <!-- Formulaire -->
    <h1 id="titre_page">CONTACTEZ-NOUS</h1>

    <div class="formulaire">
     <form class="contact" name="contact_form" method="post" action="">
    <table width="500">
    <tr>
     <td valign="top">
     </td>
     <td valign="top">
      <input class="nom"  type="text" name="nom"
      maxlength="50" size="82"
      placeholder="Nom" required
      <?php if (
isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
     </td>
     <td valign="top">
      <input  type="text" name="prenom"
      maxlength="50" size="82"
      placeholder="Prénom" required
      <?php if
 (isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
     </td>
     <td valign="top">
      <input  type="text" name="email"
      maxlength="80" size="82"
      placeholder="Email" required
      <?php if
(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
     </td>
     <td valign="top">
      <input  type="text" name="telephone"
      maxlength="30" size="82"
      placeholder="Téléphone" required
<?php if (isset($_POST['telephone'])) echo htmlspecialchars($_POST['telephone'])
;?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
     </td>
     <td valign="top">
      <textarea  name="commentaire" cols="75" rows="10" placeholder="Message" required><?php if (isset($_POST[
'commentaire'])) echo htmlspecialchars($_POST['commentaire']);?></textarea>
     </td>
    </tr>
    <tr>
     <td colspan="2" style="text-align:center">
      <input type="submit" value=" Envoyer ">
     </td>
    </tr>
    </table>
    </form>
  </div>


<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "unnouvelespoir.org@gmail.com";
    $email_subject = "Le sujet de votre email";

    function died($error) {
        // your error code can go here
        echo
"Nous sommes désolés, mais des erreurs ont été détectées dans le" .
" formulaire que vous avez envoyé. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }


    // si la validation des données attendues existe
     if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['commentaire'])) {
        died(
'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
' problème.');
    }



    $nom = $_POST['nom']; // required
    $prenom = $_POST['prenom']; // required
    $email = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $commentaire = $_POST['commentaire']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email)) {
      $error_message .=
'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
    }

      // Prend les caractères alphanumériques + le point et le tiret 6
      $string_exp = "/^[A-Za-z0-9 .'-]+$/";

    if(!preg_match($string_exp,$nom)) {
      $error_message .=
'Le nom que vous avez entré ne semble pas être valide.<br />';
    }

    if(!preg_match($string_exp,$prenom)) {
      $error_message .=
'Le prénom que vous avez entré ne semble pas être valide.<br />';
    }

    if(strlen($commentaire) < 2) {
      $error_message .=
'Le commentaire que vous avez entré ne semble pas être valide.<br />';
    }

    if(strlen($error_message) > 0) {
      died($error_message);
    }

    $email_message = "Détail.\n\n";
    $email_message .= "Nom: ".$nom."\n";
    $email_message .= "Prenom: ".$prenom."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Telephone: ".$telephone."\n";
    $email_message .= "Commentaire: ".$commentaire."\n";

    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- mettez ici votre propre message de succès en html -->

    Merci de nous avoir contacter. Nous vous contacterons très bientôt.

    <?php

    }
  ?>
       <!-- Map -->

    <iframe src="https://maps.google.com/maps?width=750&amp;height=250&amp;hl=en&amp;q=35%20rue%20de%20la%20touche%2C%2028400%20Nogent%20le%20Rotrou%2C%20France+(Titre)&amp;ie=UTF8&amp;t=k&amp;z=16&amp;iwloc=B&amp;output=embed" frameborder="0"
        scrolling="no" marginheight="0" marginwidth="0"></iframe>

    <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
        <small style="line-height: 1.8;font-size: 2px;background: #fff;">
            <a href="https://embedgooglemaps.com/de/%22%3Ehttps://embedgooglemaps.com/de/</a>
        &
        <a href=" http://botonmegusta.org/%22%3Ebotonmegusta.org/></a>
        </small>
    </div>

    <footer>

      <a href="https://www.leetchi.com/c/aidons-samuel-et-sa-famille">
        <button type="button" name="bandau_footer" id="bandau_footer">Soutenez Samuel en cliquant ICI !</button>
      </a>

      <!-- reseaux sosiaux -->
    <div class="reseaux">
      <a href="https://www.facebook.com/Un-Nouvel-Espoir-pour-samuel-102958771814780" class="fa fa-facebook"></a>
      <a href="https://www.instagram.com/unnouvelespoir/" class="fa fa-instagram"></a>
      <a href="https://www.youtube.com/embed/KKHw4EIDTmk" class="fa fa-youtube"></a>
    </div>

      <!-- footer -->

      <div class="contenu-footer">

        <div class="bloc footer-services">
            <h3 class="footer_title">Notre contact</h3>
              <p>Marie Laure ROUSSEAU</p>
              <p>35 rue de la touche, 28400,<br> Nogent le Retrou</p>
              <p>Email : <br> unnouvelespoir.org@gmail.com</p>

        </div>


        <div class="bloc footer-services">
          <h3 class="footer_title">Contact association Vivre dans l'esperance</h3>
            <p>BP 59 Dapaong, Togo</p>
            <p>Email : <br> vivre.esperance@gmail.com</p>

        </div>

        <div class="bloc footer-services">
          <h3 class="footer_title">Plan du site</h3>
            <ul>
              <a class="lien" href="accueil.html"><li class="gauche">Accueil</li></a><br>
              <a class="lien" href="qui_sommes_nous.html"><li class="gauche">Qui sommes nous?</li></a><br>
              <a class="lien" href="la_famille.html"><li class="gauche">La Famille</li></a><br>
              <a class="lien" href="galerie.html"><li class="gauche">Galerie</li></a><br>
              <a class="lien" href="contact.php"><li class="gauche">Contact</li></a><br>
            </ul>
        </div>

        <div class="bloc footer-services">
          <h3 class="footer_title">Mentions légales</h3>

          <a class="lien" href="https://vivredanslesperance.blog.lepelerin.com/">
           <p>Blog</p>
         </a>
          <a class="lien" href="legal.html">
            <p>Mentions légales</p>
         </a>
          <a class="lien" href="https://www.leetchi.com/c/aidons-samuel-et-sa-famille">
           <p>Cagnotte Leetchi</p>
          </a>

         </div>

    </div>



    </footer>

</body>

</html>

<script type="text/javascript" src="js/header.js"></script>
