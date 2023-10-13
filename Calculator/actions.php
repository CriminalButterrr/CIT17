

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Results</title>
</head>
<body>
    <h1>SIMPLE CALCULATOR</h1>
    <?php
        $result;
        $operator;
        $first_num = $_POST['input1'];
        $second_num = $_POST['input2'];
        
        if (isset($_POST['operator']))
        {
            $operator = $_POST['operator'];
        }

        switch ($operator)
        {
            case "+":
                $result = $first_num + $second_num;
                break;
            case "-":
                $result = $first_num - $second_num;
                break;
            case "*":
                $result = $first_num * $second_num;
                break;
            case "/":
                $result = $first_num / $second_num;
        }
    ?>
    <table>
            <tr>
                <td>
                    <label for="input1">First number</label><br>
                    <input type="number" name="input1" id="input1" placeholder="<?php echo $first_num?>" disabled>
                </td>
                <td>
                    <label for="input2">Second number</label><br>
                    <input type="number" name="input2" id="input2" placeholder="<?php echo $second_num?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                <label for="result">Result</label><br>
                <input type="number" name="result" id="result" placeholder="<?php echo $result?>" disabled>
                </td>
            </tr>
        </table>    

    <form action="index.php" method="post">
        <input type="submit" value="GO BACK">
    </form>
</body>
</html>