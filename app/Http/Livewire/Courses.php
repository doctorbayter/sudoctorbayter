<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Courses extends Component
{


    public $course, $lesson, $current;

    public function mount($course, $lesson){

        $this->course = $course;
        $this->lesson = $lesson;
        $this->setCurrent();
    }

    public function render()
    {
        return view('livewire.courses');
    }

    //Métodos
    public function setCurrent(){
        if($this->lesson < 1 || $this->lesson <=5 ){
            $this->current = $this->lesson;
            return;
        }
        if ($this->current === null) {
            $this->current = 5;
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
