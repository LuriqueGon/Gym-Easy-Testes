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

    public static function getMuscles(Int $ativo = 1)
    {
        $sql = new SQL;

        if($ativo == 2) return $sql->selectAll("SELECT * FROM ". Muscle::TABLE_NAME. ' ORDER BY muscle ASC');

        return $sql->selectAll("SELECT * FROM ". Muscle::TABLE_NAME. ' WHERE ativo = ? ORDER BY muscle ASC', array(
            $ativo
        ));
        
    }

    public static function getMuscle(Int $id, Int $ativo = 1)
    {
        $sql = new SQL;
        return $sql->select("SELECT * FROM ". Muscle::TABLE_NAME. ' WHERE id_muscle = ? AND ativo = ? ORDER BY id_muscle ASC', array(
            $id,
            $ativo
        ));
    }

    public static function deleteMuscle(Int $id):bool
    {
        $sql = new SQL;
        return $sql->rawQuery('DELETE FROM '. Muscle::TABLE_NAME. ' WHERE id_muscle = ? ', array(
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

    public static function alterarAtivo(Int $id, Bool $ativo)
    {
        $sql = new SQL;
        $sql->query('UPDATE '. Muscle::TABLE_NAME .' SET ativo = ? WHERE id_muscle = ?', array(
            $ativo,
            $id
        ));
    }
}

?>