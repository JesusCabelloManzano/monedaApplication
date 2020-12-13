@extends('base')

@section('postscript')
<script src="{{ url('assets/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('moneda/' . $moneda->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('moneda') }}" class="btn btn-primary">Monedas</a>
                <a href="{{ url('moneda/create') }}" class="btn btn-primary">Create moneda</a>
                <a href="#" data-id="{{ $moneda->id }}" data-name="{{ $moneda->nombre }}" data-table="moneda" class="enlaceBorrar btn btn-danger" >Delete moneda</a>
                <a href="{{ url('moneda/' . $moneda->id . '/edit') }}" class="btn btn-primary">Edit moneda</a>
            </div>
        </div>
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nombre</td>
            <td>{{$moneda->nombre}}</td>
        </tr>
        <tr>
            <td>Simbolo</td>
            <td>{{$moneda->simbolo}}</td>
        </tr>
        <tr>
            <td>Pais</td>
            <td>{{$moneda->pais}}</td>
        </tr>
        <tr>
            <td>Valor</td>
            <td>{{$moneda->valor}}</td>
        </tr>
        <tr>
            <td>Fecha Creacion</td>
            <td>{{$moneda->fechacreacion}}</td>
        </tr>
    </tbody>
</table>
@endsection