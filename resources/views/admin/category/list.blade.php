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
    {{-- @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif --}}
    <section class="recent">
        <a href="/category/create" class="btn btn-success">Create</a>
        <div class="activity-grid">
            <div class="activity-card">
                <h3>{{ $content }}</h3>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Parent</th>
                            </tr>
                        </thead>
                        <tbody>
                         {!! \App\Helpers\Helper::menu($menus) !!}
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@endsection
