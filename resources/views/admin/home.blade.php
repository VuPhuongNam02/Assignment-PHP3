@extends('admin.include.header')
@section('title')
    <title> {{ $title }}</title>
@endsection
@section('content')
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>{{ $content }}</h3>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Team</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@endsection
