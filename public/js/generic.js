/*
var form = {
    grabar: function(){
        if(confirm("¿Desea grabar el registro?")){
            document.getElementById("form").submit();
        }
    },
    
    eliminar: function(){
        if(confirm("¿Desea eliminar el registro")){
            document.getElementById("formDelete").submit();
        }
    },
    
    cancelar: function(destino){
        window.location = destino;
    }
};
*/

function grabar(){
    if(confirm("¿Desea grabar el registro?")){
        document.getElementById("form").submit();
    }
}

function eliminar(){
    if(confirm("¿Desea eliminar el registro")){
        document.getElementById("formDelete").submit();
    }
}

function cancelar(destino){
    window.location = destino;
}

