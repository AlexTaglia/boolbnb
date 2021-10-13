@extends('layouts.app')

@section('content')
<div class="container">
    <filter-component :apartments = "{{ $apartments }}" :services = "{{ $services }}" :apartmentservices = "{{ $apartmentservices }}"></filter-component>
</div>
@endsection 