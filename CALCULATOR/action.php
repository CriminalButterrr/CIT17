<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $first_num = $_POST['input1'];
        $second_num = $_POST['input2'];
        switch ($_POST['operation']){
            case "add":
                $result = $first_num + $second_num;
                break;
            case "subtract":
                $result = $first_num - $second_num;
                break;
            case "multiply":
                $result = $first_num * $second_num;
                break;
            case "divide":
                $result = $first_num / $second_num;
                break;
        }
        

        echo $result;
    ?>
</body>
</html>