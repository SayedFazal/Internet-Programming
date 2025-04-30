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
