<?php
    class AdminsCollection extends Collection
    {
        protected $entity = 'AdminsEntity';
        protected $table = 'admins';

        public function save(Entity $entity)
        {
            $dataInput = array(
                'username' => $entity->getAdname(),
                'password' => $entity->getPassword(),
            );

            if ($entity->getId() > 0) {
                $this->update($entity->getId(), $dataInput);
            } else {
                $this->create($dataInput);
            }
        }
    }