@extends('layouts.plantilla')

@section('titulo', 'Listado de Estudiantes')

@section('contenido')

  <div class="container">
    <div class="p-5">
        <div class="alert alert-primary">
            <a href="{{ route('estudiantes.create') }}" class="btn btn-primary"> Ingresar</a>
        </div>
        <?php
            $variable = '<script>alert("aaaa");</script>';
        
        ?>
        {{ $variable }}
        <table class="table talbe-striped table-hover">
            <thead>
                <tr>
                    <th>N</th>
                    <th>Estudiante</th>
                    <th colspan="3">Notas</th>
                    <th>Promedio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @if($estudiantes->count())
                    <?php $i=0; ?>
                    @foreach($estudiantes as $estudiante)
                        <?php $i++; ?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $estudiante->nombre }}</td>
                            <td>{{ $estudiante->nota1 }}</td>
                            <td>{{ $estudiante->nota2 }}</td>
                            <td>{{ $estudiante->nota3 }}</td>
                            <td>
                                <?php
                                    echo ($estudiante->nota1+$estudiante->nota2+$estudiante->nota3)/3;
                                ?>                            
                            </td>
                            <td class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">Editar</a>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </div>                                
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-warning">
                                No se encontraron registros para mostrar
                            </div>
                        </td>
                    </tr>
                @endif
            
            </tbody>
        </table>
        {{ $estudiantes->links() }}
    </div>
  </div>
  


@endsection