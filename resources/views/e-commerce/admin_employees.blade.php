@extends('layout.e-commerce')

@section('title','Tabla de EMPLEADOS')
@section('content')


<div class="container">
  <select id="selectCate" style="width: 50%"></select>
  &nbsp;&nbsp;&nbsp;

  <button class="btn" type="button" id="btnMostrar">Agregar Fila</button>
 <!-- <button class="btn" type="button" id="eliminarBtn">Eliminar Fila</button>-->
<table  class="table" id="tablaprueba">
    <thead class="thead-dark">
      <tr>
        <th>EMP. No.</th>
        <th>FULL NAME</th>
        <th>E-MAIL</th>
        <th>GENDER</th>
        <th>SALARY</th>
        <th>DEPARMENT</th>
      </tr>
    </thead>
    <tbody>
        @foreach($employees as $e)
         <tr>
            <td>{{$e->emp_no}}</td>
            <td>{{$e->first_name}}{{$e->last_name}}</td>
            <td>{{$e->email}}</td>
            <td>{{$e->gender}}</td>
            <td>{{$e->salary}}</td>
            <td>{{$e->department}}</td>
         </tr>
         @endforeach
    </tbody>
</table>

</div>



@endsection
