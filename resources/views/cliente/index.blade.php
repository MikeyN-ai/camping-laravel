@extends('plantilla')

@section('titulo', 'Gestión de clientes')

@section('contenido')

    <div class="text-end p-3">
        <button class="btn btn-dark btn-lg border">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </button>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre + Apellidos</th>
                        <th>Correo</th>
                        <th>NIF</th>
                        <th>Teléfono</th>
                        <th>Matrícula</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Efren Sanchez González</td>
                        <td>efren213@gmail.com</td>
                        <td>56879856A</td>
                        <td>656 67 67 67</td>
                        <td>0957KJK</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <!--<div class="d-flex justify-content-center py-2">
                    {{ $cliente->links('pagination::bootstrap-5') }}
                </div>-->
            <nav aria-label="...">
                <ul class="pagination pt-3 d-flex justify-content-center align-items-center">
                    <li class="page-item disabled">
                        <a class="page-link text-dark">Anterior</a>
                    </li>
                    <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                    <li class="page-item">
                        <a class="page-link bg-dark text-white" href="#" aria-current="page">2</a>
                    </li>
                    <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link text-dark" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
