<table border="1">
    <tr>
        <th>Name</th>
        <th>Year</th>
        <th>Gender</th>
        <th>Score</th>
        <th>Pronvice</th>
    </tr>
    <tr>
    <?php
    foreach($data as $row){
    ?>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['year']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['point']; ?></td>
        <td><?php echo $row['province_name']; ?></td>

    <?php
    }
    ?>
    </tr>
</table>
