<?php
class TasksCollection extends Collection
{
    protected $entity = 'TasksEntity';
    protected $table = 'tasks';

    public function save(Entity $entity)
    {
        $dataInput = array(
            'task_id' => $entity->getTaskId(),
            'task_list_id'=> $entity->getTaskListId(),
            'task_status'=> $entity->getTaskStatus(),
            'task_description'=> $entity->getTaskDescription(),
            'task_deadline'=> $entity->getTaskDeadline(),
            'task_created_at'=> $entity->getTaskCreatedAt(),
        );

        if ($entity->getTaskId() > 0) {
            $this->update($entity->getTaskId(), $dataInput);
        } else {
            $this->create($dataInput);
        }
    }
}
