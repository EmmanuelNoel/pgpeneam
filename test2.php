<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
function duplicate()
{
    var div = duplicate("div");
<div id="duplicater0"> 
duplicate EVERYTHING INSIDE THIS DIV
</div>
}


   var i = 0;

function duplicate() {
    var original = document.getElementById('duplicater' + i);
    var clone = original.cloneNode(true); //"deep" clone
   clone.id = "duplicater" + ++i; //there can only be one element with an ID
    clone.onclick = duplicate; //event handlers are not cloned
    original.parentNode.appendChild(clone);
}
</script>
</body>
</html>