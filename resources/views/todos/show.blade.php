@extends('nav')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <div>
            <h6 class="alert alert-info">Estas editando la tarea: <span style="color: blue;">{{$todo->title}}</span></h6>
        </div>
        <form action="{{ route('todos-update', ['id' => $todo->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Nuevo titulo tarea</label>
                <input type="text" class="form-control" value="{{ $todo->title }}" name="title" id="title">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection