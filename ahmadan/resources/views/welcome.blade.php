<!--extend('layout') mean include layout , as old php, apply view layout in this view-->
@extends ('layout')
<!--@section('sectioname') this part is the part which is different from another page-->
@section('contentSection')
        <div class="center">
            <h1>welcome Page</h1>
        </div>
@endsection 

@section('title')
index
@endsection