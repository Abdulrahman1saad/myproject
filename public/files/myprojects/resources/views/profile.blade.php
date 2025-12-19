@extends('layouts.app')

@section('title', 'الملف الشخصي')


@section('content')

    <div class="row justify-content-center text-right">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="text-center">
                    <img src="{{ asset(auth()->user()->image) }}" width="82px" height="82px" alt="profile">
                    <h3 class="mt-4 fw-bold">{{ auth()->user()->name }}</h3>
                </div>
                <div class="card-body">
                    <form action="/profile" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" name="name" id="name" class="form-control text-right @error('name') is-invalid @enderror" autocomplete="name" autofocus value="{{ auth()->user()->name }}">
                            @error('name')
                            <div class="text-danger mt-2"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input name="email" type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                autocomplete="email" value="{{ auth()->user()->email }}">
                            @error('email')
                            <div class="text-danger mt-2"><small>{{ $message }}</small></div>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">
                            @error('password')
                            <div class="text-danger mt-2"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">تأكيد كلمة المرور</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                autocomplete="new-password">
                        </div>
                        <div class="mb-3">
                            <label for="image">تغيير الصورة الشخصية</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label text-left" id="image-label" for="image" data-browse="استعرض"></label>
                                @error('image')
                                <div class="text-danger mt-2"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex mt-5">
                            <button type="submit" class="btn btn-primary me-2">
                                حفظ التعديلات
                            </button>
                            <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                        </div>
                    </form>
                    <form action="/logout" method="POST" id="logout">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('image').onchange = uploadOnChange;
        function uploadOnChange() {
            let filename = this.value;
            let lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
            document.getElementById('image-label').innerHTML = filename;
        }
    </script>
@endsection