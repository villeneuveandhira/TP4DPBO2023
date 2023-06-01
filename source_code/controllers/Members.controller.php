<?php

// import
include_once("models/Members.class.php");
include_once("models/Team.class.php");
include_once("views/Members.view.php");
include_once("Connection.php");

class MembersController
{
    // att
    private $members;
    private $team;

    // constructor
    function __construct()
    {
        $this->members = new Members(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->team = new Team(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    // method
    public function index()
    {
        $this->members->open();
        $this->team->open();
        $this->members->getMembers();
        $this->team->getTeam();
        $data = array();
        while($row = $this->members->getResult()){
        array_push($data, $row);
        }

        $dataTeam = array();
        while($row = $this->team->getResult()){
        array_push($dataTeam, $row);
        }

        $this->members->close();
        $this->team->close();

        $view = new MembersView();
        $view->render($data, $dataTeam);
    }

    public function addForm()
    {
        $this->team->open();
        $this->team->getTeam();

        $dataTeam = array();
        while($row = $this->team->getResult()){
        array_push($dataTeam, $row);
        }

        $this->team->close();

        $view = new MembersView();
        $view->listTeam($dataTeam);
    }

    public function editForm($id)
    {
        $this->members->open();
        $this->team->open();
        $this->members->getMembers();
        $this->team->getTeam();
        $data = array();
        while($row = $this->members->getResult()){
        array_push($data, $row);
        }

        $dataTeam = array();
        while($row = $this->team->getResult()){
        array_push($dataTeam, $row);
        }

        $this->members->close();
        $this->team->close();

        $view = new MembersView();
        $view->editMember($id, $data, $dataTeam);
    }

    function add($data)
    {
        $this->members->open();
        $this->members->add($data);
        $this->members->close();
        
        header("location:index.php");
    }

    function edit($id)
    {
        $this->members->open();
        $this->members->edit($id);
        $this->members->close();
        
        header("location:index.php");
    }

    function delete($id){
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();
        
        header("location:index.php");
    }


}