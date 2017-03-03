<?php
class ValidateFunctions
{
  const ERROR_NAME_NOT_ALPHA         = "Navn må kun bestå af bogstaver"; // Virker kun inden i en Class
  const ERROR_PHONE_CONTAINS_NUMBERS = "Telefonnummeret må kun bestå af tal";
  const ERROR_PHONE_LENGTH           = "Telefonnummeret skal være 8 tal langt";

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

  /*
   * Dette er en short-hand if/else statement som checker om den givne strengs $string længde
   * er mindre eller lig med den givne længde $length
   */
  public function check_string_length($string, $length)
  {
    if (is_string($string) && is_int($length)) {
      return $result = (strlen($string) <= $length) ? true : false;
    }
  }

  public function check_number_length($number, $length) {
    if(strlen((string)$number) == (int)$length) {
      return true;
    } else {
      return false;
    }
  }

}