<?php

// import
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Team.controller.php");

$team = new TeamController();

if (isset($_POST['add'])) {
    //memanggil add
    $team->add($_POST);
}
else if (!empty($_GET['id_delete'])) {
    //memanggil add
    $id = $_GET['id_delete'];
    $team->delete($id);
}
else if (isset($_POST['edit'])) {
    $team->edit($_POST);
}
else{
    $team->index();
}


?>