<div class="mb-3">
    <label for="title" class="form-label">عنوان المشروع</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$project->title ?? ''}}">
    @error('title')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">وصف المشروع</label>
    <textarea name="description" id="description" class="form-control text-right  @error('description') is-invalid @enderror" cols="30" rows="10">{{$project->description ?? ''}}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>