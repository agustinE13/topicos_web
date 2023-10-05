(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 768) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Header slider
    $('.header-slider').slick({
        autoplay: true,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });


    // Product Slider 4 Column
    $('.product-slider-4').slick({
        autoplay: true,
        infinite: true,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });


    // Product Slider 3 Column
    $('.product-slider-3').slick({
        autoplay: true,
        infinite: true,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });
    const stars = document.querySelectorAll('.rating i');
    const ratingInput = document.getElementById('rating');

    stars.forEach((star) => {
        star.addEventListener('mouseover', () => {
            const rating = star.getAttribute('data-rating');
            highlightStars(rating);
        });

        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-rating');
            ratingInput.value = rating;
            highlightStars(rating);
        });

        star.addEventListener('mouseout', () => {
            const currentRating = ratingInput.value;
            highlightStars(currentRating);
        });
    });

    function highlightStars(rating) {
        stars.forEach((star) => {
            const starRating = star.getAttribute('data-rating');
            if (starRating <= rating) {
                star.classList.add('fas');
                star.classList.remove('far');
            } else {
                star.classList.remove('fas');
                star.classList.add('far');
            }
        });
    }


    // Product Detail Slider
    $('.product-slider-single').slick({
        infinite: true,
        autoplay: true,
        dots: false,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.product-slider-single-nav'
    });
    $('.product-slider-single-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        asNavFor: '.product-slider-single'
    });


    // Brand Slider
    $('.brand-slider').slick({
        speed: 5000,
        autoplay: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        swipeToSlide: true,
        centerMode: true,
        focusOnSelect: false,
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 300,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    // Review slider
    $('.review-slider').slick({
        autoplay: true,
        dots: false,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    // Widget slider
    $('.sidebar-slider').slick({
        autoplay: true,
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });


    // Quantity
    $('.qty button').on('click', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });


    // Shipping address show hide
    $('.checkout #shipto').change(function () {
        if ($(this).is(':checked')) {
            $('.checkout .shipping-address').slideDown();
        } else {
            $('.checkout .shipping-address').slideUp();
        }
    });


    // Payment methods show hide
    $('.checkout .payment-method .custom-control-input').change(function () {
        if ($(this).prop('checked')) {
            var checkbox_id = $(this).attr('id');
            $('.checkout .payment-method .payment-content').slideUp();
            $('#' + checkbox_id + '-show').slideDown();
        }
    });
})(jQuery);

$(document).ready(() => {
    $('#selectCate').select2({
        ajax: {
            url: '/api/categories',
            dataType: 'json'
        }
    })


    //let table = new DataTable('#tablaprueba');

    $('#btnMostrar').click(() => {
        let selected = $('#selectCate').select2('data');
        $('#tablaprueba tbody').empty();
        $('tablaprueba').DataTable().clear().destroy();
        $.getJSON("/api/products/" + (selected.length ? selected[0].id : ""), function (result) {
            $.each(result, function (i, obj) {
                $('#tablaprueba > tbody:last-child').append(
                    '<tr>' +
                    '<td>' + obj.id + '</td>' +
                    '<td>' + obj.name + '</td>' +
                    '<td>' + obj.sale_price + '</td>' +
                    '<td>' + obj.category.name + '</td>' +
                    '<td>' + obj.color + '</td>' +
                    '<td>' + obj.size + '</td>' +
                    '</tr>'
                );

            });
            let table = new DataTable('#tablaprueba');
        });
    });
});

//ajax para el consumo de api
$(document).ready(() => {
    $('#btnEnviar').click(() => {
        var Message = $('#message');
        var MessageError = $('#messageError');
        var formData = new FormData(document.getElementById("registerForm"));
        var formDataObject = {};
        formData.forEach((value, key) => {
            formDataObject[key] = value;
        });

        $.ajax({
            url: 'http://localhost:3000/api/v1/users',
            method: 'POST',
            dataType: 'json',
            processData: false,
            contentType: 'application/json; charset=utf-8',
            data: JSON.stringify(formDataObject), // Cambio aquí
            async: true,
            success: function (response) {
                Message.text('registration has been submitted successfully');
                Message.removeClass('d-none');
                $('#registerForm')[0].reset();
            },
            error: function (error) {
                MessageError.text('registration has failed');
                MessageError.removeClass('d-none');
            }
        });

    });
});





/*$(document).ready(function() {
    const $tablaPrueba = $('#tablaprueba');

    const agregarFila = (data) => {
        // Crea una nueva fila y llena las celdas con los datos
        const newRow = $('<tr>');
        newRow.append(`<td>${data.id}</td>`);
        newRow.append(`<td>${data.name}</td>`);
        newRow.append(`<td>${data.description}</td>`);
        newRow.append(`<td>${data.rating}</td>`);
        newRow.append(`<td>${data.original_price}</td>`);
        newRow.append(`<td>${data.sale_price}</td>`);
        newRow.append(`<td>${data.quantity}</td>`);
        newRow.append(`<td>${data.size}</td>`);
        newRow.append(`<td>${data.color}</td>`);
        newRow.append(`<td>${data.category.name}</td>`);

        $tablaPrueba.find('tbody').append(newRow);
    }

    const cargarDatos = () => {
        // Realiza una solicitud AJAX para obtener los datos
        $.ajax({
            url: '/api/products', // Ruta de tu controlador que devuelve los datos JSON
            method: 'GET',
            success: function(response) {
                // Limpia la tabla antes de agregar nuevos datos
                $tablaPrueba.find('tbody').empty();

                // Agrega filas a la tabla con los datos obtenidos
                response.forEach(function(product) {
                    agregarFila(product);
                });
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    $('#agregarBtn').click(cargarDatos); // Reemplaza 'agregarBtn' con el ID del botón de agregar
    $('#eliminarBtn').click(eliminarFila); // Reemplaza 'eliminarBtn' con el ID del botón de eliminar
    //$('#cargarDatosBtn').click(cargarDatos); // Reemplaza 'cargarDatosBtn' con el ID del botón para cargar datos
});




/*$(document).ready(function() {
    const $tablaPrueba = $('#tablaprueba');
    let currentIndex = 0; // Mantén un seguimiento del índice actual de los datos
    const data = []; // Almacena los datos recuperados

    const cargarProductos = () => {
        if (currentIndex < data.length) {
            const product = data[currentIndex];

            // Agrega el registro actual a la tabla
            $tablaPrueba.find('tbody').append(
                `<tr>
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>${product.ratting}</td>
                    <td>${product.original_price}</td>
                    <td>${product.sale_price}</td>
                    <td>${product.quantity}</td>
                    <td>${product.size}</td>
                    <td>${product.color}</td>
                    <td>${product.category.name}</td>
                </tr>`
            );
            // Incrementa el índice para cargar el siguiente registro la próxima vez
            currentIndex++;
        }
    }
    const eliminarFila = () => {
        const rowCount = $tablaPrueba.find('tr').length;

        if (rowCount <= 1)
          alert('No se puede eliminar el encabezado');
        else{
          $tablaPrueba.find('tr:last').remove();
          if (currentIndex > 0) {
            currentIndex--;
        }
        }
      }
    // Llama a cargarProductos cuando se hace clic en el botón
    $('#eliminarBtn').click(eliminarFila);

    $('#cargarBtn').click(cargarProductos);

    // Realiza una única solicitud Ajax para recuperar todos los datos
    $.ajax({
        url: '/api/products', // URL del endpoint en tu controlador
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Almacena los datos recuperados
            data.push(...response);

            // Carga el primer registro
            cargarProductos();
        },
        error: function(error) {
            console.error('Error al cargar los productos:', error);
        }
    });
});

*/
/*
$(document).ready(function() {
    const $tablaPrueba = $('#tablaprueba');
    let currentIndex = 0; // Inicialmente, no se está mostrando ningún registro
    const data = []; // Almacena los datos recuperados

    const cargarProductos = () => {
        if (currentIndex < data.length) {
            currentIndex++; // Avanzar al siguiente registro
            const product = data[currentIndex];

            // Agrega el registro actual a la tabla
            $tablaPrueba.find('tbody').append(
                `<tr>
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>${product.rating}</td>
                    <td>${product.original_price}</td>
                    <td>${product.sale_price}</td>
                    <td>${product.quantity}</td>
                    <td>${product.size}</td>
                    <td>${product.color}</td>
                    <td>${product.image}</td>
                </tr>`
            );
        }
    }

    const eliminarFila = () => {
        const rowCount = $tablaPrueba.find('tr').length;

        if (rowCount <= 1)
            alert('No se puede eliminar el encabezado');
        else {
            // Eliminar la última fila
            $tablaPrueba.find('tr:last').remove();
            // Retroceder al registro anterior (si existe) cuando se elimina
            if (currentIndex > 0) {
                currentIndex--;
            }
        }
    }

    // Llama a cargarProductos cuando se hace clic en el botón "Agregar"
    $('#cargarBtn').click(cargarProductos);

    // Llama a eliminarFila cuando se hace clic en el botón "Eliminar"
    $('#eliminarBtn').click(eliminarFila);

    // Realiza una única solicitud Ajax para recuperar todos los datos
    $.ajax({
        url: '/api/products', // URL del endpoint en tu controlador
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Almacena los datos recuperados
            data.push(...response);

            // Carga el primer registro
            cargarProductos();
        },
        error: function(error) {
            console.error('Error al cargar los productos:', error);
        }
    });
});

*/
