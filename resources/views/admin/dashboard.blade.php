@extends('layouts.admin')
@section('title')
الرئيسية
@endsection
@section('contentheader')

@endsection
@section('contentheaderactivelink')
<a href="{{ route('admin.dashboard') }}">   الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')
<div style="
 background-image: url({{ asset('assets/admin/dist/img/Management.jpg') }});
 width: 100%;
min-height: 600px;
background-size: cover; ">

</div>


@endsection