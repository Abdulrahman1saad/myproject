@extends('layouts.app');
@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6  text-dark">
            <a href="/progects" class="text-decoration-none text-dark">المشاريع</a> 
        </div>
        <div>
            <a href="/progects/create" class="btn btn-primary">إنشاء مشروع جديد</a>
        </div>
    </header>
    <section class="row text-end" dir="rtl">
        @forelse($progects as $progect)
            <div class="col-lg-4 col-md-6 col-12 mmb-4">
                <div class="card h-100">
                    <div class="card-body">
                        @include('progects.footer')
                        <div class="statuse mb-2">
                            @switch($progects->status)
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
                            {{ $progect->description }}
                        </div>
                    </div>
                </div>

            </div>
            @empty 
            <div class="m-auto align-content-center text-center">
                <p>لوحة المشاريع فارغة</p>
                <div class="mt-5">
                    <a href="/progects/create" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">إنشاء مشروع جديد</a>
                </div>
            </div>

            @endforelse
    </section>
@endsection
