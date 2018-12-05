<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Year</th>
            <th>Province</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["year"]; ?></td>
            <td><?php echo $row["province"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
