/**
 * Created by oscar on 6/12/15.
 */

window.onload = function(){
        document.getElementById('add').addEventListener('click',function (){
            document.getElementById('iterativeAssignatura').innerHTML +=
                '<div class="form-group">'+
                '<label for="Nombre" class="col-sm-offset-2 col-sm-2 control-label">Nombre</label>'+
                '<div class="col-sm-5 ">'+
                '<input class="form-control" name="Nombre[]" type="text" value="Nombre Assignatura">'+
                '</div>'+
                '</div>';
        });
    }
