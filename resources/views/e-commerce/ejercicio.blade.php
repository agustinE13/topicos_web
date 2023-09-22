@extends('layout.e-commerce')

@section('title','Tabla de ejercicio')
@section('content')
 

<div class="container">
  <select id="selectCate" style="width: 50%"></select>
  &nbsp;&nbsp;&nbsp;

  <button class="btn" type="button" id="btnMostrar">Agregar Fila</button>
 <!-- <button class="btn" type="button" id="eliminarBtn">Eliminar Fila</button>-->
<table  class="table" id="tablaprueba">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>sale price</th>
        <th>ID category</th>
        <th>color</th>
        <th>size</th>      
      </tr>
    </thead>
    <tbody></tbody>
</table>

</div>
  


@endsection