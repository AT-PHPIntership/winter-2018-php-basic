<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    <tr>
    <?php
    foreach($data as $row){
    ?>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
    <?php
    }
    ?>
    </tr>
</table>
