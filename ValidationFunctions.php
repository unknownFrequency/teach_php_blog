<?php
class ValidateFunctions
{
  const ERROR_NAME_LENGTH            = "Navn skal være mindst 2 bogstaver langt";
  const ERROR_NAME_NOT_ALPHA         = "Navn må kun bestå af bogstaver";
  const ERROR_PHONE_CONTAINS_NUMBERS = "Telefonnummeret må kun bestå af tal";
  const ERROR_PHONE_LENGTH           = "Telefonnummeret skal være 8 tal langt";
  const ERROR_PASSWORDS_DONT_MATCH   = "Password er ikke ens";
  const ERROR_PASSWORD_LENGTH        = "Password skal være mindst 4 tegn langt";

  /**
   * @param $name
   * @return bool
   */
  public function contains_only_letters($name)
  {
    if (is_string($name)) {
      // Hvis ikke String kun består af bogstaver og mellemrum return false
      if (!preg_match('/^[A-Za-z\s]+$/', $name)) {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  }

  /**
   * @param $string
   * @param $length
   * @return bool
   *
   * Dette er en short-hand if/else statement som checker om den givne strengs $string længde
   * er mindre eller lig med den givne længde $length
   */
  public function check_string_length($string, $length)
  {
    if (is_string($string) && is_int($length)) {
      return $result = (strlen($string) <= $length) ? true : false;
    }
  }

  /**
   * @param $number
   * @param $length
   * @return bool
   */
  public function check_number_length($number, $length) {
    if(strlen((string)$number) == (int)$length) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * @param array $errors
   */
  public function error_handling(array $errors) {
    if(!empty($errors)) {
      foreach($errors as $key => $error) {
        $_SESSION[$key] = "<strong>" . strtoupper($key) . ":</strong> " . $error . "<br />";
      }
    }
  }

}