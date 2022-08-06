@extends('admin.include.header')
@section('title')
    <title> {{ $title }}</title>
@endsection
@section('content')
    <div class="container">
        <h2>{{ $content }}</h2>
        <section class="recent">

            <form action="/product/update/{{ $pro->id }}" enctype="multipart/form-data" method="POST">
                @method('PATCH')
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $pro->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">price</label>
                    <input type="number" name="price" value="{{ $pro->price }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">sale</label>
                    <input type="number" name="sale" value="{{ $pro->sale }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">image</label>
                    <img src="{{ asset($pro->image) }}" width="150" />
                    {{-- <input type="hidden" name="avatar" value="{{ $pro->image }}"> --}}
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">desc</label>
                    <textarea name="description" id="editor">{{ $pro->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select name="categoryId" class="form-control">
                        <option selected hidden value="{{ $pro->category->id }}">{{ $pro->category->name }}</option>
                        @foreach ($listCate as $val)
                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option selected hidden value="{{ $pro->status }}">
                            {{ $pro->status == 0 ? 'active' : 'inactive' }}</option>
                        <option value="0">active</option>
                        <option value="1">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Size</label><br>
                    @foreach ($list_size as $val)
                        <input style="margin-left:25px" type="checkbox" value="{{ $val->id }}" name="sizeId[]"
                            {{ \App\Helpers\Helper::loadSize($pro->id, false, $val->id) }} />
                        <label>{{ $val->name }}</label>
                    @endforeach
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Update</button>
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
