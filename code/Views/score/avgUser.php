<table border="1">
    <tr>
        <th>User_name</th>
        <th>Score_avg</th>
        <th>Group_skill_name</th>
    </tr>    
    <?php
    foreach($data as $row){
    ?>
    <tr>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['score_avg']; ?></td>
        <td><?php echo $row['group_skill_name']; ?></td>
    </tr>
    <?php
    }
    ?>
</table>
