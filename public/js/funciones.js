function modalLoading(){

     data='<div class="modal-dialog" role="document">';
     data=data+'<div class="modal-content">';
     data=data+'<div class="modal-header">';
     data=data+'<h5 class="modal-title">Espere</h5>';
     data=data+'<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
     data=data+'<span aria-hidden="true">&times;</span>';
     data=data+'</button>';
     data=data+'</div>';
     data=data+'<div class="modal-body">';
     data=data+'<br><center><div class="loader"></div></center><br>';
     data=data+'</div>';
     data=data+'</div>';
     data=data+'</div>';
    $('.modal').html(data);
    $('.modal').modal('show');
}
function nuevoUsuario(){
    modalLoading();
    $.get('/Acogido/create',{},function(data){
        $('.modal').modal('hide');
        $('.modal').html(data);
        $('.modal').modal('show');
    });
} 

function editarUsuario(residente_id){
    modalLoading();
    $.get('/Acogido/'+residente_id+'/edit',{},function(data){
        $('.modal').modal('hide');
        $('.modal').html(data);
        $('.modal').modal('show');
    });
} 