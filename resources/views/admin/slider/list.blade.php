@extends('admin.include.header')
@section('title')
    <title> {{ $title }}</title>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="recent">
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg open-modal" data-toggle="modal" data-target="#myModal">Create</button>

        <div class="activity-grid">
            <div class="activity-card">
                <h3>{{ $content }}</h3>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Thumbnail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collection as $slider)
                                <tr>
                                    <td>{{ $slider->name  }}</td>
                                    <td>{{ $slider->url  }}</td>
                                    <td><img src="/Backend/img/{{ $slider->thumb }}" width="100"/> </td>
                                    <td><button id="edit" data="{{ $slider->id }}" type="button" class="btn btn-warning"
                                            data-toggle="modal" data-target="#myModal">
                                        Edit
                                    </button></td>
                                    <td>
                                        <button id="delete" data="{{ $slider->id }}" type="button" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@include('admin.slider.form')
    <script>
        $(document).ready(function(){
            $(document).on('click','.open-modal',function () {
                $('.modal-title').text('Create slider')

                $('form').submit(function (e){
                    e.preventDefault()

                    $.ajax({
                        url: "/slider/store",
                        type:"POST",
                        data: new FormData(this),
                        contentType: false,
                        cache:false,
                        processData:false,
                        dataType:'JSON',
                        success:function (res){
                          location.reload()
                        }
                    })
                })
            })

            $(document).on('click','#edit',function () {
                $('.modal-title').text('Edit slider')

                var id = $(this).attr('data')
                $.ajax({
                    url: "/slider/edit/" + id,
                    method: "GET",
                    success: function(response) {
                        $('#name').val(response.data.name)
                        $('#url').val(response.data.url)
                        $('#image').val(response.data.thumb)
                    }
                })

                $('form').submit(function (e){
                    e.preventDefault()

                    $.ajax({
                        url: "/slider/update/" + id,
                        type:"POST",
                        data: new FormData(this),
                        contentType: false,
                        cache:false,
                        processData:false,
                        dataType:'JSON',
                        success:function (res){
                            location.reload()
                        }
                    })
                })
            })


            //delete
            $(document).on('click', '#delete', function() {
                var id = $(this).attr('data')
                $.ajax({
                    url: "/slider/delete/" + id,
                    method: "GET",
                    success: function(response) {
                        location.reload()
                        alert('delete sucess');
                    }
                })
            })
        })
    </script>
@endsection

