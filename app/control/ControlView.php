<?php


namespace Control;



use Core\CoreView;


class ControlView extends CoreView
{


    public function showTable($interview)
    {
        echo $this->twig->render('shablon/main/pages/post.html',['interview'=>$interview]);
    }

    public function showFormAdd($interview)
    {
        echo $this->twig->render('shablon/main/pages/add.html',['interview' => $interview]);
    }

    public function showLoginForm()
    {
        echo $this->twig->render('shablon/main/pages/login.twig');
    }

}