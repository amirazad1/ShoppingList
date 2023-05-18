$(document).ready(function () {
    $.ajax({
        url:'/list',
        dataType:'json',
        data:{},
        success: function(data){
            for(var i=0; i<data.length; i++){
                var row=$('<tr><td>' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].qty + '</td><td>'+
                    '</td><td><input type="checkbox" name='+data[i].id+' value="' + data[i].done + '" /></td><td><a href="/delete?' +data[i].id + '">delete</a>' +
                    '<a href="#editModal" class="edit" data-toggle="modal">' +
                    '<i  class="update" data-toggle="tooltip" ' +
                    ' data-id=' + data[i].id +
                    ' data-name='+ data[i].name +
                    ' data-qty='+ data[i].qty +
                    ' data-done='+ data[i].done +
                    ' title="Edit"> Edit</i>' +
                    '</a></td></tr>');
                $('#list').append(row);
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log('Error:'+textStatus+'-'+errorThrown);
        }
    });

    $(document).on('click','.update',function(e) {
        var id=$(this).attr("data-id");
        var name=$(this).attr("data-name");
        var qty=$(this).attr("data-qty");
        var done=$(this).attr("data-done");
        $('#id_u').val(id);
        $('#name_u').val(name);
        $('#qty_u').val(qty);
        $('#done').val(done);
    });


});