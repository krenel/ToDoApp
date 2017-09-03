<?php
    abstract class Collection{

        protected $entity = 'entity';
        protected $table = 'table';
        protected $db = null;

        public function __construct()
        {
            $this->db = DB::getInstance();
        }

        public function getOneAdmin($where = null)
        {
            $sql = " SELECT * FROM {$this->table} ";
            $sql.= "WHERE admin_id = '{$where}'";

            $result = $this->db->query($sql);

            $row = $this->db->translate($result);

            $entity = new $this->entity;
            $oEntity = $entity->init($row);

            return $oEntity;
        }

        public function getOneUser($where = null)
        {
            $sql = " SELECT * FROM {$this->table} ";
            $sql.= "WHERE user_id = '{$where}'";

            $result = $this->db->query($sql);

            $row = $this->db->translate($result);

            $entity = new $this->entity;
            $oEntity = $entity->init($row);

            return $oEntity;
        }

        public function getOneList($where = null)
        {
            $sql = " SELECT * FROM {$this->table} ";
            $sql.= "WHERE list_id = '{$where}'";

            $result = $this->db->query($sql);

            $row = $this->db->translate($result);

            $entity = new $this->entity;
            $oEntity = $entity->init($row);

            return $oEntity;
        }

        public function getOneTask($where = null)
        {
            $sql = " SELECT * FROM {$this->table} ";
            $sql.= "WHERE task_id = '{$where}'";

            $result = $this->db->query($sql);

            $row = $this->db->translate($result);

            $entity = new $this->entity;
            $oEntity = $entity->init($row);

            return $oEntity;
        }

        public function exportToXLS($id,$name='file')
        {
            $sql = "SELECT task_status, task_description, task_deadline, task_created_at FROM tasks
            WHERE task_list_id = '{$id}'";

            $result = $this->db->query($sql);

            $output = '';

            if(mysqli_num_rows($result) > 0)
            {
                $output .= '
                    <table class="table" bordered="1">
                    <tr>
                         <th>Status</th>
                         <th>Description</th>
                         <th>Deadline</th>
                         <th>Created at</th>
                    </tr>
                ';
                while($row = mysqli_fetch_array($result))
                {
                    if ($row["task_status"] == 0) {
                        $status = 'In progress';
                    } else {
                        $status = 'Done';
                    }

                    $output .= '
                        <tr>
                             <td>'.$status.'</td>
                             <td>'.$row["task_description"].'</td>
                             <td>'.$row["task_deadline"].'</td>
                             <td>'.$row["task_created_at"].'</td>
                        </tr>
                    ';
                }
                $output .= '</table>';
                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename='.$name.'.xls');
                echo $output;
            }

        }

        public function getOne($where = null)
        {
            $sql = " SELECT * FROM {$this->table} ";
            $sql.= "WHERE id = '{$where}'";

            $result = $this->db->query($sql);

            $row = $this->db->translate($result);

            $entity = new $this->entity;
            $oEntity = $entity->init($row);

            return $oEntity;
        }

        public function getListsByStatus($where = array())
        {
            $sql = "SELECT users_lists.list_title, users_lists.list_id, users.user_first_name, users.user_last_name, users.user_email
                    FROM users_lists
                    INNER JOIN users ON users_lists.list_user_id = users.user_id";

            $sql.= " WHERE 1=1 ";


            foreach ($where as $key => $value) {
                $sql.= "AND {$key} = '{$value}' ";
            }

            $result = $this->db->query($sql);

            if ($result  === false) {
                $this->db->error();
            }

            $collection = array();
            while ($row = $this->db->translate($result)) {
                $collection[] = $row;
            }

            return $collection;
        }


        public function getAll($where = null, $limit = -1, $offset = 0)
        {
            $sql = " SELECT * FROM {$this->table} ";

            $sql.= " WHERE 1=1 ";

            foreach ($where as $key => $value) {
                $sql.= "AND {$key} = '{$value}' ";
            }

            if ($limit > -1) {
                $sql.= "Limit {$limit}";

                if ($offset > 0) {
                    $sql.= " , {$offset}";
                }
            }

            $result = $this->db->query($sql);

            if ($result  === false) {
                $this->db->error();
            }

            $collection = array();
            while ($row = $this->db->translate($result)) {
                $entity = new $this->entity;
                $entityRow = $entity->init($row);

                $collection[] = $entityRow;
            }

            return $collection;
        }

        public function create($dataInput)
        {
            $sql="INSERT INTO {$this->table} SET ";

            $numItems = count($dataInput);
            $i = 0;
            foreach ($dataInput as $key => $value) {
                if (++$i == $numItems) {
                    $sql.="{$key}='{$value}' ";
                } else {
                    $sql.="{$key}='{$value}', ";
                }
            }

            $result = $this->db->query($sql);

            if($result === null) {
                $this->db->error();
            }

            return $this->db->lastId();
        }

        public function update($id, $dataInput)
        {
            $sql =  "UPDATE {$this->table} SET ";
            $numItems = count($dataInput);
            $i = 0;
            foreach ($dataInput as $key => $value) {
                if (++$i == $numItems) {
                    $sql.="{$key}='{$value}' ";
                } else {
                    $sql.="{$key}='{$value}', ";
                }
            }

            if ($this->table == 'users') {
                $sql .= "WHERE user_id = {$id}";
            } else if($this->table == 'tasks') {
                $sql .= "WHERE task_id = {$id}";
            } else if($this->table == 'users_lists') {
                $sql .= "WHERE list_id = {$id}";
            } else  {
                $sql .= "WHERE id = {$id}";
            }

            $result = $this->db->query($sql);

            if($result === null) {
                $this->db->error();
            }

            return true;
        }

        public function deleteAdmin($id)
        {
            $sql = "DELETE FROM {$this->table} WHERE admin_id = {$id}";

            $result = $this->db->query($sql);

            if($result === null) {
                $this->db->error();
            }

            return true;
        }

        public function deleteUser($id)
        {
            $sql = "DELETE FROM {$this->table} WHERE user_id = {$id}";

            $result = $this->db->query($sql);

            if($result === null) {
                $this->db->error();
            }

            return true;
        }

        public function deleteList($id)
        {
            $sql = "DELETE FROM {$this->table} WHERE list_id = {$id}";

            $result = $this->db->query($sql);

            if($result === null) {
                $this->db->error();
            }

            return true;
        }

        public function deleteTask($id)
        {
            $sql = "DELETE FROM {$this->table} WHERE task_id = {$id}";

            $result = $this->db->query($sql);

            if($result === null) {
                $this->db->error();
            }

            return true;
        }

        public function delete($id)
        {
            $sql = "DELETE FROM {$this->table} WHERE id = {$id}";

            $result = $this->db->query($sql);

            if($result === null) {
                $this->db->error();
            }

            return true;
        }

        abstract public function save(Entity $entity);
    }