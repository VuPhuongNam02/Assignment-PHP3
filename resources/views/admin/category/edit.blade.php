@extends('admin.include.header')
@section('title')
    <title> {{ $title }}</title>
@endsection
@section('content')
    <div class="container">
        <h2>{{ $content }}</h2>
        <section class="recent">

            <form action="/category/update/{{ $cate->id }}" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $cate->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Edit</button>
                </div>
                @csrf
            </form>

        </section>
    </div>
@endsection
