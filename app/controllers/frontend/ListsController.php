<?php
    class ListsController extends Controller
    {
        public function index()
        {
            $listsCollection = new ListsCollection();
            
            $usersLists = $listsCollection->getAll(['list_user_id' => $_SESSION['user']->getUserId()]);

            $data['lists'] = $usersLists;

            $this->loadFrontView('lists/index',$data);
        }

        public function create()
        {
            $data = array();

            $insertInfo = array(
                'list_title' => '',
                'list_user_id' => '',
            );

            $errors = array();

            if (isset($_POST['list_create'])) {

                $insertInfo = array(
                    'list_title' => (isset($_POST['list_title']))? $_POST['list_title'] : '',
                    'list_user_id'=> (isset($_POST['list_user_id']))? $_POST['list_user_id'] : '',
                );

                $errors = $this->listTitileValidation($insertInfo);

                if (empty($errors)) {
                    $listsEntity = new ListsEntity();

                    $listsEntity->setListUserId($insertInfo['list_user_id']);
                    $listsEntity->setListTitle($insertInfo['list_title']);

                    $collection = new ListsCollection();
                    $collection->save($listsEntity);

                    header('Location: index.php?c=lists&m=index');
                }
            }

            $data['insertInfo'] = $insertInfo;
            $data['errors'] = $errors;

            $this->loadFrontView('lists/create',$data);
        }

        public function listTitileValidation($input)
        {
            $errors = array();

            if (!isset($input['list_title']) || strlen(trim($input['list_title'])) > 30  || (!preg_match("/^[a-zA-Z0-9 ]*$/", $input['list_title']))) {
                $errors['list_title'] = 'Incorrect title!';
            }

            return $errors;
        }

        public function view()
        {
            $listsCollection = new ListsCollection();
            $userList = $listsCollection->getOneList($_GET['id']);

            $tasksCollection = new TasksCollection();
            $tasks = $tasksCollection->getAll(['task_list_id' => $_GET['id'] ]);

            $data['userList'] = $userList;
            $data['tasks'] = $tasks;
            $data['js'] = 'list/task-add.js';

            $this->loadFrontView('lists/view',$data);

        }

        public function addTask()
        {
            $taskDescription = $_POST["taskDescription"];
            $taskDeadline = $_POST["taskDeadline"];
            $taskListId = $_POST["taskListId"];

            $taskEntity = new TasksEntity();

            $taskEntity->setTaskListId($taskListId);
            $taskEntity->setTaskDescription($taskDescription);
            $taskEntity->setTaskDeadline($taskDeadline);
            $taskEntity->setTaskCreatedAt(date('Y-m-d'));

            $tasksCollection = new TasksCollection();
            $tasksCollection->save($taskEntity);

            echo json_encode($taskEntity);
        }

        public function changeStatus()
        {
            $taskId = $_POST['taskId'];
            
            $taskCollection = new TasksCollection();
            
            $task = $taskCollection->getOneTask($taskId);

            if ((int) $task->getTaskStatus()) {
                $task->setTaskStatus(0);
            } else {
                $task->setTaskStatus(1);
            }

            $taskCollection->save($task);

            echo json_encode($task);
        }

        public function export()
        {
            $listId = $_GET['id'];
            $listName = $_GET['name'];

            $listsCollection = new ListsCollection();

            $listsCollection->exportToXLS($listId,$listName);
        }

        public function delete()
        {
            if(!isset($_GET['id'])) {
                header('Location: index.php?c=lists&m=index');
            }

            $listId = $_GET['id'];

            $listsCollection = new ListsCollection();

            $list = $listsCollection->getOneList($listId);
            $list->setListDeleteStatus(1);

            $listsCollection->save($list);

            header('Location: index.php?c=lists&m=index');
        }

        public function deleteTask()
        {
            if(!isset($_GET['id'])) {
                header('Location: index.php?c=lists&m=index');
            }

            $taskId = $_GET['id'];

            $tasksCollection = new TasksCollection();

            $task = $tasksCollection->getOneTask($taskId);

            $tasksCollection->deleteTask($task->getTaskId());

            header('Location: index.php?c=lists&m=index');
        }
    }