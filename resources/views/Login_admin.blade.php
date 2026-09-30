@extends('Layout.principal')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center align-items-center" style="margin-top: 80px;">
        <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 rounded shadow-lg p-4 mb-5 bg-body-tertiary">
            <div class="row g-3 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="mt-3 text-dark fonte-poppins" style="font-weight: bold; font-size: 6rem;"><i class="bi bi-person-circle"></i></h1>
                    <hr class="border border-dark">
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="email" class="form-control" placeholder="Usuário">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                        <input type="password" class="form-control" placeholder="Senha">
                    </div>
                </div>
                <div class="col-12 text-center mt-3">
                    <a class="btn btn-dark shadow-lg container-fluid button-animation" href="{{ route('tela_inicio') }}">ENTRAR</a>
                </div>
            </div>
        </div>
    </div>
@endsection