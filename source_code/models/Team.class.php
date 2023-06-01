<?php

class Team extends DB
{
    function getTeam()
    {
        $query = "SELECT * FROM team";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];
        $sport_type = $data['tsport_type'];

        $query = " INSERT INTO `team`(`name`, `sport_type`) VALUES ('$name', '$sport_type')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM team WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $name = $data["tname"];
        $sport_type = $data["tsport_type"];
        $id = $data["id_edit"];

        $query = "update team set name='$name', sport_type='$sport_type' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}