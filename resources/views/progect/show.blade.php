@extends('layouts.app');

@section('title',$progect->title)

@section('content')
<header class="d-sm-flex justify-content-between align-items-center my-5 text-center " dir="rtl">
    <h6 class="text-dark">
        <a href="/progects">المشاريع</a> / {{ $progect->title }}
    </h6>
    <div class="mt-3 mt-sm-0">
        <a href="/progects/{{ $progect->id }}/edit" class="btn btn-primary px-4"> تعديل المشروع </a>
    </div>
</header>
<section class="row text-end">
    <div class="col-lg-4">
        {{-- تفاصيل المشروع --}}
        <div class="card mb-4">

                    <div class="card-body">
                        @include('progect.footer')
                        <div class="statuse ">
                            @switch($progect->status)
                                @case(1)
                                    <span class="text-success">مكتمل </span>
                                    @break
                                @case(2)
                                    <span class="text-danger">ملغي</span>
                                    @break
                                @default
                                    <span class="text-warning">قيد الانجاز </span>
                                    
                                
                                   
                            @endswitch
                        </div>
                        <h5 class="fw-bold card-title">
                            <a href="/progects/{{ $progect->id }}" class="text-decoration-none ">
                                {{ $progect->title }}
                            </a>
                        </h5>
                        <div class="card-text mb-3">
                            {{  $progect->description }}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="/progects/{{ $progect->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select". onchange="this.form.submit()">
                            <option value="1" {{ $progect->status == 1 ? 'selected' : '' }}>مكتمل</option>
                            <option value="2" {{ $progect->status == 2 ? 'selected' : '' }}>ملغي</option>
                            <option value="3" {{ $progect->status == 3 ? 'selected' : '' }}>قيد الانجاز</option>
                        </select>
                        </form>
                        
                            
                        
                    </div>
                       
                </div>

    </div>
    <div class="col-lg-8">
        {{-- مهام المشروع --}}
        @foreach ($progect->tasks as $task)
        <div class="card p-3 mb-3 d-flex flex-row align-items-center">
            <div>
                {{ $task->body }}
            </div>
        </div>
        @endforeach
        <div class="card">
            <form action="/progects/{{ $progect->id }}/tasks" method="POST" class="p-3 d-flex gap-2 ">
                @csrf
                @method('POST')
                <input type="text" name="body" class="form-control p-2 ml-2" placeholder="إضافة مهمة جديدة">
                <button type="submit" class="btn btn-primary">اضف</button>

            </form>
        </div>
    

    </div>
</section>
@endsection