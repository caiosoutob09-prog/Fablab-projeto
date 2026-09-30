@extends('Layout.principal')

@section('title', 'Fablab')

@section('content')

<div class="container-fluid px-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 rounded shadow-lg p-3 mb-5 mt-4 bg-body-tertiary">
            <div class="row align-items-center">
                <div class="col-8 text-center py-4">
                    <h1 class="text-danger font-poppins" style="font-weight: bold; font-size: 300%;">
                        SEJA BEM-VINDO(A)
                    </h1>

                    <h3 class="font-poppins" style="color: #000; font-weight: bold; font-size: 200%;">
                        SELECIONE UMA OPÇÃO:
                    </h3>
                </div>

                <div class="col-4 text-center">

                    <img src="{{ asset('Fablab_logo.png') }}"
                         alt="Logo Fablab"
                         style="height: 201px; max-width: 100%; object-fit: contain;">

                </div>
            </div>
            <div class="row justify-content-center mt-3 mb-3">
                <div class="col-12 col-md-6 border-end border-2 text-center animacao p-4">
                    <h2 class="font-poppins"
                        style="color: #00A749; font-weight: bold;">
                        EMPRÉSTIMOS
                    </h2>
                    <i class="bi bi-box-seam-fill"
                       style="font-size: 10rem; color: #00A749;">
                    </i>

                    <div class="mt-3">
                        <a class="btn btn-lg btn-success shadow-lg w-100"
                           href="{{ route('tela_emprestimo') }}">
                            ENTRAR
                        </a>
                    </div>

                </div>
                <div class="col-12 col-md-6 text-center animacao p-4">

                    <h2 class="font-poppins"
                        style="color: #0076BF; font-weight: bold;">
                        ADMINISTRADOR
                    </h2>

                    <i class="bi bi-wrench-adjustable"
                       style="font-size: 10rem; color: #0076BF;">
                    </i>

                    <div class="mt-3">
                        <a class="btn btn-lg btn-primary shadow-lg w-100"
                           href="{{ route('login_admin') }}">
                            ENTRAR
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection