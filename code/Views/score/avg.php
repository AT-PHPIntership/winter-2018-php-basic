<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>AvgScore</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["avg_score"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>