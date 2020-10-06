@extends('layouts.plantilla')

@section('titulo', 'Editar Estudiante')

@section('contenido')

<div class="container">
    <div class="p-5">
        <div class="col-md-8 offset-2">
            
            <!-- captura de errores -->
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <strong>Revisar los campos obligatorios</strong>
                <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif

            @if(Session::has('success'))
            <div class="alert alert-info">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h4>Editar Estudiante</h4>
                </div>
                <form method="post" action="{{ route('estudiantes.update', $estudiante->id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="ingresar nombre.." value="{{ $estudiante->nombre }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nota1" class="form-control" placeholder="ingresar nota1.." value="{{ $estudiante->nota1 }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nota2" class="form-control" placeholder="ingresar nota2.." value="{{ $estudiante->nota2 }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nota3" class="form-control" placeholder="ingresar nota3.." value="{{ $estudiante->nota3 }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" value="Guardar" class="btn btn-info btn-block">
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('estudiantes.index') }}" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection