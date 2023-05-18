<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/shop.js"></script>
</head>
<body>
Shopping List
<hr/>
<form method="post" action="create">
    Name:
    <input name="name"/><br/>
    Qty:
    <input name="qty"/><br/>
    <input type="submit">
</form>

<table id="list" class="display" style="width:100%">
    <thead>
        <th>id</th>
        <th>name</th>
        <th>qty</th>
        <th>done</th>
        <th></th>
    </thead>
</table>

</body>
</html>
