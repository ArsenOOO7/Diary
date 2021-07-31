<a href = "/admin/subjects/add"> Додати </a>

<table border = "1px">

    <tr>

        <th> ID </th>
        <th> Назва </th>
        <th> Редагувати </th>
        <th> Видалити </th>

    </tr>


    <?php foreach($data["data"] as $class): ?>
    <tr>
        
        <td> <?php echo $class["id"]; ?> </td>
        <td> <?php echo $class["name"]; ?> </td>
        <td> <a href = "/admin/subjects/show/<?php echo $class['id']; ?>"> Редагувати </a></td>
        <td> <a href = "/admin/subjects/delete/<?php echo $class['id']; ?>"> Видалити </a></td>

    </tr>

    <?php endforeach; ?>

</table>