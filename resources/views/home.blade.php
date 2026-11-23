@extends('Layout.principal')

@section('title', 'Home ')

@section('content')

<div class="container">
    <div class="card-body">
        <h1 class="text-center"> ola {{ $usuario->nome }} 67</h1>
    </div>
</div>
@endsection