<?php
    class AdminsCollection extends Collection
    {
        protected $entity = 'AdminsEntity';
        protected $table = 'admins';

        public function save(Entity $entity)
        {
            $dataInput = array(
                'admin_username' => $entity->getAdminUsername(),
                'admin_password' => $entity->getAdminPassword(),
            );

            if ($entity->getAdminId() > 0) {
                $this->update($entity->getAdminId(), $dataInput);
            } else {
                $this->create($dataInput);
            }
        }
    }