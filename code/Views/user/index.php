<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>ProvinceId</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["provinceId"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>