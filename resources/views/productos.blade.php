@extends('layouts.main')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Productos</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalAgregar">
                        <i -class="fas fa-user fa-sm text-white-50"></i> Agregar Producto</a>
</div>

        <div class="row">
        @if($message = Session::get('Listo'))
                <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                <h5>Listo!!</h5>
                <span>{{ $message }}</span>
                </div>

        @endif

        </div>

        <!-- Modal agregar-->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
                <form action="/admin/productos" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
        @if($message = Session::get('ErrorInsert'))
                <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                <h5>Error:</h5>

                <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
                
                </ul>
                </div>
        @endif
                    <div class="form-group"> 
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                    </div>
                    <div class="form-group"> 
                            <input type="file" class="form-control" name="img" placeholder="imagen" >
                    </div>
                    <div class="form-group"> 
                            <input type="number" class="form-control" name="stock" placeholder="Stock">
                    </div>
                    <div class="form-group"> 
                            <input type="text" class="form-control" name="codigo" placeholder="Codigo de barras">
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
        </div>  
 </div>
 </div>

  <!-- Modal Eliminar-->
  <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
                
        <div class="modal-body">
       <h5>¿Desea eliminar usuario?</h5>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
        </div>
                
        </div>  
 </div>
 </div>

 <!-- Modal editar-->
 <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
                <form action="/admin/usuarios/edit" method="post">
        @csrf
        <div class="modal-body">
        @if($message = Session::get('ErrorInsert'))
                <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                <h5>Error:</h5>

                <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
                
                </ul>
                </div>
        @endif
                <input type="hidden" name="id" id="idEdit">
                <div class="form-group"> 
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" id="nameEdit">
                </div>
                <div class="form-group"> 
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" id="emailEdit">
                </div>
                <div class="form-group"> 
                        <input type="password" class="form-control" name="pass1" placeholder="Password">
                </div>
                <div class="form-group"> 
                        <input type="password" class="form-control" name="pass2" placeholder="Confirmar Password">
                </div>
                </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar edicion</button>
        </div>
                </form>
        </div>  
 </div>
 </div>
 

@endsection

@section('scripts')
        <script>
        var idEliminar=0;
       


                @if($message = Session::get('ErrorInsert'))
                        $("#modalAgregar").modal('show');

                @endif   
                $(".btnEliminar").click(function(){
                        idEliminar = $(this).data('id');
                       
                });
                $(".btnModalEliminar").click(function(){
                       $("#formEli_"+idEliminar).submit();
                });
                $(".btnEditar").click(function(){
                        $("#idEdit").val ($(this).data('id'));
                        $("#nameEdit").val ($(this).data('name'));
                        $("#emailEdit").val ($(this).data('email'));
                       
                });
                
        });
        </script>

@endsection