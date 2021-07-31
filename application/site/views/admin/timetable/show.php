<form action = "/admin/timetable/edit/<?php echo $data['id']; ?>" method = "POST">

    
    
    <?php for($i = 0; $i < 5; ++$i): ?>

        <table border = "1px">

            <tr><th> <?php echo Subjects::toDay($i); ?> </th>
            <th> Предмет </th>
            <th> Вчитель </th></tr>

            <?php foreach($data["timetable"][$i] as $n => $table): ?>
            
                <tr> 
                <td> <?php echo ($n + 1); ?> </td>
                <td> <input type = "text" value = <?php $info = explode(":", $table); echo ($info[1]); ?> name = "timetable_<?php echo $i; ?>_<?php echo $n; ?>_teacher" required> </td>
                <td> <input type = "text" value = <?php echo ($info[1]); ?> name = "timetable_<?php echo $i; ?>_<?php echo $n; ?>_subject" required> </td>
                </tr>

            <?php endforeach; ?>

        </table><br /><br />

    <?php endfor; ?>

    <p> <input type = "submit" name = "send"> </p>

</form>
