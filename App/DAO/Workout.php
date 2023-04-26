<?php

namespace App\DAO;
use App\DAO\SQL;

Class Workout extends SQL
{

    const TABLE_NAME = "tb_workouts";
    const AUXTABLE_NAME = "tb_workout_muscle";

    public static function setWorkout(String $workout):bool
    {
        if(empty(Workout::getWorkoutByName($workout)))
        {
            $sql = new SQL;
            return $sql->rawQuery('INSERT INTO '. Workout::TABLE_NAME. '(`workout`) VALUES (?)', array(
                $workout
            ));
        }

        return false;
        
    }

    public static function setMuscleWorkout(Int $idMuscle, Int $idWorkout, Bool $mainMuscle):bool
    {
        var_dump($idMuscle, $idWorkout, $mainMuscle);

        $sql = new SQL;
        return $sql->rawQuery('INSERT INTO '. Workout::AUXTABLE_NAME. '(id_workout, id_muscle, main_muscle) VALUES (?,?,?)', array(
            $idWorkout,
            $idMuscle,
            $mainMuscle
        ));
    }

    public static function getWorkouts()
    {
        $sql = new SQL;
        return $sql->selectAll("SELECT * FROM ". Workout::TABLE_NAME. ' ORDER BY workout ASC');
    }

    public static function getWorkoutsMainMuscles()
    {
        $sql = new SQL;
        return $sql->selectAll("
            SELECT w.ativo, w.workout,  m.muscle, w.id_workout, wm.id_muscle
            FROM ". Workout::TABLE_NAME ." as w
            INNER JOIN ".Workout::AUXTABLE_NAME. " as wm using(id_workout)
            INNER JOIN ".Muscle::TABLE_NAME. " as m USING(id_muscle)
            WHERE wm.main_muscle = true
        ");
    }

    public static function getWorkoutAuxMuscles(Int $idWorkout)
    {
        $sql = new SQL;
        return $sql->selectAll("
            SELECT  m.muscle
            FROM ". Workout::TABLE_NAME ." as w
            INNER JOIN ".Workout::AUXTABLE_NAME. " as wm using(id_workout)
            INNER JOIN ".Muscle::TABLE_NAME. " as m USING(id_muscle)
            WHERE wm.main_muscle = false AND id_workout = ?
        ", array(
            $idWorkout
        ));
    }

    

    

    public static function getWorkout($id)
    {
        $sql = new SQL;
        return $sql->select("SELECT * FROM ". Workout::TABLE_NAME. ' WHERE id_workout = ? ORDER BY id_workout ASC', array(
            $id
        ));
    }

    public static function getWorkoutByName(String $workout)
    {
        $sql = new SQL;
        return $sql->select("SELECT * FROM ". Workout::TABLE_NAME. ' WHERE workout = ? ORDER BY id_workout ASC', array(
            $workout
        ));
    }

    public static function deleteWorkout(Int $id):bool
    {
        $sql = new SQL;
        return $sql->rawQuery('DELETE FROM '. Workout::TABLE_NAME. ' WHERE id_workout = ?', array(
            $id
        ));
    }

    public static function updateWorkout($id, $workout)
    {
        $sql = new SQL;
        $sql->query('UPDATE '. Workout::TABLE_NAME .' SET workout = ? WHERE id_workout = ?', array(
            $workout,
            $id
        ));
    }
}

?>