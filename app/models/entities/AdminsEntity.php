<?php
class AdminsEntity extends Entity
{
    protected $admin_id;
    protected $admin_username;
    protected $admin_password;

    /**
     * @return mixed
     */
    public function getAdminId()
    {
        return $this->admin_id;
    }

    /**
     * @param mixed $admin_id
     */
    public function setAdminId($admin_id)
    {
        $this->admin_id = $admin_id;
    }

    /**
     * @return mixed
     */
    public function getAdminUsername()
    {
        return $this->admin_username;
    }

    /**
     * @param mixed $admin_username
     */
    public function setAdminUsername($admin_username)
    {
        $this->admin_username = $admin_username;
    }

    /**
     * @return mixed
     */
    public function getAdminPassword()
    {
        return $this->admin_password;
    }

    /**
     * @param mixed $admin_password
     */
    public function setAdminPassword($admin_password)
    {
        $this->admin_password = $admin_password;
    }
}