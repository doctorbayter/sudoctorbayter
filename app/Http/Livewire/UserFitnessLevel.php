<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserFitnessLevel extends Component
{
    public $day, $level, $data;

    public $exercise, $description, $time, $difficulty, $copy, $equipments, $video, $exercises;

    public function mount($level){
        $this->level = $level;
        $this->setDay(1);
    }

    public function render() {
        if($this->level > 4 ){
            return view('no-disponible');
        }

        $this->data = $this->levelData($this->level);

        return view('livewire.user-fitness-level');
    }


    public function levelData($level)    {
        switch ($level) {
            case 1:
                return $this->data = [
                    'title' => 'Nivel Uno',
                    'subtitle'=> 'Adaptación al entrenamiento',
                ];
                break;
            default:
                return null;
                break;
        }
    }

    public function setDay($day)
    {
        $this->day = $day;
        if ($this->level == 1) {
            switch ($day) {
                case 1:
                    $this->exercise = "Piernas";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 35;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "666780109?h=4f0b781330";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote continuo",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Skeeping bajo",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat o sentadilla Estandar",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;
                case 2:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 40;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "666780109?h=4f0b781330";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y cambios de velocidad",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat o sentadilla Estandar",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 3:
                    $this->exercise = "Cardio Pecho";
                    $this->description = null;
                    $this->time = 35;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "666780109?h=4f0b781330";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y cambios de velocidad",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat o sentadilla Estandar",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 4:
                    $this->exercise = "Espalda";
                    $this->description = null;
                    $this->time = 35;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "666780109?h=4f0b781330";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y cambios de velocidad",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat o sentadilla Estandar",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 5:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 45;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "666780109?h=4f0b781330";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y cambios de velocidad",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat o sentadilla Estandar",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 6:
                    $this->exercise = "Full body";
                    $this->description = null;
                    $this->time = 45;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "666780109?h=4f0b781330";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y cambios de velocidad",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat o sentadilla Estandar",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 7:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 40;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "666780109?h=4f0b781330";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y cambios de velocidad",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat o sentadilla Estandar",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

}
