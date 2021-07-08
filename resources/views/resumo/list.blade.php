@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #6ab2ec">
            <h1>Resumo</h1>
        </div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <h3>Em Construção</h3>

        </div>
    </div>
</div>

@endsection