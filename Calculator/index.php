<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <h1>SIMPLE CALCULATOR</h1>
    <form name="calc" action="actions.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="input1">First number</label><br>
                    <input type="number" name="input1" id="input1">
                </td>
                <td>
                    <label for="input2">Second number</label><br>
                    <input type="number" name="input2" id="input2">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <input type="submit" value="+" name="operator">
                <input type="submit" value="-" name="operator">
                <input type="submit" value="*" name="operator">
                <input type="submit" value="/" name="operator">
                </td>
            </tr>
        </table>    
    </form>
    
</body>
</html>