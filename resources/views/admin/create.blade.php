@extends('layouts.app')

@section('mario')
<h1>ADMIN | CREATE</h1>
<h2 class="text-center">Crea Un Nuovo Post</h2>
<div class="container">
    <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="50" rows="10"></textarea>
            @error('description')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fileimg" class="form-label">file immagine</label>
            <input class="form-control" type="file" id="fileimg" name="img">
        </div>
        <div class="input-group mb-3 my-3">
            <label class="input-group-text" for="typeselect">Type</label>
            <select class="form-select form-control @error('description') is-invalid @enderror" name="type" id="typeselect" value="">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            @error('description')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Crea post</button>
    </form>
</div>


@endsection