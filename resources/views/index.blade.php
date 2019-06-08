@extends('layouts.app')

@section('title', 'testting')

@section('content')
    @livewire('webhook', $uuid)
@endsection
