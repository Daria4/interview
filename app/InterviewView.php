<?php


namespace App;


use Core\CoreView;

class InterviewView extends CoreView
{

    public function showPostsForUser($interview)
    {
        echo $this->twig->render('shablon\main\pages\post.html',['interview'=>$interview]);
    }



}