<?php
class UsersEntity extends Entity
{
    protected $user_id;
    protected $user_first_name;
    protected $user_last_name;
    protected $user_email;
    protected $user_password;
    protected $user_admin_status;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserFirstName()
    {
        return $this->user_first_name;
    }

    /**
     * @param mixed $user_first_name
     */
    public function setUserFirstName($user_first_name)
    {
        $this->user_first_name = $user_first_name;
    }

    /**
     * @return mixed
     */
    public function getUserLastName()
    {
        return $this->user_last_name;
    }

    /**
     * @param mixed $user_last_name
     */
    public function setUserLastName($user_last_name)
    {
        $this->user_last_name = $user_last_name;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @param mixed $user_email
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * @param mixed $user_password
     */
    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;
    }

    /**
     * @return mixed
     */
    public function getUserAdminStatus()
    {
        return $this->user_admin_status;
    }

    /**
     * @param mixed $user_admin_status
     */
    public function setUserAdminStatus($user_admin_status)
    {
        $this->user_admin_status = $user_admin_status;
    }
}
