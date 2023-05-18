<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/shop.js"></script>
</head>
<body>
<div class="container">
    <p id="success"></p>
    <div class="table-wrapper">
        <div class="table-title">
            <h3>Shopping List</h3>
        </div>

        <hr/>
        <form method="post" action="create">
            Name:
            <input class="form-control" name="name"/><br/>
            Qty:
            <input class="form-control" name="qty"/><br/>
            <input type="submit" class="btn btn-info" value="َAdd">
        </form>

        <table id="list" class="table table-striped table-hover">
            <thead>
            <th>id</th>
            <th>name</th>
            <th>qty</th>
            <th>done</th>
            <th></th>
            <th></th>
            </thead>
        </table>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update_form">
                <div class="modal-header">
                    <h4 class="modal-title">Edit List</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_u" name="id" class="form-control" required>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_u" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="number" id="qty_u" name="qty" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Done</label>
                        <input type="checkbox" id="done_u" name="done" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="button" class="btn btn-info" id="update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
