<?php
    class UsersController extends Controller
    {
        public function index()
        {
            if (!$this->loggedIn()) {
                header('Location: index.php?c=login&m=login');
            }

            $data = array();

            $usersCollection = new UsersCollection();
            $users = $usersCollection->getAll(array());

            $data['users'] = $users;

            $this->loadView('users/index', $data);
        }

        public function create()
        {
            $data = array();

            $insertInfo = array(
                'user_first_name' => '',
                'user_last_name' => '',
                'user_email' => '',
                'user_password' => '',
                'confirm_password' => '',
                'user_admin_status' => '',
            );

            $errors = array();

            if (isset($_POST['user_create'])) {

                $insertInfo = array(
                    'user_first_name' => (isset($_POST['user_first_name']))? $_POST['user_first_name'] : '',
                    'user_last_name' => (isset($_POST['user_last_name']))? $_POST['user_last_name'] : '',
                    'user_email' => (isset($_POST['user_email']))? $_POST['user_email'] : '',
                    'user_password' => (isset($_POST['user_password']))? $_POST['user_password'] : '',
                    'confirm_password' => (isset($_POST['confirm_password']))? $_POST['confirm_password'] : '',
                    'user_admin_status' => (isset($_POST['user_admin_status']))? $_POST['user_admin_status'] : '',
                );

                $validator = new UserValidation();
                $errors = $validator->validateUserInput($insertInfo);

                if (empty($errors)) {
                    $userEntity = new UsersEntity();

                    $userEntity->setUserFirstName($insertInfo['user_first_name']);
                    $userEntity->setUserLastName($insertInfo['user_last_name']);
                    $userEntity->setUserEmail($insertInfo['user_email']);
                    $userEntity->setUserPassword(sha1($insertInfo['user_password']));
                    $userEntity->setUserAdminStatus($insertInfo['user_admin_status']);

                    $collection = new UsersCollection();
                    $collection->save($userEntity);

                    header('Location: index.php?c=users&m=index');
                }
            }
            
            $data['insertInfo'] = $insertInfo;
            $data['errors'] = $errors;

            $this->loadView('users/create', $data);
        }

        public function update()
        {
            $usersCollection = new UsersCollection();
            $user = $usersCollection->getOneUser($_GET['id']);

            $data = array();

            $insertInfo = array(
                'user_first_name' => $user->getUserFirstName(),
                'user_last_name' => $user->getUserLastName(),
                'user_email' => $user->getUserEmail(),
                'user_password' => '',
                'confirm_password' => '',
                'user_admin_status' => $user->getUserAdminStatus(),
            );

            $errors = array();

            if (isset($_POST['user_update'])) {


                $insertInfo = array(
                    'user_first_name' => (isset($_POST['user_first_name']))? $_POST['user_first_name'] : '',
                    'user_last_name' => (isset($_POST['user_last_name']))? $_POST['user_last_name'] : '',
                    'user_email' => (isset($_POST['user_email']))? $_POST['user_email'] : '',
                    'user_password' => (isset($_POST['user_password']))? $_POST['user_password'] : '',
                    'confirm_password' => (isset($_POST['confirm_password']))? $_POST['confirm_password'] : '',
                    'user_admin_status' => (isset($_POST['user_admin_status']))? $_POST['user_admin_status'] : '',
                );

                $validator = new UserValidation();
                $errors = $validator->validateUserInput($insertInfo);

                if (empty($errors)) {

                    $user->setUserId($_GET['id']);
                    $user->setUserFirstName($insertInfo['user_first_name']);
                    $user->setUserLastName($insertInfo['user_last_name']);
                    $user->setUserEmail($insertInfo['user_email']);
                    $user->setUserPassword(sha1($insertInfo['user_password']));
                    $user->setUserAdminStatus($insertInfo['user_admin_status']);

//                    var_dump($user);die;

                    $collection = new UsersCollection();
                    $collection->save($user);

                    header('Location: index.php?c=users&m=index');
                }
            }

            $data['insertInfo'] = $insertInfo;
            $data['errors'] = $errors;

            $this->loadView('users/update', $data);

        }


        public function change()
        {
            if (!$this->loggedIn()) {
                header('Location: index.php?c=login&m=login');
            }

            if (!isset($_GET['id'])) {
                header('Location: index.php?c=users&m=index');
            }

            $usersCollection = new UsersCollection();

            $user = $usersCollection->getOneUser($_GET['id']);

            if (is_null($user)) {
                header('Location: index.php?c=users&m=index');
            }

            if ($user->getUserAdminStatus() == true) {
                $user->setUserAdminStatus(false);
            } else {
                $user->setUserAdminStatus(true);
            }

//            echo "<pre>";
//            var_dump($user->getUserAdminStatus()); die;
//            echo "<pre/>";

            $usersCollection->save($user);
            header('Location: index.php?c=users&m=index');
        }


        public function delete()
        {
            if (!$this->loggedIn()) {
                header('Location: index.php?c=login&m=login');
            }

            if (!isset($_GET['id'])) {
                header('Location: index.php?c=users&m=index');
            }

            $usersCollection = new UsersCollection();

            $user = $usersCollection->getOneUser($_GET['id']);

            if (is_null($user)) {
                header('Location: index.php?c=users&m=index');
            }

            $usersCollection->deleteUser($user->getUserId());
            header('Location: index.php?c=users&m=index');
        }

    }