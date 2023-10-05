@extends('layout.e-commerce')

@section('title','Registro de usuarios')
@section('content')


<div class="container">
    <form class="mx-auto" method="POST" id="registerForm">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">First name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Last name</label>
                    <input type="text" class="form-control" name="last_name">
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cellphone number</label>
                    <input type="tel" class="form-control" name="phone">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
        </div>
    </form>
    <div id="message" class="alert alert-success d-none"></div>
    <div id="messageError" class="alert alert-danger d-none"></div>

  <button class="btn" type="button" id="btnEnviar">Send</button>


</div>



@endsection
