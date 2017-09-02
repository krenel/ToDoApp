<?php
class ListsCollection extends Collection
{
    protected $entity = 'ListsEntity';
    protected $table = 'users_lists';

    public function save(Entity $entity)
    {
        $dataInput = array(
            'list_id' => $entity->getListId(),
            'list_user_id' => $entity->getListUserId(),
            'list_title' => $entity->getListTitle(),
            'list_delete_status' => $entity->getListDeleteStatus(),
        );

        if ($entity->getListId() > 0) {
            $this->update($entity->getListId(), $dataInput);
        } else {
            $this->create($dataInput);
        }
    }
}