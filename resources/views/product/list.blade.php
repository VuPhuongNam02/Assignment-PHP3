@extends('include.frame')
@section('content')
    <livewire:product :sizes="$listSize" :products="$products" />
@endsection
