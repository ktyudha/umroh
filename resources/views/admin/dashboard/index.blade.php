@extends('admin.layout')

@php
    $title = 'Dashboard';
    $breadcrumbs = [['label' => 'Home', 'url' => route('admin.index')], ['label' => 'Dashboard', 'url' => null]];
@endphp

@section('title', $title)

@section('content')
    <div class="mt-5">
        Selamat Datang <strong>{{ auth()->user()->name }}</strong>!
    </div>
@stop
