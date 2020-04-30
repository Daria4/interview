<?php


namespace App;

use Core\CoreModel;
use Core\ServiceController;


class InterviewModel extends CoreModel
{
    public $interviewList = array();

    public function getInterviewList()
    {
        $sql = "SELECT Id, CONCAT_WS(\" \", SecondName, Name, ThirdName) as title FROM " . $this->table;

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $this->interviewList[] = $row;
        }
        return $this->interviewList;
    }
    public function addContact()
    {
        if (isset($_POST['btnAdd'])){

            $Name = $_POST['Name'];
            $SecondName = $_POST['SecondName'];
            $ThirdName = $_POST['ThirdName'];
            $Description = $_POST['Description'];


            $sql = "INSERT INTO ".$this->table." (Name, SecondName, ThirdName, Number) VALUES (:Name, :SecondName, :ThirdName, :Description)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(":Name", $Name, \PDO::PARAM_STR);
            $stmt->bindValue(":SecondName", $SecondName, \PDO::PARAM_STR);
            $stmt->bindValue(":ThirdName", $ThirdName, \PDO::PARAM_STR);
            $stmt->bindValue(":Description", $Description, \PDO::PARAM_INT);
            $stmt->execute();
            ServiceController::showAlert ('OK');
            ServiceController::goUri ('control/table/records');

        }else{
            echo 'incorrent';

        }
    }
}