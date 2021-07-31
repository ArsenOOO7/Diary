<form method = "POST" action = "/admin/teachers/add">

    <p> Добавити </p>
    <p> <input type = "text" name = "count" required> вчителів </p>

    <p> <input type = "submit" name = "send"> </p>

</form>

<table border = "1px">

    <tr>

        <th> ID </th>
        <th> Ім'я </th>
        <th> Прізвище </th>
        <th> По-батькові </th>
        <th> Предмети </th>
        <th> Логін </th>
        <th> Пароль </th>
        <th> Редагувати </th>
        <th> Видалити </th>

    </tr>


    <?php foreach($data["data"] as $teacher): ?>
    <tr>
        
        <td> <?php echo $teacher["id"]; ?> </td>
        <td> <?php echo $teacher["name"]; ?> </td>
        <td> <?php echo $teacher["surname"]; ?> </td>
        <td> <?php echo $teacher["fname"]; ?> </td>
        <td> <?php echo implode(", ", $teacher["subjects"]); ?> </td>
        <td> <?php echo $teacher["login"]; ?> </td>
        <td> <?php echo $teacher["password"]; ?> </td>
        <td> <a href = "/admin/teachers/show/<?php echo $teacher['id']; ?>"> Редагувати </a></td>
        <td> <a href = "/admin/teachers/delete/<?php echo $teacher['id']; ?>"> Видалити </a></td>

    </tr>

    <?php endforeach; ?>

</table>