  // Función para generar una clase de color aleatoria
  function getRandomColorClass() {
    const colorClasses = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
    const randomIndex = Math.floor(Math.random() * colorClasses.length);
    return `btn-outline-${colorClasses[randomIndex]}`;
  }

  function setLevel(id) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: "/questions/setLevel",
        data: {
            level:id
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            console.log(response);
            if (response == 'nivel seleccionado') {
                window.location.href = "/questions/questions";
            }
            else if(response == 'nivel bloqueado'){
                Swal.fire(
                    'Atencion',
                    'Debes Comprar un producto y haber superado el nivel anterior para acceder a este nivel :(',
                    'info'
                )
            }
            else {
                Swal.fire(
                    'Error',
                    'Error interno',
                    'error'
                )
            }

        }
    });
  }
  // Aplica la clase de color aleatoria a los botones usando jQuery
  $(document).ready(function () {
    $('#categoryButtons button').each(function () {
      const randomColorClass = getRandomColorClass();
      $(this).removeClass('btn-outline-primary').addClass(randomColorClass);
    });


    $('#categoryButtons button').on('click', function () {
        const levelId = $(this).data('level-id'); // Obtén el ID de la categoría desde el atributo data
        setLevel(levelId); // Llama a la función setCategory con el ID de la categoría
      });

  });
