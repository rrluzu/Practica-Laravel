@extends('layouts.main')
@section('contenido')
<title>Hola 2</title>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Nuevo Producto
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <input type="text" name="description" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection