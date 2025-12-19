@extends('layouts.app')

@section('title','إنشاء مشروع جديد') 

@section('content')
<div class="row justify-content-centertext-end" >
    <div class="col-10 col-xl-7 card p-5 mt-5">
        <h3 class="text-center pb-5 fw-bold"> مشروع جديد</h3>
            <form action="/progects" method="POST" >
                 @csrf
            <div class="mb-3">
            
                 <label for="title" class="form-label ">عنوان المشروع</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                   
                    <div class="mb-3 ">
                       
                        <label for="description" class="form-label ">وصف المشروع</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mt-5">
                    <button type="submit" class="btn btn-primary px-4 px-sm-5">إنشاء </button>
                    <a hreef="/progects" class="btn btn-secondary px-4 px-sm-5 ms-3">إلغاء</a>
                    </div>
                </form>
            </div>
    </div>
    @endsection
    