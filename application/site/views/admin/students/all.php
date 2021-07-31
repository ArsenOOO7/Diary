<form action = "/admin/classes/sstore/<?php echo $data["class"]->id; ?>" method = "POST">


<table border = "1px">

<tr>

    <th> ID </th>
    <th> Прізвище </th>
    <th> Ім'я </th>
    <th> По-батькові </th>

</tr>

<?php for($i = 0; $i < $data["class"]->students; ++$i): ?>

<tr>

    <td> <input type = "text" value = <?php echo $data["students"][$i]["id"]; ?> name = "student_<?php echo $i; ?>_id" readonly>  </td>
    <td> <input type = "text" value = <?php echo $data["students"][$i]["surname"]; ?> name = "student_<?php echo $i; ?>_surname" required> </td>
    <td> <input type = "text" value = <?php echo $data["students"][$i]["name"]; ?> name = "student_<?php echo $i; ?>_name" required> </td>
    <td> <input type = "text" value = <?php echo $data["students"][$i]["fname"]; ?> name = "student_<?php echo $i; ?>_fname" required> </td>

</tr>

<?php endfor; ?>

</table>

<p> <input type = "submit" name = "send"> </p>

</form>