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
                <a href="{{ url()->previous() }}" class="btn btn-primary">Atras</a>
                <a href="{{ url('moneda') }}" class="btn btn-primary">Monedas</a>
                <a href="{{ url('moneda/create') }}" class="btn btn-primary">Create moneda</a>
                <a href="#" data-table="moneda" data-id="{{ $moneda->id }}" data-name="{{ $moneda->nombre }}" class="btn btn-danger" id="enlaceBorrar">Delete moneda</a>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('moneda/' . $moneda->id) }}" method="post" id="editMonedaForm" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" maxlength="60" minlength="2" required class="form-control" id="nombre" placeholder="Nombre moneda" name="nombre" value="{{ old('nombre', $moneda->nombre) }}">
        </div>
        <div class="form-group">
            <label for="simbolo">Simbolo</label>
            <input type="text" maxlength="3" minlength="1" required class="form-control" id="simbolo" placeholder="Simbolo" name="simbolo" value="{{ old('simbolo', $moneda->simbolo) }}">
        </div>
        <div class="form-group">
            <label for="pais">Pais</label>
            <input type="text" maxlength="100" minlength="2" required class="form-control" id="pais" placeholder="Pais" name="pais" value="{{ old('pais', $moneda->pais) }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" required class="form-control" id="valor" placeholder="Valor" name="valor" value="{{ old('valor', $moneda->valor) }}">
        </div>
        <div class="form-group">
            <label for="fechacreacion">Fecha Creacion</label>
            <input type="date" class="form-control" name="fechacreacion" id="fechacreacion" value="{{ old('fechacreacion', $moneda->fechacreacion) }}">
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection