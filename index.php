<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="number" name="num1" placeholder="Num One" required>
        <label for="operator">Select a Operator : </label>
        <select name="operator">
            <option>none</option>
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divided">/</option>
        </select>
        <input type="number" name="num2" placeholder="Num Two" required>

        <button type="submit">Submit</button>



        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT);
            $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = $_POST["operator"];

            $errors = false;

            if (empty($num1) || empty($num2) || empty($operator)) {
                echo "<p style='color:red;'>Please Fill UP.</p>";
                $errors = true;
            }
            if (!is_numeric($num1) || !is_numeric($num2)) {
                echo "<p style='color:red;' class='red'>Please Fill UP a Number.</p>";
                $errors = true;
            }

            if (!$errors) {
                $value = 0;
                switch ($operator) {
                    case 'add':
                        $value = $num1 + $num2;
                        break;
                    case 'subtract':
                        $value = $num1 - $num2;
                        break;
                    case 'multiply':
                        $value = $num1 * $num2;
                        break;
                    case 'divided':
                        $value = $num1 / $num2;
                        break;

                    default:
                        echo "<p style='color:red;'>Something Went Wrong.</p>";
                }

                echo "<p style='color:green;'> Result is = " . $value . "</p>";
            }
        }
        ?>
    </form>




</body>

</html>