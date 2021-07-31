<h1> Вчитель (ID: <?php echo $data["id"]; ?>) </h1>
<form action = "/admin/teachers/edit/<?php echo $data['id']; ?>" method = "POST">

    <p> Ім'я </p>
    <p> <input type = "text" value = <?php echo $data["teacher"]->name; ?> name = "name"> </p>
    <p> По-батькові </p>
    <p> <input type = "text" value = <?php echo $data["teacher"]->fname; ?> name = "fname"> </p>
    <p> Прізвище </p>
    <p> <input type = "text" value = <?php echo $data["teacher"]->surname; ?> name = "surname"> </p>
    <p> Предмети (<a href = "/admin/subjects" target = "blank"> id </a>) </p>
    <p> <input type = "text" value = <?php echo implode(",", $data["subjects"]); ?> name = "schoolsubjects"> </p>
    <br>
    <p> <input type = "submit" name = "send"> </p>

</form>