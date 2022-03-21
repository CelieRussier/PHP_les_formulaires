<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

// define variables and set to empty values
$firstname = $lastname = $email = $tel = $language = $message = "";

$firstnameErr = $lastnameErr = $emailErr = $telErr = "";
$messageErr = $languageErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["user_firstname"])) {
    $firstnameErr = "First Name is required";
  } else {
    $firstname = test_input($_POST["user_firstname"]);
  }

  if (empty($_POST["user_lastname"])) {
    $lastnameErr = "Last Name is required";
  } else {
    $lastname = test_input($_POST["user_lastname"]);
  }

  if (empty($_POST["user_email"])) {
    $emailErr = "Email is required";
  } else if (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL) === false) {
    $email = test_input($_POST["user_email"]);
  } else {
    $emailErr = "Email is not a valid email address";
  }
  

  if (empty($_POST["user_phone_number"])) {
    $telErr = "Phone number is required";
  } else {
    $tel = test_input($_POST["user_phone_number"]);
  }

  if (empty($_POST["user_language"])) {
    $languageErr = "Language is required";
  } else {
    $language = test_input($_POST["user_language"]);
  }

  if (empty($_POST["user_message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["user_message"]);
  }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = test_input($_POST["user_firstname"]);
    $lastname = test_input($_POST["user_lastname"]);
    $email = test_input($_POST["user_email"]);
    $tel = test_input($_POST["user_phone_number"]);
    $language = test_input($_POST["user_language"]);
    $message = test_input($_POST["user_message"]);
  }

?>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div>
      <label  for="firstname">Prénom :</label>
      <input  type="text"  id="prenom"  name="user_firstname" value="<?php echo $firstname;?>" >
      <span class="error">* <?php echo $firstnameErr;?></span>
      <br><br>
    </div>
    <div>
      <label  for="lastname">Nom :</label>
      <input  type="text"  id="nom"  name="user_lastname" value="<?php echo $lastname;?>" >
      <span class="error">* <?php echo $lastnameErr;?></span>
      <br><br>
    </div>
    <div>
      <label  for="email">Courriel :</label>
        <input  type="email"  id="courriel"  name="user_email" value="<?php echo $email;?>" >
        <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
            </p>
    
    </div>
    <div>
        <label for="tel">Téléphone</label>
        <input type="number" name="user_phone_number" value="<?php echo $tel;?>" >
        <span class="error">* <?php echo $telErr;?></span>
      <br><br>
    </div>
    <div>
        <label for="language">Langage concerné</label>
        <input list="language" name="user_language" value="<?php echo $language;?>" >    
        <span class="error">* <?php echo $languageErr;?></span>
      <br><br>
        <datalist id="language">
        <option value="HTML" name="HTML">
        <option value="CSS" name="CSS">
        <option value="Javascipt" name="Javascript">
        <option value="PHP" name="PHP">
        <option value="MySQL" name="MySQL">
  </datalist>
    </div>
    <div>
      <label  for="message">Message :</label>
      <textarea  id="message"  name="user_message" ></textarea>
      <span class="error">* <?php echo $messageErr;?></span>
      <br><br>
    </div>
    <div  class="button">
      <button  type="submit">Envoyer votre message></button>
    </div>
  </form>

  <?php


'<BR>, <BR>, <BR>';

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false AND !empty($_POST["user_firstname"]) AND !empty($_POST["user_lastname"]) AND !empty($_POST["user_email"]) AND !empty($_POST["user_phone_number"]) AND !empty($_POST["user_language"]) AND !empty($_POST["user_message"])) {
    echo 'Merci ' . $_POST['user_firstname'] . " " . $_POST['user_lastname'] . ' de nous avoir contacté à propos de ' . $_POST['user_language'] . '. Un de nos conseiller vous contactera soit à l’adresse ' . $_POST['user_email'] . ' ou par téléphone au ' . $_POST['user_phone_number'] . ' dans les plus brefs délais pour traiter votre demande : <br>' . $_POST['user_message'];
};

  ?>

</body>
</html>