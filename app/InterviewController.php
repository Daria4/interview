<?php


namespace App;



use App\InterviewModel ;
use App\InterviewView;

class InterviewController
{
    public $Model;
    public $View;

    public function __construct()
    {
        $this->Model = new InterviewModel ('interview');
        $this->View = new InterviewView();
    }
    public function showPostsForUser ()
    {
        $interview = $this->Model->getInterviewList ();
        $this->View->showPosts ($interview);
    }


}
