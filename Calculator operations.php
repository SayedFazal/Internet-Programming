<?php
$num1 = 10;
$num2 = 5;
$operator = "+"; // Change to -, *, or / as needed
switch ($operator) {
    case "+":
        $result = $num1 + $num2;
        echo "Addition: $num1 + $num2 = $result";
        break;
    case "-":
        $result = $num1 - $num2;
        echo "Subtraction: $num1 - $num2 = $result";
        break;
    case "*":
        $result = $num1 * $num2;
        echo "Multiplication: $num1 * $num2 = $result";
        break;
    case "/":
        if ($num2 != 0) {
            $result = $num1 / $num2;
            echo "Division: $num1 / $num2 = $result";
        } else {
            echo "Error: Division by zero is not allowed.";
        }
        break;
    default:
        echo "Invalid operator!";
}
?>
