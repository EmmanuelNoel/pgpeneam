<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button id="button" onclick="duplicate()">Click me</button>
<div id="duplicater"> 
    duplicate EVERYTHING INSIDE THIS DIV
</div>

<script>
    var i = 0;
var original = document.getElementById('duplicater');

function duplicate() {
    var clone = original.cloneNode(true); //"deep" clone
    clone.id = "duplicater" + ++i;
    //or clone.id = ""; if the divs don't need an ID
    original.parentNode.appendChild(clone);
}
</script>
</body>
</html>