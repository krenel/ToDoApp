<?php
    class TasksEntity extends Entity
    {
        protected $task_id;
        protected $task_list_id;
        protected $task_status;
        protected $task_description;
        protected $task_deadline;
        protected $task_created_at;

        /**
         * @return mixed
         */
        public function getTaskId()
        {
            return $this->task_id;
        }

        /**
         * @param mixed $task_id
         */
        public function setTaskId($task_id)
        {
            $this->task_id = $task_id;
        }

        /**
         * @return mixed
         */
        public function getTaskListId()
        {
            return $this->task_list_id;
        }

        /**
         * @param mixed $task_list_id
         */
        public function setTaskListId($task_list_id)
        {
            $this->task_list_id = $task_list_id;
        }

        /**
         * @return mixed
         */
        public function getTaskStatus()
        {
            return $this->task_status;
        }

        /**
         * @param mixed $task_status
         */
        public function setTaskStatus($task_status)
        {
            $this->task_status = $task_status;
        }

        /**
         * @return mixed
         */
        public function getTaskDescription()
        {
            return $this->task_description;
        }

        /**
         * @param mixed $task_description
         */
        public function setTaskDescription($task_description)
        {
            $this->task_description = $task_description;
        }

        /**
         * @return mixed
         */
        public function getTaskDeadline()
        {
            return $this->task_deadline;
        }

        /**
         * @param mixed $task_deadline
         */
        public function setTaskDeadline($task_deadline)
        {
            $this->task_deadline = $task_deadline;
        }

        /**
         * @return mixed
         */
        public function getTaskCreatedAt()
        {
            return $this->task_created_at;
        }

        /**
         * @param mixed $task_created_at
         */
        public function setTaskCreatedAt($task_created_at)
        {
            $this->task_created_at = $task_created_at;
        }
    }