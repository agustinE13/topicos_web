@extends('layout.e-commerce')

@section('title','orders table')
@section('content')


<div class="container">


 <!-- <button class="btn" type="button" id="eliminarBtn">Eliminar Fila</button>-->
<table  class="table" id="tableOrder">
    <thead class="thead-dark">
      <tr>
        <th>ORDER NO.</th>
        <th>PRODUCT NAME</th>
        <th>CREATE AT</th>
        <th>PRICE</th>
        <th>STATUS</th>
      </tr>
    </thead>
    <tbody>
        <tfoot>
  <tr>
    <th></th>
    <th></th>
    <th></th>
    <th>Total:</th>
    <th></th>
  </tr>
</tfoot>
    </tbody>
</table>

</div>



@endsection
