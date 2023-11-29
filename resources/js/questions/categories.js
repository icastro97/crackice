  // Función para generar una clase de color aleatoria
  function getRandomColorClass() {
    const colorClasses = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
    const randomIndex = Math.floor(Math.random() * colorClasses.length);
    return `btn-outline-${colorClasses[randomIndex]}`;
  }

  function setCategory(id) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: "/questions/setCategory",
        data: {
            category:id
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response == 'categoria Seleccionada') {
                window.location.href = "/questions/levels";

            } else {
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
        const categoryId = $(this).data('category-id'); // Obtén el ID de la categoría desde el atributo data
        setCategory(categoryId); // Llama a la función setCategory con el ID de la categoría
      });
  });
