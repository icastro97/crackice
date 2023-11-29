$("#form").submit(function() {
    // Evitamos el envío del formulario
    event.preventDefault();

    Swal.fire(
        'Exito',
        'Pago Procesado Con Exito',
        'success'
        ).then((result) => {
            window.location.href ='/questions/index';
          });
    console.log("se envia");
  });
