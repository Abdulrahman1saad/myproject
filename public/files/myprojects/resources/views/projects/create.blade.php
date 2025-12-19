@extends('layouts.app')

@section('title', '- إنشاء مشروع جديد')

@section('content')
    <div class="row justify-content-center text-end">
        <div class="col-10 col-xl-7 card p-5 mt-5">
            <h3 class="text-center pb-5 fw-bold">مشروع جديد</h3>
            <form action="/projects" method="POST">
                @csrf
                @include('projects.form')
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary px-4 px-sm-5">إنشاء</button>
                    <a href="/projects" class="btn btn-light px-4 px-sm-5">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection