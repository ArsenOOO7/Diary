<form method = "POST" action = "/admin/subjects/edit/<?php echo $data['id'];?>">

    <p> <input type = "text" name = "name" placeholder = <?php echo $data["name"]; ?> required> Назва </p>
    <p> <input type = "submit" name = "send"> </p>

</form>