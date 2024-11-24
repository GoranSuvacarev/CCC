<?php

namespace app\models;

use app\core\BaseModel;

class SessionUserModel extends BaseModel
{
    public int $id;
    public string $email;
    public string $role;

    public function getSessionData()
    {
        $query = "select u.id as id_user, u.email, r.name as role from users u
left join roles r on u.id_roles = r.id
where u.email = '$this->email'";

        $dbResult = $this->con->query($query);

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        return $resultArray;
    }

    public function getSessionUserID(): int{
        return $this->id;
    }

    public function tableName()
    {
        return '';
    }

    public function readColumns()
    {
        return [];
    }

    public function editColumns()
    {
        return [];
    }

    public function validationRules()
    {
        return [];
    }
}