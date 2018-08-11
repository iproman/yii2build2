<?php
/**
 * Created by PhpStorm.
 * User: iproman
 * Date: 11.08.2018
 * Time: 21:49
 */

namespace common\models;


/**
 * Class ValueHelpers
 * @package common\models
 */
class ValueHelpers
{
    /**
     * return the value of a role name handed in as string
     * example: 'Admin'
     *
     * @param $role_name
     * @return mixed
     * @throws \yii\db\Exception
     */
    public static function getRoleValue($role_name)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT role_value
        FROM role
        WHERE role_name=:role_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":role_name", $role_name);
        $result = $command->queryOne();

        return $result['role_value'];
    }
}