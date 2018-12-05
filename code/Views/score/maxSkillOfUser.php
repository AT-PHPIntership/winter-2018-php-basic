<table border="1">
    <tr>
        <th>User_name</th>
        <th>Skill_name</th>
        <th>Sk_score</th>
    </tr>    
    <?php
    foreach($data as $row){
    ?>
    <tr>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['skill_name']; ?></td>
        <td><?php echo $row['sk_score']; ?></td>
    </tr>
    <?php
    }
    ?>
</table>
