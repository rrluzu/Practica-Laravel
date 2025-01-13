@extends('layouts.main')
@section('contenido')
<title>Hola 3</title>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Listado de Productos
                    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-end">Nuevo Producto</a>
                </div>
                <div class="card-body">
                    @if(session('info'))
                        <div class="alert alert-success">
                            {{session('info')}}
                        </div>
                    @endif

                    <table class="table table-hover table-sm">
                        <thead>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $producto)
                                <tr>
                                    <td>
                                        {{$producto->description}}
                                    </td>
                                    <td>
                                        {{$producto->price}}€
                                    </td>
                                    <td>
                                        <a href="{{route('products.edit', $producto->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="javascript: document.getElementById('delete-{{$producto->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{$producto->id}}" action="{{route('products.destroy', $producto->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
