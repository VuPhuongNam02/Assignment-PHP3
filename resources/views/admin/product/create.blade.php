@extends('admin.include.header')
@section('title')
    <title> {{ $title }}</title>
@endsection
@section('content')
    <div class="container">
        <h2>{{ $content }}</h2>
        <section class="recent">

            <form action="/product/store" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">price</label>
                    <input type="number" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">sale</label>
                    <input type="number" name="sale" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">desc</label>
                    <textarea name="description" id="editor"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Size</label><br>
                    @foreach ($sizes as $item)
                        <input style="margin-left:25px" type="checkbox" value={{ $item->id }} name="sizeId[]"
                            id={{ $item->id }}>
                        <label for={{ $item->id }}>{{ $item->name }}</label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="categoryId" class="form-control">
                        @foreach ($categories as $val)
                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="0">active</option>
                        <option value="1">inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
                @csrf
            </form>
        </section>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
