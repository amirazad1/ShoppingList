$(document).ready(function () {
    $.ajax({
        url:'/list',
        dataType:'json',
        data:{},
        success: function(data){
            for(var i=0; i<data.length; i++){
                var row=$('<tr><td>' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].qty + '</td><td>'
                    + '</td><td><input type="checkbox" name='+data[i].id+' value="' + data[i].done + '" /></td><td><a href="/delete?' +data[i].id + '">delete</a></td></tr>');
                $('#list').append(row);
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log('Error:'+textStatus+'-'+errorThrown);
        }
    });
});