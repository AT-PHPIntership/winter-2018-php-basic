<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show score has stored</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Skill</th>
            <th>Average of Skill</th>
            <th>User to learn</th>
        </tr>
        <?php foreach($data as $val) : ?>
        <tr>
            <td><?php echo $val['skil_name'] ?></td>
            <td><?php echo $val['avg'] ?></td>
            <td><?php echo $val['group_user'] ?></td>
        </tr>
        <?php endforeach ?>
    </table> 
</body>
</html>