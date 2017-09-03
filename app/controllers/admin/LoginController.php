<?php
class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(){

        $usersCollection = new UsersCollection();

        $errors = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['user_email'])) {
                if (isset($_POST['user_email']) && isset($_POST['user_password']) && strlen($_POST['user_email']) > 3 && strlen($_POST['user_password']) > 3) {
                    $user_password = sha1($_POST['user_password']);

                    $admin_username = htmlspecialchars(trim($_POST['user_email']));
                    $where = array('user_email' => $admin_username);

                    $result = $usersCollection->getAll($where);

                    if ($result != null && $result[0]->getUserPassword() == $user_password  && $result[0]->getUserAdminStatus() == true) {
                        $_SESSION['admin'] = $result[0];
                        $_SESSION['logged_in'] = 1;
                        header('Location: index.php?c=dashboard');
                    } else {
                        $errors['login'] = 'Wrong credentials';
                    }

                } else {
                    $errors['login'] = 'Wrong credentials';
                }
            }
        }

        $data['errors'] = $errors;

        $this->loadView('login', $data);
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        unset($_SESSION['logged_in']);
        header('Location: index.php?c=login&m=login');
    }
}