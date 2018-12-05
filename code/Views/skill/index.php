<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show user has stored</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Name</th>
        </tr>
        <?php foreach($data as $val) : ?>
        <tr>
            <td><?php echo $val['name'] ?></td>
        </tr>
        <?php endforeach ?>
    </table> 
</body>
</html>