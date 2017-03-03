<?php
include('ValidationFunctions.php');
// instantiate Class ValidateFunctions.php som er inkluderet ovenfor
$validate_function = new ValidateFunctions();

$errors = array(); // samme som $errors = [];
// En pet array med de values som er i drop-down menuen
$allowed_pets = ['dog', 'cat', 'rat', 'bird'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    if (isset($_POST['name'])){
      $name = $_POST['name'];

      // TODO: Check on name er unique
      //Check om navn er mindst 2 bogstaver langt
      if ($validate_function->check_string_length($name, 2)) {
        $errors['name'] = "Navn skal være mindst 2 bogstaver langt";
      }
      if(!$validate_function->contains_only_letters($name)) {
        $errors['name'] = ValidateFunctions::ERROR_NAME_NOT_ALPHA;
      }
    }
    if (isset($_POST['email'])) {
      // Check om email er valid email med PHP's egen
      $email = $_POST['email'];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";      
      }
      // TODO: Check i databasen om email er unik
    }
    if (isset($_POST['pet'])) {
      $pet = $_POST['pet'];
      
      if(!in_array($pet, $allowed_pets)) {
        $errors['pet'] = "Du må være hacker!";
      }
    }
    if (isset($_POST['phone']))
    {
      $phone = $_POST['phone'];
      if(!is_numeric($phone)) {
        $errors['phone'] = "Telefonnummeret må kun bestå af tal";
      }
      // TODO: Skal være præcis 8 tal langt
    }
    if (isset($_POST['description'])) {
      $description = $_POST['description'];
    }
    if (isset($_POST['password'])) {
      $password = $_POST['password'];
    }
    if (isset($_POST['password_again']))
    {
      $password_again = $_POST['password_again'];
    }
    // Check om passwords er ens
    if(isset($password, $password_again)) {
      if($password != $password_again) {
        $errors['password'] = "Password er ikke ens";
      } else if(strlen($password) < 4) {
        $errors['password'] = "Password skal være mindst 4 tegn langt";
      }
    }
    // print key => value of errors
    // eg. $errors['password'] <-- $key
    // "Password er ikke ens" <-- $error (value)
    if(!empty($errors)) {
      foreach($errors as $key => $error) {
        echo "<strong>" . strtoupper($key) . ":</strong> " . $error . "<br />";
      }
    }
}