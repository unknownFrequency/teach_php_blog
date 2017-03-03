<?php
class ValidateFunctions
{
  const ERROR_NAME_NOT_ALPHA = "Navn må kun bestå af bogstaver"; // Virker kun inden i en Class

  public function contains_only_letters($name) {
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
}