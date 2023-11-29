$(document).ready(function() {
    $('input').on('input', function() {
      var maxLength = parseInt($(this).attr('maxlength'));
      var currentLength = $(this).val().length;

      if (currentLength >= maxLength) {
        var nextInputId = $(this).next('input').attr('id');
        $('#' + nextInputId).focus();
      }
    });

    $('#verificarBtn').on('click', function() {
      var codigo1 = $('#input1').val();
      var codigo2 = $('#input2').val();
      var codigo3 = $('#input3').val();
      var codigo4 = $('#input4').val();

      var codigoIngresado = codigo1 + codigo2 + codigo3 + codigo4;

      if (codigoIngresado.length === 4 && !isNaN(codigoIngresado)) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            type: "POST",
            url: "/verifyCode",
            data: {
                codigo: codigoIngresado
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                if (response == 'Código correcto') {
                    window.location.href = "/questions/index";
                } else {
                    Swal.fire(
                        'Error',
                        'Código incorrecto, revisa la informacion',
                        'error'
                    )
                }
            }
        });
      } else {
        alert('Ingrese un código válido de 4 dígitos.');
      }
    });
  });
