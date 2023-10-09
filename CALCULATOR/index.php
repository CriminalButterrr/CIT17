<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>BASIC CALCULATOR</h1>
<form action="action.php" method="post">
    <label for="input1">First Input: </label>
    <input type="number" name="input1" id="input1">
    <label for="input2">Second Input: </label>
    <input type="number" name="input2" id="input2">

    <label for="operation">OPERATION</label>
    <select name="operation" id="operation">
        <option value="add">ADD (+)</option>
        <option value="subtract">SUBTRACT (-)</option>
        <option value="multiply">MULTIPLY (*)</option>
        <option value="divide">DIVIDE (/)</option>
    </select>

    <button type="submit">CALCULATE</button>
</form>

</body>
</html>