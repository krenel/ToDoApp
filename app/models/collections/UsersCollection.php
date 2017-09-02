<?php
class UsersCollection extends Collection
{
    protected $entity = 'UsersEntity';
    protected $table = 'users';

    public function save(Entity $entity)
    {
        $dataInput = array(
            'user_first_name' => $entity->getUserFirstName(),
            'user_last_name' => $entity->getUserLastName(),
            'user_email' => $entity->getUserEmail(),
            'user_password' => $entity->getUserPassword(),
            'user_admin_status' => $entity->getUserAdminStatus(),
        );

        if ($entity->getUserId() > 0) {
            $this->update($entity->getUserId(), $dataInput);
        } else {
            $this->create($dataInput);
        }
    }
}