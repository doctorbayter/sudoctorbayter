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


    public function levelData($level){
        switch ($level) {
            case 1:
                return $this->data = [
                    'title' => 'Fase Uno',
                    'subtitle' => 'Adaptación al entrenamiento',
                    'portada' => 'img/billboards/fitness/nivel_1.jpg',
                    'portada_lg' => 'img/billboards/fitness/nivel_1_lg.jpg'
                ];
                break;
            case 2:
                return $this->data = [
                    'title' => 'Fase Dos',
                    'subtitle'=> 'Subiendo la intensidad',
                    'portada' => 'img/billboards/fitness/nivel_2.jpg',
                    'portada_lg' => 'img/billboards/fitness/nivel_2_lg.jpg'
                ];
                break;
            case 3:
                return $this->data = [
                    'title' => 'Fase Tres',
                    'subtitle'=> 'Más fuerza y agilidad',
                    'portada' => 'img/billboards/fitness/nivel_3.jpg',
                    'portada_lg' => 'img/billboards/fitness/nivel_3_lg.jpg'
                ];
                break;
            case 4:
                return $this->data = [
                    'title' => 'Fase Cuatro',
                    'subtitle'=> 'Somos Total Fitness',
                    'portada' => 'img/billboards/fitness/nivel_4.jpg',
                    'portada_lg' => 'img/billboards/fitness/nivel_4_lg.jpg'
                ];
                break;
            default:
                return null;
                break;
        }
    }

    public function setDay($day){
        $this->day = $day;
        if ($this->level == 1) {
            switch ($day) {
                case 1:
                    $this->exercise = "Piernas";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 41;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "678989282?h=62a3f2bf9c";
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
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
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
                    $this->time = 43;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg");
                    $this->video = "678990758?h=d6686da12a";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Copa o flexion posterior de codos para triceps.",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Curl de biceps en supinacion con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_15.jpg",
                            "name" => "Elevacion frontal para hombro con mancuernas.",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_16.jpg",
                            "name" => "Flexion posterior unilateral para triceps con mancuernas",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicios",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_18.jpg",
                            "name" => "Remo al cuello con mancuerna para hombro",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos para triceps",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros",
                            "goal" => "",
                            "time" => "12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperacion",
                            "goal" => "Estiramiento",
                            "time" => "5 a 10 segundos",
                            "type" => "Recuperación",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                    ];
                    break;
                case 3:
                    $this->exercise = "Cardio Pecho";
                    $this->description = null;
                    $this->time = 36;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "678995987?h=9b1da1afbe";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y continuo",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splits",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular del pecho en la zona intermedia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_21.jpg",
                            "name" => "Press plano mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de la zona intermadia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_22.jpg",
                            "name" => "Press declinado mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_24.jpg",
                            "name" => "Push ups con aperturas laterales",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
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
                    $this->time = 38;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679006207?h=4bb8827358";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps y jumping jacks",
                            "goal" => "Calentamiento general",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_26.jpg",
                            "name" => "Flexion de tronco anterior",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_27.jpg",
                            "name" => "Pull over",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexion de tronco lateral",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexiones de tronco lateral (alternados)",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga guerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyflies",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_30.jpg",
                            "name" => "Vuelos con tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_31.jpg",
                            "name" => "Jabs unilaterales",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Abduccion escapular tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_33.jpg",
                            "name" => "Pendulos o balancines",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
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
                    $this->time = 30;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679006470?h=5fd9ee9f2b";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales estandar",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales invertidas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_.jpg",
                            "name" => "Body crunch",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_35.jpg",
                            "name" => "Contactos a los tobillos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_36.jpg",
                            "name" => "Flexion y extencion de rodillas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Extenciones pelvicas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_38.jpg",
                            "name" => "Elevacion alternada de piernas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha con brazos flexionados ",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_40.jpg",
                            "name" => "Plancha con brazos extendidos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_41.jpg",
                            "name" => "Superman con flexion de tronco lateral",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 6:
                    $this->exercise = "Full body";
                    $this->description = null;
                    $this->time = 32;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679006620?h=15bccaf016";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas estandar",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_26.jpg",
                            "name" => "Good morning",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Body crunch",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burppes",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente de glúteo",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Joggin bajo",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 7:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 41;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679006886?h=d52ef6a3a1";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Sentadilla standar",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Sentadilla pierna diagonal atrás",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla caminata lateral",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 8:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 38;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg");
                    $this->video = "679092936?h=faa5089ae6";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_44.jpg",
                            "name" => "Elevación frontal supino con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Vuelos con mancuernas lateral ",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_45.jpg",
                            "name" => "Jacks al frente",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_46.jpg",
                            "name" => "Press frances con mancuernas",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondo de triceps",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Extencion de codo posterior con mancuernas (patada)",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Flexion posterior unilateral para triceps con mancuernas",
                            "goal" => "Joggin alto",
                            "time" => "10 a 12 reps por ejercicios",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Curl bicep neutro con mancuernas.",
                            "goal" => "Brazos ",
                            "time" => "10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl bicep supino con mancuernas",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl bicep medio rango supino con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperacion",
                            "goal" => "Estiramiento",
                            "time" => "5 a 10 segundos",
                            "type" => "Recuperación",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                    ];
                    break;

                case 9:
                    $this->exercise = "Full body";
                    $this->description = null;
                    $this->time = 36;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679093317?h=01693180f0";
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
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas estandar",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups con apoyo de rodilla",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Shoulder tabs (hombro y codo)",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Semi-burpees",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla sumo",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Piramides invertidas (puentes)",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_47.jpg",
                            "name" => "Push ups cerradas (diamante)",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Shoulder tabs (hombro y codo)",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales en crunch",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks ",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 10:
                    $this->exercise = "Cardio Piernas";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 47;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679093615?h=02486700eb";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
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
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escalones",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Senatdilla explosiva",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Estocadas o sliderz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Sentadilla isometrica",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Aperturas unilaterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 11:
                    $this->exercise = "Full body";
                    $this->description = null;
                    $this->time = 39;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679093870?h=2b3ec29a92";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha baja",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha alta toque de rodillas",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Sit ups",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_51.jpg",
                            "name" => "Spiderman con apoyo de rodillas",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha baja con rotación de cadera",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_51.jpg",
                            "name" => "Comandos",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 12:
                    $this->exercise = "Funcional";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 47;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679094185?h=facc3c2cf1";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 13:
                    $this->exercise = "Espalda";
                    $this->description = null;
                    $this->time = 38;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679094185?h=facc3c2cf1";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps y jumping jacks",
                            "goal" => "Calentamiento general",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_26.jpg",
                            "name" => "Flexion de tronco anterior",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_27.jpg",
                            "name" => "Pull over",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexion de tronco lateral",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexiones de tronco lateral (alternados)",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga guerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyflies",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_30.jpg",
                            "name" => "Vuelos con tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_31.jpg",
                            "name" => "Jabs unilaterales",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Abduccion escapular tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_33.jpg",
                            "name" => "Pendulos o balancines",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 14:
                    $this->exercise = "Pecho";
                    $this->description = null;
                    $this->time = 36;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679094714?h=a124c1c2fb";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y continuo",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splits",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular del pecho en la zona intermedia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_21.jpg",
                            "name" => "Press plano mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de la zona intermadia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_22.jpg",
                            "name" => "Press declinado mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_24.jpg",
                            "name" => "Push ups con aperturas laterales",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 15:
                    $this->exercise = "Piernas Glúteos";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 42;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679096854?h=4533e75dbe";
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
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 16:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 28;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg");
                    $this->video = "679097481?h=e487252a79";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Copa o flexion posterior de codos para triceps.",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Curl de biceps en supinacion con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_15.jpg",
                            "name" => "Elevacion frontal para hombro con mancuernas.",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_16.jpg",
                            "name" => "Flexion posterior unilateral para triceps con mancuernas",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicios",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_18.jpg",
                            "name" => "Remo al cuello con mancuerna para hombro",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos para triceps",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros",
                            "goal" => "",
                            "time" => "12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperacion",
                            "goal" => "Estiramiento",
                            "time" => "5 a 10 segundos",
                            "type" => "Recuperación",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                    ];
                    break;
                case 17:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 39;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679097760?h=1240a61640";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales estandar",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales invertidas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_.jpg",
                            "name" => "Body crunch",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_35.jpg",
                            "name" => "Contactos a los tobillos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_36.jpg",
                            "name" => "Flexion y extencion de rodillas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Extenciones pelvicas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_38.jpg",
                            "name" => "Elevacion alternada de piernas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha con brazos flexionados ",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_40.jpg",
                            "name" => "Plancha con brazos extendidos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_41.jpg",
                            "name" => "Superman con flexion de tronco lateral",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 18:
                    $this->exercise = "Fuerza y Resistencia";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 37;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679100964?h=844b810000";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 19:
                    $this->exercise = "Funcional y Resistencia";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 39;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679101230?h=9b631f95eb";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;
                case 20:
                    $this->exercise = "Piernas";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 38;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679101534?h=257fdc2080";
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
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;
                case 21:
                    $this->exercise = "Espalda";
                    $this->description = null;
                    $this->time = 38;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "679101833?h=f5d0fb2bc6";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps y jumping jacks",
                            "goal" => "Calentamiento general",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_26.jpg",
                            "name" => "Flexion de tronco anterior",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_27.jpg",
                            "name" => "Pull over",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexion de tronco lateral",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexiones de tronco lateral (alternados)",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga guerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyflies",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_30.jpg",
                            "name" => "Vuelos con tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_31.jpg",
                            "name" => "Jabs unilaterales",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Abduccion escapular tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_33.jpg",
                            "name" => "Pendulos o balancines",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
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
        if ($this->level == 2) {
            switch ($day) {
                case 1:
                    $this->exercise = "Pecho";
                    $this->description = null;
                    $this->time = 35;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686138406?h=19109196ff";
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
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees con salto",
                            "goal" => "Cuerpo en general",
                            "time" => "1 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Cuerpo en general",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_24.jpg",
                            "name" => "Push ups con apoyo de rodillas",
                            "goal" => "Especifico de pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Aperturas con mancuernas",
                            "goal" => "Especifico de pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Press cerrado con mancuernas",
                            "goal" => "Fuerza",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks al frente",
                            "goal" => "Resistencia",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Press abierto con mancuernas",
                            "goal" => "Fuerza",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Push ups alternado con rodillas",
                            "goal" => "Fuerza",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Press declinado abducción de cadera con mancuernas",
                            "goal" => "Fuerza",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_27.jpg",
                            "name" => "Pull over con mancuernas",
                            "goal" => "Fuerza",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Resistencia",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperacion",
                            "goal" => "Estiramiento",
                            "time" => "5 a 10 segundos",
                            "type" => "Recuperación",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],

                    ];
                    break;
                case 2:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 43;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg");
                    $this->video = "686138663?h=b719449f8e";
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
                            "name" => "Skeeping bajo, medio y alto",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_.jpg",
                            "name" => "Body crunch",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_44.jpg",
                            "name" => "Elevación invertida",
                            "goal" => "Fuerza y resistencia",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_51.jpg",
                            "name" => "Spiderman con apoyo de rodillas",
                            "goal" => "Zona lumbar y oblicuos",
                            "time" => "2 series - 15 rep",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha baja",
                            "goal" => "Abdomen total",
                            "time" => "2 series 30 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 30 segundos",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_52.jpg",
                            "name" => "Elevación de tronco lateral",
                            "goal" => "Abdomen medio",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_51.jpg",
                            "name" => "Spiderman unilaterales",
                            "goal" => "Zona lumbar y oblicuos",
                            "time" => "2 series - 15 rep",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks al frente",
                            "goal" => "Resistencia",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Crunch tijera",
                            "goal" => "Abdomen medio",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Sit ups",
                            "goal" => "Abdomen total",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Zona lumbar y oblicuos",
                            "goal" => "Full Body",
                            "time" => "2 series - 30 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        16 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyflies",
                            "goal" => "Funcional",
                            "time" => "2 series - 30 segundos",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        17 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperacion",
                            "goal" => "Estiramiento",
                            "time" => "5 a 10 segundos",
                            "type" => "Recuperación",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                    ];
                    break;
                case 3:
                    $this->exercise = "Piernas y Glúteos";
                    $this->description = null;
                    $this->time = 36;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686138971?h=5c4ba766b1";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y continuo",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Skeeping bajo, medio y alto",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 20 segundos",
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
                            "name" => "Sentadilla caminata lateral",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Estocadas o sliderz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Frogs pumps",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_54.jpg",
                            "name" => "Hipt thrust",
                            "goal" => "Especifico para piernas y gluteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 4:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 38;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686139160?h=e3d272444d8";
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
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Curl de biceps en supinacion con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_16.jpg",
                            "name" => "Copa bilateral para triceps en neutro con mancuernas.",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicios",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Patada posterior bilateral",
                            "goal" => "Triceps",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos para triceps",
                            "goal" => "Triceps",
                            "time" => "10 a 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_18.jpg",
                            "name" => "Remo al cuello con mancuerna para hombro",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_55.jpg",
                            "name" => "Elevaciones laterales para hombros",
                            "goal" => "Hombros",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        16 => [
                            "image" => "img/exercises/exercise_56.jpg",
                            "name" => "Contactos a los hombros",
                            "goal" => "Brazos completos",
                            "time" => "2 series - 10 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        17 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 5:
                    $this->exercise = "Funcional y resistencia aerobica";
                    $this->description = null;
                    $this->time = 30;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686146646?h=ed4dfa2ea2";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging Fast",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente de glúteo",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        16 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 6:
                    $this->exercise = "Cardio Pecho";
                    $this->description = null;
                    $this->time = 41;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686146844?h=586e9b052d";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks ",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Skeeping bajo, medio y alto",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_46.jpg",
                            "name" => "Press inclinado con mancuernas",
                            "goal" => "Brazos",
                            "time" => "3 series 12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "3 series - 30 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Aperturas con mancuernas",
                            "goal" => "Especifico de pecho",
                            "time" => "3 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_22.jpg",
                            "name" => "Press declinado mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_24.jpg",
                            "name" => "Push ups con aperturas laterales",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 7:
                    $this->exercise = "Espalda";
                    $this->description = null;
                    $this->time = 43;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686147060?h=0b417cbabd";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps y jumping jacks",
                            "goal" => "Calentamiento general",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_18.jpg",
                            "name" => "Peso muerto con macuernas",
                            "goal" => "Especifico espalda",
                            "time" => "3 series - 12 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Extenciones pelvicas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo medio neutro con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_45.jpg",
                            "name" => "Jacks al frente",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexion de tronco lateral",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_33.jpg",
                            "name" => "Pendulos o balancines",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha alta rotacion de cadera",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo medio neutro con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 8:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 41;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg");
                    $this->video = "686147316?h=27ce9f8f69";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_57.jpg",
                            "name" => "Abdominales en bicicleta",
                            "goal" => "Abdomen",
                            "time" => "2 series - 125 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_58.jpg",
                            "name" => "Abdominales en tijera",
                            "goal" => "Abdomen",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Sit ups",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks al frente",
                            "goal" => "Resistencia",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_36.jpg",
                            "name" => "Flexion y extencion de rodillas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_.jpg",
                            "name" => "Body crunch",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha con brazos flexionados ",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_40.jpg",
                            "name" => "Plancha con brazos extendidos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Sit ups",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperacion",
                            "goal" => "Estiramiento",
                            "time" => "5 a 10 segundos",
                            "type" => "Recuperación",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                    ];
                    break;

                case 9:
                    $this->exercise = "Full body";
                    $this->description = null;
                    $this->time = 36;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686157891?h=fda3f7c9d6";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps, jumping jacks y sky flyes",
                            "goal" => "Calentamiento especifico",
                            "time" => "1 serie - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas estandar",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Trifuncional de biceps, hombro y triceps con macuernas",
                            "goal" => "Brazos",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_21.jpg",
                            "name" => "Press plano mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de la zona intermadia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales en crunch",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales estandar",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 10:
                    $this->exercise = "Pierna posterior";
                    $this->description = null;
                    $this->time = 49;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686158110?h=d45ca5739f";
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
                            "name" => "Skeeping bajo, medio y alto",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Elevaciones de talon o pantorrilas con carga de mancuernas",
                            "goal" => "Piernas y glúteo e isquiotibiales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Elevacion de gluteos con inclinacion de tronco anterior y flexion y extencion de rodillas",
                            "goal" => "Piernas y glúteo e isquiotibiales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps profundos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla sumo",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Estocadas alternadas",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Tijeras en avanzada y alternadas",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat a pierna cerrada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_54.jpg",
                            "name" => "Hipt thrust",
                            "goal" => "Especifico para piernas y gluteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 11:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 40;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686157149?h=cd29564672";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_44.jpg",
                            "name" => "Elevación frontal supino con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Vuelos con mancuernas lateral ",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Shoulder tabs (hombro y codo)",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Copa o flexion posterior de codos para triceps.",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha comandos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Shoulder tabs hombro",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 12:
                    $this->exercise = "Espalda";
                    $this->description = null;
                    $this->time = 47;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686157451?h=edb5dc934f";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 13:
                    $this->exercise = "Pecho";
                    $this->description = null;
                    $this->time = 33;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686157663?h=757cdb70d8";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps y jumping jacks",
                            "goal" => "Calentamiento general",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_26.jpg",
                            "name" => "Flexion de tronco anterior",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_27.jpg",
                            "name" => "Pull over",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexion de tronco lateral",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexiones de tronco lateral (alternados)",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga guerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyflies",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_30.jpg",
                            "name" => "Vuelos con tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_31.jpg",
                            "name" => "Jabs unilaterales",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Abduccion escapular tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_33.jpg",
                            "name" => "Pendulos o balancines",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 14:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 32;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686158463?h=be81b05552";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y continuo",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splits",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular del pecho en la zona intermedia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_21.jpg",
                            "name" => "Press plano mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de la zona intermadia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_22.jpg",
                            "name" => "Press declinado mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_24.jpg",
                            "name" => "Push ups con aperturas laterales",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 15:
                    $this->exercise = "Piernas Glúteos";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 43;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686158697?h=e1782cd54e";
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
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 16:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 32;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg");
                    $this->video = "686158985?h=6c989ab519";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Copa o flexion posterior de codos para triceps.",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Curl de biceps en supinacion con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_15.jpg",
                            "name" => "Elevacion frontal para hombro con mancuernas.",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_16.jpg",
                            "name" => "Flexion posterior unilateral para triceps con mancuernas",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicios",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_18.jpg",
                            "name" => "Remo al cuello con mancuerna para hombro",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos para triceps",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros",
                            "goal" => "",
                            "time" => "12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperacion",
                            "goal" => "Estiramiento",
                            "time" => "5 a 10 segundos",
                            "type" => "Recuperación",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                    ];
                    break;
                case 17:
                    $this->exercise = "Funcional y resistencia aerobica";
                    $this->description = null;
                    $this->time = 31;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686159222?h=9910927613";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales estandar",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales invertidas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_.jpg",
                            "name" => "Body crunch",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_35.jpg",
                            "name" => "Contactos a los tobillos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_36.jpg",
                            "name" => "Flexion y extencion de rodillas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Extenciones pelvicas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_38.jpg",
                            "name" => "Elevacion alternada de piernas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha con brazos flexionados ",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_40.jpg",
                            "name" => "Plancha con brazos extendidos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_41.jpg",
                            "name" => "Superman con flexion de tronco lateral",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 18:
                    $this->exercise = "Cardio Pecho";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 33;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "6686159465?h=b12946e5bb";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 19:
                    $this->exercise = "Espalda";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 35;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686159752?h=00b5574751";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;
                case 20:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 38;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686160026?h=f96227e5dc";
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
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;
                case 21:
                    $this->exercise = "Full Body";
                    $this->description = null;
                    $this->time = 51;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686160336?h=5f7b3837d3";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps y jumping jacks",
                            "goal" => "Calentamiento general",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_26.jpg",
                            "name" => "Flexion de tronco anterior",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_27.jpg",
                            "name" => "Pull over",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexion de tronco lateral",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexiones de tronco lateral (alternados)",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga guerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyflies",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_30.jpg",
                            "name" => "Vuelos con tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_31.jpg",
                            "name" => "Jabs unilaterales",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Abduccion escapular tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_33.jpg",
                            "name" => "Pendulos o balancines",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
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
        if ($this->level == 3) {
            switch ($day) {
                case 1:
                    $this->exercise = "Pierna posterior";
                    $this->description = null;
                    $this->time = 59;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686531795?h=173e52293b";
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
                            "name" => "Skeeping bajo, medio y alto",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Elevaciones de talon o pantorrilas con carga de mancuernas",
                            "goal" => "Piernas y glúteo e isquiotibiales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Elevacion de gluteos con inclinacion de tronco anterior y flexion y extencion de rodillas",
                            "goal" => "Piernas y glúteo e isquiotibiales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps profundos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla sumo",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Estocadas alternadas",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Tijeras en avanzada y alternadas",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat a pierna cerrada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_54.jpg",
                            "name" => "Hipt thrust",
                            "goal" => "Especifico para piernas y gluteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
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
                    $this->time = 45;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "686532097?h=147e951db7";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_44.jpg",
                            "name" => "Elevación frontal supino con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Vuelos con mancuernas lateral ",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Shoulder tabs (hombro y codo)",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Copa o flexion posterior de codos para triceps.",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha comandos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Shoulder tabs hombro",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 3:
                    $this->exercise = "Espalda";
                    $this->description = null;
                    $this->time = 48;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687116351?h=2b40e578fb";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 4:
                    $this->exercise = "Pecho";
                    $this->description = null;
                    $this->time = 47;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687118041?h=af3ecb2c90";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps y jumping jacks",
                            "goal" => "Calentamiento general",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_26.jpg",
                            "name" => "Flexion de tronco anterior",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_27.jpg",
                            "name" => "Pull over",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexion de tronco lateral",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexiones de tronco lateral (alternados)",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga guerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyflies",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_30.jpg",
                            "name" => "Vuelos con tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_31.jpg",
                            "name" => "Jabs unilaterales",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Abduccion escapular tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_33.jpg",
                            "name" => "Pendulos o balancines",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
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
                    $this->time = 48;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687118559?h=9cbb1e73c6";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y continuo",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splits",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular del pecho en la zona intermedia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_21.jpg",
                            "name" => "Press plano mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de la zona intermadia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_22.jpg",
                            "name" => "Press declinado mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_24.jpg",
                            "name" => "Push ups con aperturas laterales",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 6:
                    $this->exercise = "Piernas Glúteos";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 58;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687119016?h=30f53605bd";
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
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Senatdilla cruzada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Squats caminata lateralizada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_06.jpg",
                            "name" => "Puente para gluteo",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Elevaciones laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 7:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 45;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg");
                    $this->video = "687119445?h=e35bb3c0b4";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Copa o flexion posterior de codos para triceps.",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Curl de biceps en supinacion con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_15.jpg",
                            "name" => "Elevacion frontal para hombro con mancuernas.",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_16.jpg",
                            "name" => "Flexion posterior unilateral para triceps con mancuernas",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicios",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_18.jpg",
                            "name" => "Remo al cuello con mancuerna para hombro",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos para triceps",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros",
                            "goal" => "",
                            "time" => "12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperacion",
                            "goal" => "Estiramiento",
                            "time" => "5 a 10 segundos",
                            "type" => "Recuperación",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                    ];
                    break;
                case 8:
                    $this->exercise = "Funcional y resistencia aerobica";
                    $this->description = null;
                    $this->time = 38;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687119788?h=f63a8f9dd4";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales estandar",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales invertidas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_.jpg",
                            "name" => "Body crunch",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_35.jpg",
                            "name" => "Contactos a los tobillos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_36.jpg",
                            "name" => "Flexion y extencion de rodillas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Extenciones pelvicas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_38.jpg",
                            "name" => "Elevacion alternada de piernas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha con brazos flexionados ",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_40.jpg",
                            "name" => "Plancha con brazos extendidos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_41.jpg",
                            "name" => "Superman con flexion de tronco lateral",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 9:
                    $this->exercise = "Cardio Pecho";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 45;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687120182?h=1b0659acda";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 10:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 44;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687120581?h=0aca0aa5cb";
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
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Curl de biceps en supinacion con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_16.jpg",
                            "name" => "Copa bilateral para triceps en neutro con mancuernas.",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicios",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Patada posterior bilateral",
                            "goal" => "Triceps",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos para triceps",
                            "goal" => "Triceps",
                            "time" => "10 a 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "10 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_18.jpg",
                            "name" => "Remo al cuello con mancuerna para hombro",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_55.jpg",
                            "name" => "Elevaciones laterales para hombros",
                            "goal" => "Hombros",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        16 => [
                            "image" => "img/exercises/exercise_56.jpg",
                            "name" => "Contactos a los hombros",
                            "goal" => "Brazos completos",
                            "time" => "2 series - 10 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        17 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;
                case 11:
                    $this->exercise = "Pierna";
                    $this->description = null;
                    $this->time = 59;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687121114?h=39bb06f275";
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
                            "name" => "Skeeping bajo, medio y alto",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_14.jpg",
                            "name" => "Elevaciones de talon o pantorrilas con carga de mancuernas",
                            "goal" => "Piernas y glúteo e isquiotibiales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Elevacion de gluteos con inclinacion de tronco anterior y flexion y extencion de rodillas",
                            "goal" => "Piernas y glúteo e isquiotibiales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps profundos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla sumo",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Estocadas alternadas",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Tijeras en avanzada y alternadas",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Squat a pierna cerrada",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior unilateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_54.jpg",
                            "name" => "Hipt thrust",
                            "goal" => "Especifico para piernas y gluteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 12:
                    $this->exercise = "Espalda";
                    $this->description = null;
                    $this->time = 39;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687121576?h=63e924636a";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 13:
                    $this->exercise = "Abdominales";
                    $this->description = null;
                    $this->time = 00;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y continuo",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splits",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular del pecho en la zona intermedia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_21.jpg",
                            "name" => "Press plano mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de la zona intermadia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_22.jpg",
                            "name" => "Press declinado mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_24.jpg",
                            "name" => "Push ups con aperturas laterales",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Cardiovascular",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 14:
                    $this->exercise = "Full body";
                    $this->description = null;
                    $this->time = 44;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687122340?h=49cd645e64";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps, jumping jacks y sky flyes",
                            "goal" => "Calentamiento especifico",
                            "time" => "1 serie - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas estandar",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Trifuncional de biceps, hombro y triceps con macuernas",
                            "goal" => "Brazos",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_21.jpg",
                            "name" => "Press plano mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de la zona intermadia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales en crunch",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales estandar",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 15:
                    $this->exercise = "Cardio Glúteo";
                    $this->description = null;
                    $this->time = 52;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687122955?h=89de6c4029";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 16:
                    $this->exercise = "Brazos";
                    $this->description = null;
                    $this->time = 45;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687169569?h=beb4f83e92";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura y cierre",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_11.jpg",
                            "name" => "Press militar para hombro con mancuernas",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_44.jpg",
                            "name" => "Elevación frontal supino con mancuernas",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Vuelos con mancuernas lateral ",
                            "goal" => "Hombros",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Shoulder tabs (hombro y codo)",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Copa o flexion posterior de codos para triceps.",
                            "goal" => "Triceps",
                            "time" => "2 series - 20 segundos",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha comandos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_19.jpg",
                            "name" => "Fondos",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_10.jpg",
                            "name" => "Curl de biceps en neutro o martillo con mancuernas.",
                            "goal" => "Biceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_17.jpg",
                            "name" => "Curl de biceps en pronacion con mancuernas.",
                            "goal" => "Brazos",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Shoulder tabs hombro",
                            "goal" => "Full Body",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 17:
                    $this->exercise = "Full Body";
                    $this->description = null;
                    $this->time = 45;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687168804?h=96cefcb39b";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps y jumping jacks",
                            "goal" => "Calentamiento general",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_26.jpg",
                            "name" => "Flexion de tronco anterior",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_27.jpg",
                            "name" => "Pull over",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexion de tronco lateral",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_28.jpg",
                            "name" => "Flexiones de tronco lateral (alternados)",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Autocarga guerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyflies",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_30.jpg",
                            "name" => "Vuelos con tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_31.jpg",
                            "name" => "Jabs unilaterales",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_32.jpg",
                            "name" => "Abduccion escapular tronco inclinado",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_33.jpg",
                            "name" => "Pendulos o balancines",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 18:
                    $this->exercise = "Cardio Pierna";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 60;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687167757?h=b2a269af5d";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jack normales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Skyflies",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Skeeping medio",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Saltos laterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escaladores",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Desplazamiento lateral",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        15 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 19:
                    $this->exercise = "Full body";
                    $this->description = null;
                    $this->time = 43;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687167135?h=052523debc";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps, jumping jacks y sky flyes",
                            "goal" => "Calentamiento especifico",
                            "time" => "1 serie - 20 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas estandar",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 segundos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_29.jpg",
                            "name" => "Remo bajo con mancuernas",
                            "goal" => "Espalda",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_12.jpg",
                            "name" => "Trifuncional de biceps, hombro y triceps con macuernas",
                            "goal" => "Brazos",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros, codos y muñecas.",
                            "goal" => "Brazos",
                            "time" => "8 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_25.jpg",
                            "name" => "Push ups apoyo de rodillas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_21.jpg",
                            "name" => "Press plano mancuernas",
                            "goal" => "Pecho",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de la zona intermadia.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales en crunch",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales estandar",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_03.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;


                case 20:
                    $this->exercise = "Funcional y resistencia aerobica";
                    $this->description = null;
                    $this->time = 46;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687166481?h=ced531bbbe";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales estandar",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_34.jpg",
                            "name" => "Abdominales invertidas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_.jpg",
                            "name" => "Body crunch",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_35.jpg",
                            "name" => "Contactos a los tobillos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_36.jpg",
                            "name" => "Flexion y extencion de rodillas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Extenciones pelvicas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_38.jpg",
                            "name" => "Elevacion alternada de piernas",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_39.jpg",
                            "name" => "Plancha con brazos flexionados ",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_40.jpg",
                            "name" => "Plancha con brazos extendidos",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_41.jpg",
                            "name" => "Superman con flexion de tronco lateral",
                            "goal" => "Abdomen",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Estiramiento",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;

                case 21:
                    $this->exercise = "Pierna";
                    $this->description = null;
                    $this->time = 66;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687165476?h=02edf1e14e";
                    $this->trainings =[
                        1 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Activación general con trote y continuo",
                            "goal" => "Calentamiento general",
                            "time" => "1 serie - 3 a 5 minutos",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        2 => [
                            "image" => "img/exercises/exercise_02.jpg",
                            "name" => "Skeeping bajo, medio y alto",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 20 segundos",
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
                            "name" => "Sentadilla caminata lateral",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadilla zumo",
                            "goal" => "Abdominales",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Estocadas o sliderz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Frogs pumps",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos en apertura",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_54.jpg",
                            "name" => "Hipt thrust",
                            "goal" => "Especifico para piernas y gluteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Monkey jumps",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Abdominales",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Recuperación",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                    ];
                    break;




            }
        }
        if ($this->level == 4) {
            switch ($day) {
                case 1:
                    $this->exercise = "Extreme burppes wod";
                    $this->description = null;
                    $this->time = 33;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687216170?h=304eaecc7a";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas explosivas",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Frogs pumps",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],

                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;
                case 2:
                    $this->exercise = "Full-body";
                    $this->description = null;
                    $this->time = 46;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687216456?h=2ad84d0ce6";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "4 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas explosivas",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "SemiBurpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "4 series 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_47.jpg",
                            "name" => "Push ups cerradas (diamante)",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Frogs pumps",
                            "goal" => "Abdomen",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 3:
                    $this->exercise = "Full-body";
                    $this->description = null;
                    $this->time = 42;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687216798?h=99eb8b224a";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "4 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas explosivas",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "SemiBurpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "4 series 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_47.jpg",
                            "name" => "Push ups cerradas (diamante)",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Frogs pumps",
                            "goal" => "Abdomen",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 4:
                    $this->exercise = "Full-body";
                    $this->description = null;
                    $this->time = 45;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687217086?h=e2eb17c06c";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "4 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas explosivas",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "SemiBurpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "4 series 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_47.jpg",
                            "name" => "Push ups cerradas (diamante)",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Frogs pumps",
                            "goal" => "Abdomen",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 5:
                    $this->exercise = "Full-body";
                    $this->description = null;
                    $this->time = 40;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687217458?h=92548834a7";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "4 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas explosivas",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "SemiBurpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_13.jpg",
                            "name" => "Contactos a los hombros y codos.",
                            "goal" => "Brazos ",
                            "time" => "4 series 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la coordinacion, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_47.jpg",
                            "name" => "Push ups cerradas (diamante)",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_23.jpg",
                            "name" => "Skyjacks",
                            "goal" => "Cardiovascular",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Frogs pumps",
                            "goal" => "Abdomen",
                            "time" => "4 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 6:
                    $this->exercise = "Extreme burppes wod";
                    $this->description = null;
                    $this->time = 32;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687217776?h=689be2abc3";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        3 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Sentadillas explosivas",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        4 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 30 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_43.jpg",
                            "name" => "Caminata de manos",
                            "goal" => "Full Body",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_42.jpg",
                            "name" => "Burpees",
                            "goal" => "Calentamiento especifico",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Cardiovascular",
                            "comments" => array('Desarrollo de la capacidad aeróbica como base del entrenamiento.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Triceps",
                            "time" => "10 a 12 reps por ejercicio",
                            "type" => "Carga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de los brazos.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Burpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 12 repeticiones",
                            "type" => "Funcional",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_37.jpg",
                            "name" => "Frogs pumps",
                            "goal" => "Abdomen",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],

                        9 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;

                case 7:
                    $this->exercise = "Cardio Pierna";
                    $this->description = "Tren inferior - Extremidades inferiores";
                    $this->time = 48;
                    $this->difficulty = "Fácil";
                    $this->copy = "La combinación perfecta de ejercición para mejorar tu físico, flexibilidad y fuerza";
                    $this->equipments = array("Manta para ejercicio","Pesas 2 o 5 Kg","Silla pequeña");
                    $this->video = "687218026?h=24cac39954";
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
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Jumping jacks",
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
                            "image" => "img/exercises/exercise_01.jpg",
                            "name" => "Jogging",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        5 => [
                            "image" => "img/exercises/exercise_48.jpg",
                            "name" => "Escalones",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        6 => [
                            "image" => "img/exercises/exercise_04.jpg",
                            "name" => "Senatdilla explosiva",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las pantorrillas.')
                        ],
                        7 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Semiburpees",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        8 => [
                            "image" => "img/exercises/exercise_49.jpg",
                            "name" => "Estocadas o sliderz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        9 => [
                            "image" => "img/exercises/exercise_20.jpg",
                            "name" => "Splitz",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        10 => [
                            "image" => "img/exercises/exercise_50.jpg",
                            "name" => "Sentadilla isometrica",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Funcional y resistencia",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.','Desarrollo de la coordinación, equilibrio y agilidad.')
                        ],
                        11 => [
                            "image" => "img/exercises/exercise_05.jpg",
                            "name" => "Multisaltos",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 15 repeticiones",
                            "type" => "Autocarga y fuerza",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        12 => [
                            "image" => "img/exercises/exercise_08.jpg",
                            "name" => "Aperturas unilaterales",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        13 => [
                            "image" => "img/exercises/exercise_07.jpg",
                            "name" => "Patada posterior",
                            "goal" => "Para piernas y glúteos",
                            "time" => "2 series - 20 segundos",
                            "type" => "Resistencia muscular",
                            "comments" => array('Desarrollo de la fuerza y la resistencia muscular de las piernas.')
                        ],
                        14 => [
                            "image" => "img/exercises/exercise_09.jpg",
                            "name" => "Vuelta a la calma, recuperación",
                            "goal" => "Estiramiento de los músculos",
                            "time" => "1 serie - 1 a 2 minutos",
                            "type" => "Recuperación",
                            "comments" => array('Mejorar la flexibilidad, plasticidad, elasticidad y resistencia muscular.')
                        ],
                    ];
                    break;



            }
        }
    }

}
