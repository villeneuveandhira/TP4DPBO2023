<?php

class MembersView
{
    public function render($data, $dataTeam)
    {
        $num = 1;
        $dataMembers = null;
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $reg_date, $id_team) = $val;
            $nama_team = '';
            $id_member = $id;
            foreach ($dataTeam as $club) {
                list($id, $nama) = $club;
                if ($id == $id_team) {
                    $nama_team = $nama;
                    break;
                }
            }
            $dataMembers .= "<tr>
                <td>" . $num++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $reg_date . "</td>
                <td>" . $nama_team . "</td>
                <td>
                <a href='index.php?editForm=" . $id_member ."' class='btn btn-success''>Edit</a>
                <a href='index.php?id_delete=" . $id_member . "' class='btn btn-danger''>Delete</a>
                </td>
                </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }

    public function listTeam($dataTeam)
    {
        $listTeam = null;
        foreach ($dataTeam as $val) {
            list($id, $nama) = $val;
            $listTeam .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("templates/createMember.html");
        $tpl->replace("OPTION", $listTeam);
        $tpl->write();
    }

    public function editMember($idMember, $data, $dataTeam)
    {
        $dataMember = null;
        $teamMember = 0;
        foreach($data as $val)
        {
            list($id, $name, $email, $phone, $reg_date, $id_team) = $val;
            if($idMember == $id) {
                $dataMember .= 
                "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='tnama' value='$name' class='form-control'> <br>
                <label> EMAIL: </label>
                <input type='text' name='temail' value='$email' class='form-control'> <br>
                <label> PHONE: </label>
                <input type='text' name='tphone' value='$phone' class='form-control'> <br>
            ";
            $teamMember = $id_team;
            break;
            }
        }
        
        $listTeam = null;
        foreach ($dataTeam as $val) {
            list($id, $nama) = $val;
            if($id == $teamMember) {
                $listTeam .= "<option selected value='" . $id . "'>" . $nama . "</option>";
            }
            else {
                $listTeam .= "<option value='" . $id . "'>" . $nama . "</option>";
            }
        }

        $tpl = new Template("templates/editMember.php");
        $tpl->replace("FORM_MEMBER", $dataMember);
        $tpl->replace("TEAM_MEMBER", $listTeam);
        $tpl->write();
    }
}