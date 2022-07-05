@extends('nav')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('name')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            @error('color')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-1">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" name="color" id="color">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Crear</button>
        </form>

        <div class="mt-2">
            <hr>
            @foreach ($categories as $category)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
                            <span class="color-container" style="color: {{ $category->color }}">{{ $category->name }}</span>
                        </a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$category->id}}">Eliminar</button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>
                                Al eliminar la categoria <strong style="color: {{$category->color}}">{{$category->name}}</strong>, estas eliminando todas las tareas asignadas a esta.
                            </p>
                            <p class="text-center border">
                                ¿Estas seguro que quieres <span class="text-danger">eliminar</span>?
                            </p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection