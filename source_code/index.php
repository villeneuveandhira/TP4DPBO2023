<?php

// import
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['add'])) {
    $members->add($_POST);
} else if (!empty($_GET['addForm'])) {
    $members->addForm();
} else if (!empty($_GET['editForm'])) {
    $members->editForm($_GET['editForm']);
} else if (!empty($_GET['id_delete'])) {
    $id = $_GET['id_delete'];
    $members->delete($id);
} else if (isset($_POST['edit'])) {
    $members->edit($_POST);
} else {
    $members->index();
}


?>