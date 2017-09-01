<?php
class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(){

        $adminsCollection = new AdminsCollection();

        $errors = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['admin_username'])) {
                if (isset($_POST['admin_username']) && isset($_POST['admin_password']) && strlen($_POST['admin_username']) > 3 && strlen($_POST['admin_password']) > 3) {
                    $admin_password = sha1($_POST['admin_password']);

                    $admin_username = htmlspecialchars(trim($_POST['admin_username']));
                    $where = array('admin_username' => $admin_username);

                    $result = $adminsCollection->getAll($where);

                    if ($result != null && $result[0]->getAdminpassword() == $admin_password) {
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