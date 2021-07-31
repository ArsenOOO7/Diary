<h1> Класи </h1>

<a href = "/admin/classes/add"> Додати клас </a>

<table border = "1px">

    <tr>

        <th> ID </th>
        <th> Клас </th>
        <th> Буква </th>
        <th> Кількість учнів </th>
        <th> Класний наставник </th>
        <th> Учні </th>
        <th> Редагувати </th>
        <th> Видалити </th>

    </tr>

    <?php foreach($data["data"] as $class): ?>

        <tr>

            <td> <?php echo $class["id"]; ?> </td>
            <td> <?php echo $class["class"]; ?> </td>
            <td> <?php echo $class["letter"]; ?> </td>
            <td> <?php echo $class["students"]; ?> </td>
            <td> <?php 
            
            $teacher = Users::getFullName($class["teacher_id"]);
            echo $teacher; 
            
            ?> </td>
            <td> <a href = "/admin/classes/students/<?php echo $class["id"];?>"> Учні </a></td>
            <td> <a href = "/admin/classes/show/<?php echo $class["id"];?>"> Редагувати </a></td>
            <td> <a href = "/admin/classes/delete/<?php echo $class["id"];?>"> Видалити </a></td>

        </tr>

    <?php endforeach; ?>

</table>