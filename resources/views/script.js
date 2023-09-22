$(document).ready(function() {
    const $tablaPrueba = $('#tablaprueba');
  
    const agregarFila = () => {
      $tablaPrueba.append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
    }
  
    const eliminarFila = () => {
      const rowCount = $tablaPrueba.find('tr').length;
      
      if (rowCount <= 1)
        alert('No se puede eliminar el encabezado');
      else
        $tablaPrueba.find('tr:last').remove();
    }
  
    $('#agregarBtn').click(agregarFila); // Reemplaza 'agregarBtn' con el ID del botón de agregar
    $('#eliminarBtn').click(eliminarFila); // Reemplaza 'eliminarBtn' con el ID del botón de eliminar
  });
  