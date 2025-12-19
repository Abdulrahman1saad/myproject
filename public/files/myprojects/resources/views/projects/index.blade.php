@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects" class="text-decoration-none">المشاريع</a>
        </div>
        <div>
            <a href="/projects/create" lass="btn btn-primary px-4">مشروع جديد</a>
        </div>    
    </header>

    <section class="row text-end" dir="rtl">
        @forelse ($projects as $project)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="status mb-2">
                            @switch($project->status)
                                @case(1)
                                    <span class="text-success">مكتمل</span>
                                    @break
                                @case(2)
                                    <span class="text-danger">ملغي</span>
                                    @break
                                @default
                                    <span class="text-warning">قيد الإنجاز</span>
                            @endswitch
                        </div>
                        <h5 class="fw-bold card-title">
                            <a href="/projects/{{$project->id}}" class="text-decoration-none">{{$project->title}}</a>
                        </h5>
                        <div class="card-text mt-3">{{Str::limit($project->description, 150)}}</div>
                    </div>
                    @include('projects.footer')
                </div>
            </div>
        @empty
        <div class="m-auto align-content-center text-center">
            <p>لوحة العمل خالية من المشاريع.</p>
            <div class="mt-5">
                <a href="/projects/create" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">
                    أنشئ مشروعًا جديدًا الآن
                </a>
            </div>
        </div>
        @endforelse
    </section>
@endsection