@extends('layouts.app')

@section('content')
<div class="container">
    <filter-component :apartments = "{{ $apartments }}"></filter-component>
</div>
@endsection 