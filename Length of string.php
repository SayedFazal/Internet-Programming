<%-- Write Php program to calculate the length of a string and check if the string contains a character or a word ? --%>
<?php
$text = "Welcome to PHP programming";
echo "Original String: " . $text . "<br>";
$length = strlen($text);
echo "Length of the string: " . $length . "<br>";
$charToFind = "P";
if (strpos($text, $charToFind) !== false) {
    echo "The character '$charToFind' is found in the string.<br>";
} else {
    echo "The character '$charToFind' is NOT found in the string.<br>";
}
$wordToFind = "programming";
if (strpos($text, $wordToFind) !== false) {
    echo "The word '$wordToFind' is found in the string.<br>";
} else {
    echo "The word '$wordToFind' is NOT found in the string.<br>";
}
?>
