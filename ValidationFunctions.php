<?php
class ValidateFunctions
{
  const ERROR_NAME_NOT_ALPHA = "Navn må kun bestå af bogstaver"; // Virker kun inden i en Class

  public function contains_only_letters($name) {
    if (!preg_match('/^[A-Za-z\s]+$/', $name)) {
      return false;
    } else {
      return true;
    }
  }
}