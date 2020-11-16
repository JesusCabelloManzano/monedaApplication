@extends('base')

@section('postscript')
<script src="{{ url('assets/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')

<h3 class="m-0 text-dark">Moneda Index</h3>
<br>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('moneda/create') }}" class="btn btn-primary">Crear Moneda</a>
            </div>
        </div>
    </div>
</div>

@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">nombre</th>
            <th scope="col">simbolo</th>
            <th scope="col">pais</th>
            <th scope="col">valor</th>
            <th scope="col">fecha Creacion</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($monedas as $moneda)
        <tr>
            <td scope="row">{{ $moneda->id }}</td>
            <td>{{ $moneda->nombre }}</td>
            <td>{{ $moneda->simbolo }}</td>
            <td>{{ $moneda->pais }}</td>
            <td>{{ $moneda->valor }}</td>
            <td>{{ $moneda->fechacreacion }}</td>
            <td><a href="#" data-id="{{ $moneda->id }}" data-name="{{ $moneda->nombre }}" data-table="moneda" id="enlaceBorrar" >delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('moneda') }}" method="post">
    @method('delete')
    @csrf
</form>
@endsection