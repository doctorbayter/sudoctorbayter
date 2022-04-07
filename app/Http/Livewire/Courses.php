<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Courses extends Component
{


    public $course, $lesson, $current;
    public $content = [
        'id'=> 1,
        'iframe'=> '<iframe src="https://player.vimeo.com/video/560031202" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>',
        'title'=> 'title',
        'name'=> null,
        'description' => [
            'name' => null,
        ],
        'teacher'=> [
            'name' => 'Dr. Bayter',
            'profile_photo_url' => null
        ],
        'sections' => [
            1 => [
                'name' => null,
                'lessons' => [
                    1 => [
                        'id' => 1,
                        'name' => null,
                        'duration' => 0,
                        'resource' => null
                    ],
                    2 => [
                        'id' => 2,
                        'name' => null,
                        'duration' => 0,
                        'resource' => null
                    ],
                    3 => [
                        'id' => 3,
                        'name' => null,
                        'duration' => 0,
                        'resource' => null
                    ]
                ]
            ],

        ],
        'time'=> 0
    ];

    public function mount($course, $lesson){

        $this->course = $course;
        $this->lesson = $lesson;
        $this->setCurrent();

    }

    public function render()
    {

        return view('livewire.courses.etiquetas');
    }

    //Métodos
    public function setCurrent(){

        if($this->lesson > 0 || $this->lesson <=5 ){
            $this->current = $this->lesson;
        }
        if ($this->current === null) {
            $this->current = 5;
        }
        if($this->current == 1){
            $this->content['iframe'] = '<iframe src="https://player.vimeo.com/video/560031202" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }


    }

    public function changeLesson($lesson){
        $this->current = $lesson;
        return redirect()->route('courses.lesson', [$this->course, $lesson]);
    }

    public function getPreviousProperty(){
        if($this->index == 0){
            return null;
        }
        else{
           return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty(){
        if ($this->index == $this->course->lessons->count()-1) {
           return null;
        }
        else{
           return $this->course->lessons[$this->index + 1];
        }
    }
}
