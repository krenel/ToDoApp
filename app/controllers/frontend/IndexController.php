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
    }