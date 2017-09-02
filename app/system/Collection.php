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

        public function getOneImg($where = null)
        {
            $sql = " SELECT * FROM {$this->table} ";
            $sql.= "WHERE img_id = '{$where}'";

            $result = $this->db->query($sql);

            $row = $this->db->translate($result);

            $entity = new $this->entity;
            $oEntity = $entity->init($row);

            return $oEntity;
        }

        public function getOneImgL($where = null)
        {
            $sql = " SELECT * FROM {$this->table} ";
            $sql.= "WHERE landmarks_id = '{$where}'";

            $result = $this->db->query($sql);

            $row = $this->db->translate($result);

            $entity = new $this->entity;
            $oEntity = $entity->init($row);

            return $oEntity;
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

        public function getAllImg($where = null, $limit = -1, $offset = 0)
        {
            $sql = " SELECT * FROM {$this->table} ";

            $sql.= "WHERE img_id = '{$where}'";

//            foreach ($where as $key => $value) {
//                $sql.= "AND {$key} = '{$value}' ";
//            }
//
//            if ($limit > -1) {
//                $sql.= "Limit {$limit}";
//
//                if ($offset > 0) {
//                    $sql.= " , {$offset}";
//                }
//            }

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

        public function getAllImgL($where = null, $limit = -1, $offset = 0)
        {
            $sql = " SELECT * FROM {$this->table} ";

            $sql.= "WHERE landmarks_id = '{$where}'";

//            foreach ($where as $key => $value) {
//                $sql.= "AND {$key} = '{$value}' ";
//            }
//
//            if ($limit > -1) {
//                $sql.= "Limit {$limit}";
//
//                if ($offset > 0) {
//                    $sql.= " , {$offset}";
//                }
//            }

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
            }else  {
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