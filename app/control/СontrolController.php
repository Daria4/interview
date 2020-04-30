<?php


namespace Control;



use App\InterviewModel;
use Core\ServiceController as S;


class СontrolController
{
    public $View;
    public $Interview;

    public function __construct ()
    {

        $this->View = new ControlView();
        $this->Interview = new InterviewModel('interview');
        $this->checkAuth();

    }
    public  function checkAuth()
    {
        if (S::checkAuth() == false) {
            $this->View->showLoginForm();
            exit();
        }
    }

    public function login()
    {
        S::logIn();
    }
    public function logout()
    {
        S::logOut();
    }

    public function showTable ()
    {
        $interview = $this->Interview->getInterviewList();
        $this->View->showTable ($interview);
    }

    public function add ()
    {
        $this->Interview->add ();
    }

    public function showFormAdd ()
    {
        $this->View->showFormAdd ();
    }




}