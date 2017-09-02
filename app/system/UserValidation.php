<?php
 class UserValidation
{
     public function validateUserInput($input)
     {
         $errors = array();

         if (!isset($input['user_first_name']) || strlen(trim($input['user_first_name'])) < 4 || strlen(trim($input['user_first_name'])) > 15  || (!preg_match("/^[a-zA-Z0-9]*$/", $input['user_first_name']))) {
             $errors['user_first_name'] = 'Incorrect first name!';
         }

         if (!isset($input['user_last_name']) || strlen(trim($input['user_last_name'])) < 4 || strlen(trim($input['user_last_name'])) > 15  || (!preg_match("/^[a-zA-Z0-9]*$/", $input['user_last_name']))) {
             $errors['user_last_name'] = 'Incorrect last name!';
         }

         if (!isset($input['user_email']) || strlen(trim($input['user_email'])) < 4 || strlen(trim($input['user_email'])) > 15  || (!preg_match("/\S+@\S+\.\S+/", $input['user_email']))) {
             $errors['user_email'] = 'Incorrect email!';
         }

         if ($input['user_password'] != $input['confirm_password']) {
             $errors['confirm_password'] = "Passwords don't match!";
         } else {
             if (!isset($input['user_password']) || strlen(trim($input['user_password'])) < 4 || strlen(trim($input['user_password'])) > 15  || (!preg_match("/^[a-zA-Z0-9]*$/", $input['user_password']))) {
                 $errors['user_password'] = 'Incorrect password!';
             }

             if (!isset($input['confirm_password']) || strlen(trim($input['confirm_password'])) < 4 || strlen(trim($input['confirm_password'])) > 15  || (!preg_match("/^[a-zA-Z0-9]*$/", $input['confirm_password']))) {
                 $errors['confirm_password'] = 'Incorrect confirm password!';
             }
         }
         return $errors;
     }
}
