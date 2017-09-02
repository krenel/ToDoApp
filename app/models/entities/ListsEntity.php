<?php
class ListsEntity extends Entity
{
    protected $list_id;
    protected $list_user_id;
    protected $list_title;
    protected $list_delete_status;

    /**
     * @return mixed
     */
    public function getListId()
    {
        return $this->list_id;
    }

    /**
     * @param mixed $list_id
     */
    public function setListId($list_id)
    {
        $this->list_id = $list_id;
    }

    /**
     * @return mixed
     */
    public function getListUserId()
    {
        return $this->list_user_id;
    }

    /**
     * @param mixed $list_user_id
     */
    public function setListUserId($list_user_id)
    {
        $this->list_user_id = $list_user_id;
    }

    /**
     * @return mixed
     */
    public function getListTitle()
    {
        return $this->list_title;
    }

    /**
     * @param mixed $list_title
     */
    public function setListTitle($list_title)
    {
        $this->list_title = $list_title;
    }

    /**
     * @return mixed
     */
    public function getListDeleteStatus()
    {
        return $this->list_delete_status;
    }

    /**
     * @param mixed $list_delete_status
     */
    public function setListDeleteStatus($list_delete_status)
    {
        $this->list_delete_status = $list_delete_status;
    }
}