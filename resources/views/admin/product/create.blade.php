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
                    <label for="">Brand</label>
                    <select name="brand" class="form-control">
                        <option value="Nike">Nike</option>
                        <option value="Vans">Vans</option>
                        <option value="Jordan">Jordan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="all">all</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Size</label><br>
                    <input style="margin-left:25px" type="checkbox" value="36" name="size[]" id="36">
                    <label for="36">36</label>
                    <input style="margin-left:25px" type="checkbox" value="37" name="size[]" id="37">
                    <label for="37">37</label>

                    <input style="margin-left:25px" type="checkbox" value="38" name="size[]" id="38">
                    <label for="38">38</label>

                    <input style="margin-left:25px" type="checkbox" value="39" name="size[]" id="39">
                    <label for="39">39</label>

                    <input style="margin-left:25px" type="checkbox" value="40" name="size[]" id="40">
                    <label for="40">40</label>

                    <input style="margin-left:25px" type="checkbox" value="41" name="size[]" id="41">
                    <label for="41">41</label>

                    <input style="margin-left:25px" type="checkbox" value="42" name="size[]" id="42">
                    <label for="42">42</label>

                    <input style="margin-left:25px" type="checkbox" value="43" name="size[]" id="43">
                    <label for="43">43</label>
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="catId" class="form-control">
                        @foreach ($listCate as $val)
                            <option value="{{ $val->id }}">{{ $val->catName }}</option>
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
