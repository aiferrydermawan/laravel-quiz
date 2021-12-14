<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question as QuestionModel;

class Question extends Component
{
    public $status;
    public $question;
    public $priority;
    public $total_questions;

    public $mySelected;
    public $correct;

    public function mount()
    {
        $this->status = 'instruction';
        $this->priority = 1;
        $this->correct = 0;
        $this->mySelected = NULL;
        $this->total_questions = QuestionModel::count();
    }

    public function render()
    {
        $this->question = QuestionModel::where('priority' ,$this->priority)->first();
        return view('livewire.question');
    }

    public function changeStatus($status)
    {
        // instruction, start, finish
        $this->status = $status;
    }

    public function choiceOption($index)
    {
        $this->mySelected = $index;
    }

    public function nextQuestion()
    {
        if($this->mySelected == $this->question->correct){
            $this->correct++;
        }

        if($this->priority < $this->total_questions){
            $this->priority++;
            $this->mySelected = NULL;
        }else{

            // Last Action
            $this->status = 'finish';
        }
    }
}
