<form action = "/admin/classes/edit/<?php echo $data['id'];?>" method = "POST">

    <p> Клас (1, 2, 3, 4...) </p>
    <p> <input type = "text" value = <?php echo $data["class"]->class; ?> name = "class" required> </p>
    <p> Літера (а, б, в) </p>
    <p> <input type = "text" value = <?php echo $data["class"]->letter; ?> name = "letter" required> </p>
    <p> Кількість учнів </p>
    <p> <input type = "text" value = <?php echo $data["class"]->students; ?> name = "students" required> </p>
    <p> Класний наставник </p>
    <p> <input type = "text" value = <?php echo $data["class"]->teacher_id; ?> name = "teacher_id" required> </p>

    <p> <input type = "submit" name = "send"> </p>

</form>