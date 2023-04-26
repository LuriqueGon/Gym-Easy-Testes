<?php

namespace App\DAO;
use App\DAO\SQL;

Class Muscle extends SQL
{

    const TABLE_NAME = "tb_muscles";

    public static function setMuscle(String $muscle):bool
    {
        $sql = new SQL;
        return $sql->rawQuery('INSERT INTO '. Muscle::TABLE_NAME. '(`muscle`) VALUES (?)', array(
            $muscle
        ));
    }

    public static function getMuscles()
    {
        $sql = new SQL;
        return $sql->selectAll("SELECT * FROM ". Muscle::TABLE_NAME. ' ORDER BY muscle ASC');
    }

    public static function getMuscle($id)
    {
        $sql = new SQL;
        return $sql->select("SELECT * FROM ". Muscle::TABLE_NAME. ' WHERE id_muscle = ? ORDER BY id_muscle ASC', array(
            $id
        ));
    }

    public static function deleteMuscle(Int $id):bool
    {
        $sql = new SQL;
        return $sql->rawQuery('DELETE FROM '. Muscle::TABLE_NAME. ' WHERE id_muscle = ?', array(
            $id
        ));
    }

    public static function updateMuscle($id, $muscle)
    {
        $sql = new SQL;
        $sql->query('UPDATE '. Muscle::TABLE_NAME .' SET muscle = ? WHERE id_muscle = ?', array(
            $muscle,
            $id
        ));
    }
}

?>