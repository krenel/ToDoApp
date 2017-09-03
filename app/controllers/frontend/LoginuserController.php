<?php
class LoginuserController extends Controller
{
    public function login()
    {
        $usersCollection = new UsersCollection();

        $errors = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['user_email'])) {
                if (isset($_POST['user_email']) && isset($_POST['user_password']) && strlen($_POST['user_password']) > 3 && strlen($_POST['user_password']) > 3) {
                    $user_password = sha1($_POST['user_password']);

                    $user_email = htmlspecialchars(trim($_POST['user_email']));

                    $where = array('user_email' => $user_email);

                    $result = $usersCollection->getAll($where);

                    if ($result != null && $result[0]->getUserPassword() == $user_password) {
                        $_SESSION['user'] = $result[0];
                        $_SESSION['logged_in'] = 1;
                        header('Location: index.php?c=index&m=index');
                    } else {
                        $errors['login'] = 'Wrong credentials';
                    }

                } else {
                    $errors['login'] = 'Wrong credentials';
                }
            }
        }

        $data['errors'] = $errors;

        $this->loadFrontView("users/login",$data);
    }


    public function register()
    {
        $data = array();

        $insertInfo = array(
            'user_first_name' => '',
            'user_last_name' => '',
            'user_email' => '',
            'user_password' => '',
            'confirm_password' => '',
        );

        $errors = array();

        if (isset($_POST['user_register'])) {

            $insertInfo = array(
                'user_first_name' => (isset($_POST['user_first_name']))? $_POST['user_first_name'] : '',
                'user_last_name' => (isset($_POST['user_last_name']))? $_POST['user_last_name'] : '',
                'user_email' => (isset($_POST['user_email']))? $_POST['user_email'] : '',
                'user_password' => (isset($_POST['user_password']))? $_POST['user_password'] : '',
                'confirm_password' => (isset($_POST['confirm_password']))? $_POST['confirm_password'] : '',
            );

            $validator = new UserValidation();
            $errors = $validator->validateUserInput($insertInfo);

            if (empty($errors)) {
                $userEntity = new UsersEntity();

                $userEntity->setUserFirstName($insertInfo['user_first_name']);
                $userEntity->setUserLastName($insertInfo['user_last_name']);
                $userEntity->setUserEmail($insertInfo['user_email']);
                $userEntity->setUserPassword(sha1($insertInfo['user_password']));

                $collection = new UsersCollection();
                $collection->save($userEntity);

                header('Location: index.php?c=index&m=index');
            }
        }

        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadFrontView("users/register",$data);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['logged_in']);
        header('Location: index.php?c=index&m=index');
    }
}