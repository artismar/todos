@extends('nav')

@section('content')

    <div class="container w-25 border p-4 mt-4">
        <div>
            <h6 class="alert alert-info">Estas editando la categoria: <span style="color: {{$category->color}};">{{$category->name}}</span></h6>
        </div>
        <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
            {{-- ESTE METODO UTILIZAMOS PARA UPDATE --}}
            @method('PATCH')
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
                <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
            </div>
            <div class="mb-1">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" name="color" id="color" value="{{$category->color}}">
            </div>
            <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
        </form>

        <div>
            @if ($category->todos->count() > 0)
                @foreach ($category->todos as $todo)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ route('todos-show', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('todos-destroy', [$todo->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p>La categoria <strong>{{$category->name}}</strong> no tiene ninguna tarea asignada.</p>
            @endif
        </div>


    </div>


@endsection