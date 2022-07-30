@extends('admin.include.header')
@section('title')
    <title> {{ $title }}</title>
@endsection
@section('content')
    <div class="container">
        <h2>{{ $content }}</h2>
        <section class="recent">

            <form action="/product/update/{{ $pro->id }}" enctype="multipart/form-data" method="POST">
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
                    <img src="/Backend/img/{{ $pro->image }}" width="60" height="60" />
                    <input type="hidden" name="avatar" value="{{ $pro->image }}">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">desc</label>
                    <textarea name="desc" id="editor">{{ $pro->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Brand</label>
                    <select name="brand" class="form-control">
                        <option selected hidden value="<?= $pro->brand ?>"><?= $pro->brand ?></option>
                        <option value="Nike">Nike</option>
                        <option value="Vans">Vans</option>
                        <option value="Jordan">Jordan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" class="form-control">
                        <option selected hidden value="<?= $pro->gender ?>"><?= $pro->gender ?></option>
                        <option value="all">all</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select name="catId" class="form-control">
                        <option selected hidden value="{{ $pro->catId }}">{{ $pro->catName }}</option>
                        @foreach ($listCate as $val)
                            <option value="{{ $val->id }}">{{ $val->catName }}</option>
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
                    @php
                        $size = explode(',', $pro->size);
                    @endphp
                    @foreach ($size as $key => $val)
                        <input style="margin-left:25px" checked type="checkbox" value="<?= $val ?>" name="size[]"
                            id="<?= $val ?>">
                        <label for="<?= $val ?>"><?= $val ?></label>
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
