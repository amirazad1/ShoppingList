$(document).ready(function () {
    $.ajax({
        url: '/list',
        dataType: 'json',
        type: "get",
        data: {},
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var row = $('<tr><td>' + data[i].name + '</td><td>' + data[i].qty + '</td><td>' +
                    '</td><td><input type="checkbox" value="' + data[i].done + '"' + ((data[i].done == 1) ? ' checked' : '') + ' /></td>'+
                    '<td><a href="#editModal" class="edit btn btn-info" data-toggle="modal">' +
                    '<i  class="update" data-toggle="tooltip" ' +
                    ' data-id=' + data[i].id +
                    ' data-name=' + data[i].name +
                    ' data-qty=' + data[i].qty +
                    ' data-done=' + data[i].done +
                    ' title="Edit"> Edit </i>' +
                    '</a>&nbsp'+
                    '<a class="btn btn-danger" href="/delete?\' + data[i].id + \'"> delete </a></td></tr>');
                $('#list').append(row);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('Error:' + textStatus + '-' + errorThrown);
        }
    });

    $(document).on('click', '.update', function (e) {
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var qty = $(this).attr("data-qty");
        var done = $(this).attr("data-done");
        $('#id_u').val(id);
        $('#name_u').val(name);
        $('#qty_u').val(qty);
        $('#done_u').prop("checked", (done == 1 ? true : false));
    });

    $(document).on('click', '#update', function (e) {
        $.ajax({
            data: {
                name: $('#name_u').val(),
                qty: $('#qty_u').val(),
                done: $('#done_u').prop("checked") === true ? 1 : 0,
                id: $('#id_u').val(),
            },
            type: "post",
            url: "/update",
            success: function (dataResult) {
                $('#editModal').modal('hide');
                location.reload();
                //todo:check for errors
            }
        });
    });


});