<form method = "POST" action = "/admin/teachers/store/<?php echo $data['count']; ?>">

    <?php for($i = 0; $i < $data["count"]; ++$i): ?>

        <input type = "text" name = "teacher_name_<?php echo $i; ?>" required>
        <input type = "text" name = "teacher_fname_<?php echo $i; ?>" required>
        <input type = "text" name = "teacher_surname_<?php echo $i; ?>" required>
        <input type = "text" name = "teacher_subjects_<?php echo $i; ?>" size = "20" required><br /><br />

    <?php endfor; ?>

    <input type = "submit" name = "send">

</form>