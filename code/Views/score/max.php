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
            <th>User Name</th>
            <th>Skill</th>
            <th>Max</th>
        </tr>
        <?php foreach($data as $val) : ?>
        <tr>
            <td><?php echo $val['user_name'] ?></td>
            <td><?php echo $val['skill_name'] ?></td>
            <td><?php echo $val['max'] ?></td>
        </tr>
        <?php endforeach ?>
    </table> 
</body>
</html>