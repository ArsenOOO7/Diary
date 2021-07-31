

<form action = "/admin/timetable/add" method = "POST">

    <p> Добавити розклад для <input type = "text" name = "class" placeholder = "ID класа" required> </p>
    <p> <input type = "submit" name = "send">

</form>

<table border = "1px">

    <tr>
    <th> ID класа </th>
    <th> Редагувати </th>
    </tr>

    <?php foreach($data["classes"] as $class): ?>

    <tr>
    <td> <?php echo $class["id"]; ?> </td>
    <td> <a href = "/admin/timetable/show/<?php echo $class["id"]; ?>"> Редагувати </td>
    </tr>

    <?php endforeach; ?>

</table>