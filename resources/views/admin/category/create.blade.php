@extends('admin.include.header')
@section('title')
    <title> {{ $title }}</title>
@endsection
@section('content')
    <div class="container">
        <h2>{{ $content }}</h2>
        <section class="recent">

            <form action="/category/store" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="catName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Parent</label>
                    <select name="parent" class="form-control">
                        <option value="0">Cha</option>
                        @foreach($list as $val)
                            <option value="{{ $val->id }}">{{ $val->catName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
                @csrf
            </form>

        </section>
    </div>
@endsection
