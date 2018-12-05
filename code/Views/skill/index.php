<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    
    <?php
    foreach($data as $row){
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
    </tr>
    <?php
    }
    ?>
</table>
