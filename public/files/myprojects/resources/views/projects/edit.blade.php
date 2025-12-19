@extends('layouts.app')

@section('title', '- تعديل مشروع')

@section('content')
    <div class="row justify-content-center text-end">
        <div class="col-10 col-xl-7 card p-5 mt-5">
            <h3 class="text-center pb-5 fw-bold">تعديل المشروع</h3>
            <form action="/projects/{{$project->id}}" method="POST">
                @csrf
                @method('PATCH')
                @include('projects.form')
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary px-4 px-sm-5">تعديل</button>
                    <a href="/projects" class="btn btn-light px-4 px-sm-5">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection