<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tnama'];
        $email = $data['temail'];
        $phone = $data['tphone'];
        $id_team = $data['tid_team'];

        $query = " INSERT INTO `members`(`name`, `email`, `phone`, `id_team`) VALUES ('$name', '$email', '$phone', '$id_team')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $name = $data["tnama"];
        $email = $data["temail"];
        $phone = $data["tphone"];
        $id_team = $data['tid_team'];
        $id = $data["id_edit"];
        
        $query = "update members set name='$name', email='$email', phone='$phone', id_team='$id_team' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}