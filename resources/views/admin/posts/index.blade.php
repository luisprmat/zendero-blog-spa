@extends('adminlte::page')

@section('title', 'Listado de Posts')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                POSTS
                <small>Listado</small>
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i> Inicio</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Todas las publicaciones</h3>
        @can('create', $posts->first())
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-fw"></i> Crear publicación</button>
        @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Extracto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->excerpt }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post) }}"
                                    class="btn btn-secondary btn-xs"
                                    target="_blank"
                                ><i class="fas fa-eye fa-fw"></i></a>

                                @can('update-posts')
                                    <a href="{{ route('admin.posts.edit', $post) }}"
                                        class="btn btn-info btn-xs"
                                    ><i class="fas fa-pencil-alt fa-fw"></i></a>
                                @endcan
                                @can('delete-posts')
                                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                                        style="display: inline"
                                        >
                                        @csrf @method('DELETE')
                                        <button href="#" class="btn btn-danger btn-xs"
                                            onclick="return confirm('¿Estás seguro de querer eliminar esta publicación?')"
                                        ><i class="fas fa-times fa-fw"></i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
  </div>
@stop

@push('my_scripts')
    <script>
        $(function () {
            $('#posts-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "language" : {
                    "url": "/dataTables.spanish.lang"
                },
                "columnDefs" : [
                    {"width" : "80px", "targets": 3}
                ]
            });
        });
    </script>
@endpush

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

{{-- @section('js')
    <script>

    </script>
@stop --}}

