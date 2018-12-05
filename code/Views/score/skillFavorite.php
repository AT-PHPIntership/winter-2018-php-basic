<table border="1">
    <tr>
        <th>Skill_name</th>
        <th>Group_user_name</th>
    </tr>    
    <?php
    foreach($data as $row){
    ?>
    <tr>
        <td><?php echo $row['skill_name']; ?></td>
        <td><?php echo $row['group_user_name']; ?></td>
    </tr>
    <?php
    }
    ?>
</table>