import 'bootstrap';
import jQuery from 'jquery';
import swal from 'sweetalert2';
import './bootstrap';
import 'laravel-datatables-vite';

window.Swal = swal;
window.$ = jQuery;

$(document).ready(function () {
    $('#openPopup').click(function () {
        // Hacer la solicitud AJAX al servidor para obtener productos
        $.ajax({
            url: '/get-products',
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                $('#products-container').empty();

                data.forEach(function (product) {

                    product.price = Intl.NumberFormat("en-US", {
                        style:'currency',
                        currency:'COP'
                    }).format(product.price);

                    $('#products-container').append(`
                    <div class="col">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <img src="/storage/${product.image}" class="card-img-top" alt="${product.name}">
                        <div class="card-body">
                            <h5 class="card-title">${product.name}</h5>
                            <p class="card-text">${product.price}</p>
                            <a href="#" class="btn btn-primary add-to-cart" data-id="${product.id}">Agregar al carrito</a>
                        </div>
                    </div>

                  </div>`);

                  $('.add-to-cart').click(function () {
                    var productId = $(this).data('id');
                    addProductToCart(productId);
                });
                });
            },
            error: function (error) {
                console.error('Error al obtener productos:', error);
            }
        });
    });
});

function addProductToCart(id) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: "/cart-add",
        data: {
            producto_id:id
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response == 'success') {
                Swal.fire(
                    'Producto Agregado Exitosamente',
                    '',
                    'success'
                    )
                window.location.reload();

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
