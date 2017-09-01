<?php
    class IndexController extends Controller
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $data = [
                'text' => 'Hello!',
                'js' => 'index/test.js'
            ];

            $this->loadFrontView('index', $data);
        }

        public function testFunc()
        {
            echo "<pre>";
            var_dump($_POST);
            var_dump($_GET);
            die;
            echo "<pre/>";

            $response = "FROM PHP!";

            echo json_encode($response);
        }

        public function about()
        {

            $data = array();

            $this->loadFrontView('about',$data);

        }

        public function logout()
        {

            unset($_SESSION['user']);
            unset($_SESSION['logged_in']);
            //header('Location: index.php?c=login&m=login');

        }



    }