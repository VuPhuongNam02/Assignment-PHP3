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
        <a href="/product/create" class="btn btn-success">Create</a>
        <div class="activity-grid">
            <div class="activity-card">
                <h3>{{ $content }}</h3>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Infor</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $item)
                                <tr>
                                    <td>
                                        <li><span style="color: darkred">Name: </span>{{ $item->name }}</li>
                                        <li><span style="color: darkred">Slug: </span>{{ $item->slug }}</li>
                                        <li><span style="color: darkred">Price: </span>{{ $item->price }}</li>
                                    </td>
                                    <td>
                                        <li><span style="color: darkred">Image: </span><img
                                                src="/Backend/img/{{ $item->image }}"></li>
                                        <li><span style="color: darkred">Sale: </span>{{ $item->sale }}</li>
                                        <li><span style="color: darkred">CatId: </span>{{ $item->catId }}</li>
                                    </td>

                                    <td><a href="/product/edit/{{ $item->id }}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td><a href="/product/destroy/{{ $item->id }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@endsection
