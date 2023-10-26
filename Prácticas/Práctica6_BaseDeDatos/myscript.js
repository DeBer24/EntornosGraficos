var idSeleccionado = "";
            
function getId(fila){
    if(idSeleccionado != "")
        document.getElementById(idSeleccionado).style.background = '';

    document.getElementById(fila.id).style.background = "#CFC5C3";
    idSeleccionado = fila.id;
}

function validarSeleccion(boton){
    if (idSeleccionado != ""){
        var myModal;
        if (boton.id == "btnEliminar"){
            document.getElementById("idEliminar").value = idSeleccionado;
            myModal = new bootstrap.Modal(document.getElementById("modalEliminar"), {});
        }
        else //btnModificar
        {
            document.getElementById("idModificar").value = idSeleccionado;
            
            var fila = document.getElementById(idSeleccionado);            
            var contenedor = document.getElementById("modalModificar");

            contenedor.querySelector('[name="ciudad"]').value = fila.getElementsByTagName('td')[1].textContent;
            contenedor.querySelector('[name="pais"]').value = fila.getElementsByTagName('td')[2].textContent;
            contenedor.querySelector('[name="habitantes"]').value = fila.getElementsByTagName('td')[3].textContent;
            contenedor.querySelector('[name="superficie"]').value = fila.getElementsByTagName('td')[4].textContent;

            if (fila.getElementsByTagName('td')[5].textContent == "1")
                contenedor.querySelector('[name="metro"]').value = "Sí";
            else{
                contenedor.querySelector('[name="metro"]').value = "No";
            }

            myModal = new bootstrap.Modal(document.getElementById("modalModificar"), {});
        }
        
        myModal.show();
    }
    else{
        alert("Por favor, Seleccione una fila de la tabla");
    }
}