@extends('layout.e-commerce')

@section('title','Tabla de usuarios')
@section('content')


<div class="container">

  <button class="btn" type="button" id="btnMostrar">Agregar Fila</button>
 <!-- <button class="btn" type="button" id="eliminarBtn">Eliminar Fila</button>-->
<table  class="table" id="tablaprueba">
    <thead class="thead-dark">
      <tr>
        <th>FULL NAME</th>
        <th>E-MAIL</th>
        <th>PHONE</th>
        <th>ADDRESS</th>
        <th>PASSWORD</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
         <tr>
            <td>{{$u->first_name}}{{$u->last_name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->phone}}</td>
            <td>{{$u->address}}</td>
            <td>{{$u->password}}</td>
         </tr>
         @endforeach
    </tbody>
</table>

</div>



@endsection
