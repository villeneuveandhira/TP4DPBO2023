<?php

class TeamView
{
    public function render($data)
    {
    $num = 1;
    $dataTeam = null;
    foreach($data as $val) {
        list($id, $name, $sport_type) = $val;
        $dataTeam .= "<tr>
                <td>" . $num++ . "</td>
                <td>" . $name . "</td>
                <td>" . $sport_type . "</td>
                <td>
                <a href='./templates/editTeam.php?id=" . $id . "&name=" . $name . "&sport_type=" . $sport_type . "' class='btn btn-success''>Edit</a>
                <a href='team.php?id_delete=" . $id . "' class='btn btn-danger''>Delete</a>
                </td>
                </tr>";
        }
        $template = new Template("templates/team.html");
        $template->replace("DATA_TABEL", $dataTeam);
        $template->write();
    }
}


?>