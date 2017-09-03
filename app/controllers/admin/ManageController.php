<?php
class ManageController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        $listsConllection = new ListsCollection();

        $lists = $listsConllection->getListsByStatus(['users_lists.list_delete_status' => 1]);

//        echo "<pre>";
//        var_dump($lists); die;
//        echo "<pre/>";

        $data['lists'] = $lists;

        $this->loadView('manage/index', $data);
    }

    public function lists()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        $listsCollection = new ListsCollection();
        $lists = $listsCollection->getListsByStatus();

        $data['lists'] = $lists;
        $this->loadView('manage/lists', $data);
    }


    public function reject()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        $listId = $_GET['id'];

        $listsCollection = new ListsCollection();

        $list = $listsCollection->getOneList($listId);
        $list->setListDeleteStatus(0);

        $listsCollection->save($list);

        header('Location: index.php?c=manage&m=index');
    }

    public function delete()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=manage&m=index');
        }

        $listsCollection = new ListsCollection();

        $list = $listsCollection->getOneList($_GET['id']);

        if(is_null($list)) {
            header('Location: index.php?c=manage&m=index');
        }

        $listsCollection->deleteList($list->getListId());
        header('Location: index.php?c=manage&m=index');
    }
}