<?php
    class AdminsController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        $adminsCollection = new AdminsCollection();
        $admins = $adminsCollection->getAll(array());

        $data['admins'] = $admins;

        $this->loadView('admins/index', $data);
    }

    public function create()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        $insertInfo = array(
            'admin_username' => '',
            'admin_password' => '',
        );

        $errors = array();
        if(isset($_POST['createAdmin'])) {

            $insertInfo = array(
                'admin_username' => (isset($_POST['admin_username']))? $_POST['admin_username'] : '',
                'admin_password' => (isset($_POST['admin_password']))? $_POST['admin_password'] : '',
            );

            $errors = $this->validateAdminInput($insertInfo);

            if (empty($errors)) {

                $adminEntity = new AdminsEntity();
                $adminEntity->setAdminUsername($insertInfo['admin_username']);
                $adminEntity->setAdminPassword(sha1($insertInfo['admin_password']));

                $collection = new AdminsCollection();
                $collection->save($adminEntity);
                header('Location: index.php?c=admins&m=index');
            }
        }

        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadView('admins/create', $data);
    }

    private function validateAdminInput($input)
    {
        $errors = array();

//        var_dump(boolval(!isset($input['admin_username'])));
//        var_dump(boolval(strlen(trim($input['admin_username']))) > 4);
//        var_dump(boolval(strlen(trim($input['admin_username']))) < 15);
//        var_dump(boolval((!preg_match("/^[a-zA-Z0-9 -]*$/", $input['admin_username']))));

        if(!isset($input['admin_username']) || strlen(trim($input['admin_username'])) < 4 || strlen(trim($input['admin_username'])) > 15  || (!preg_match("/^[a-zA-Z0-9]*$/", $input['admin_username']))) {
            $errors['admin_username'] = 'Incorrect username';
        }

        if(!isset($input['admin_password']) || strlen(trim($input['admin_password'])) < 4 || strlen(trim($input['admin_password'])) > 15  || (!preg_match("/^[a-zA-Z0-9]*$/", $input['admin_password']))) {
            $errors['admin_password'] = 'Incorrect password';
        }
        
        return $errors;
    }

        public function delete()
        {
            if (!$this->loggedIn()) {
                header('Location: index.php?c=login&m=login');
            }

            if(!isset($_GET['id'])) {
                header('Location: index.php?c=admins&m=index');
            }

            $adminsCollection = new AdminsCollection();

            $admin = $adminsCollection->getOneAdmin($_GET['id']);

              if(is_null($admin)) {
                header('Location: index.php?c=admins&m=index');
            }

            $adminsCollection->deleteAdmin($admin->getAdminId());
            header('Location: index.php?c=admins&m=index');
        }

}