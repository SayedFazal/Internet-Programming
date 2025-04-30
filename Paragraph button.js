<!--Create an HTML page with a paragraph and a button. When the user clicks the button, use JavaScript to change the paragraph text to &quot;You clicked the button!&quot;.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOM</title>
    <script>
      function changetext(){
        document.getElementById("myParagraph").innerText="You Clicked The Button";
      }
    </script>
</head>
<body>
    <p id="myParagraph">This is the original paragraph</p>
    <button onclick="changetext()">click me</button>
</body>
</html>
