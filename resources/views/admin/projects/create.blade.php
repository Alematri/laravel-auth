@extends('layouts.admin')

@section('content')

@if($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error )
          <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-8">
        <form action="{{ $route }}" method="POST">
            @csrf
            @method($method)
            <div class="mb-3">
                <label for="title" class="form-label">Titolo progetto</label>
                <input
                    id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    type="text"
                    value="{{old('title')}}"
                >
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-primary">Annulla</button>

        </form>
    </div>
</div>

@endsection
