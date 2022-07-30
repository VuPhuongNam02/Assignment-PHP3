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
                    <input type="text" name="catName" value="{{ $cate->catName }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Parent</label>
                    <select name="parent" class="form-control">
                        <option hidden selected value="{{ $cate->id }}">{{$cate->catName}}</option>
                        <option value="0">Cha</option>
                        @foreach($list as $val)
                            <option value="{{ $val->id }}">{{ $val->catName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Edit</button>
                </div>
                @csrf
            </form>

        </section>
    </div>
@endsection
