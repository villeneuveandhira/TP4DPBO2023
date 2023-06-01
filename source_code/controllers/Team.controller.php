<?php

// import
include_once("models/Team.class.php");
include_once("views/Team.view.php");
include_once("Connection.php");

class TeamController
{
  private $team;

  function __construct()
  {
    $this->team = new Team(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
  }

  public function index()
  {
    $this->team->open();
    $this->team->getTeam();
    $data = array();
    while($row = $this->team->getResult()){
      array_push($data, $row);
    }

    $this->team->close();

    $view = new TeamView();
    $view->render($data);
  }

  
  function add($data)
  {
    $this->team->open();
    $this->team->add($data);
    $this->team->close();
    
    header("location:team.php");
  }

  function edit($id)
  {
    $this->team->open();
    $this->team->edit($id);
    $this->team->close();
    
    header("location:team.php");
  }

  function delete($id)
  {
    $this->team->open();
    $this->team->delete($id);
    $this->team->close();
    
    header("location:team.php");
  }


}