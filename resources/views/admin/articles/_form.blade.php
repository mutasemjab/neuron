@php $a = $article ?? null; @endphp

<div class="panel-card mb-3">
    <div class="panel-card-header"><h2 class="panel-card-title">محتوى المقال</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar', $a->title_ar ?? '') }}" required>
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $a->title_en ?? '') }}" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">التصنيف (عربي)</label>
                <input type="text" name="category_ar" class="form-control" value="{{ old('category_ar', $a->category_ar ?? '') }}" placeholder="آلام الظهر">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Category (English)</label>
                <input type="text" name="category_en" dir="ltr" class="form-control" value="{{ old('category_en', $a->category_en ?? '') }}" placeholder="Back Pain">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">مقتطف (عربي) <span class="text-danger">*</span></label>
                <textarea name="excerpt_ar" rows="2" class="form-control @error('excerpt_ar') is-invalid @enderror" required>{{ old('excerpt_ar', $a->excerpt_ar ?? '') }}</textarea>
                @error('excerpt_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Excerpt (English) <span class="text-danger">*</span></label>
                <textarea name="excerpt_en" dir="ltr" rows="2" class="form-control @error('excerpt_en') is-invalid @enderror" required>{{ old('excerpt_en', $a->excerpt_en ?? '') }}</textarea>
                @error('excerpt_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">نص المقال (عربي) <span class="text-danger">*</span></label>
                <textarea name="body_ar" rows="8" class="form-control @error('body_ar') is-invalid @enderror" required>{{ old('body_ar', $a->body_ar ?? '') }}</textarea>
                @error('body_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Article Body (English) <span class="text-danger">*</span></label>
                <textarea name="body_en" dir="ltr" rows="8" class="form-control @error('body_en') is-invalid @enderror" required>{{ old('body_en', $a->body_en ?? '') }}</textarea>
                @error('body_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12">
                <label class="form-label">صورة المقال</label>
                @if($a && $a->image)
                    <div class="mb-2"><img src="{{ $a->image_url }}" style="height:80px;width:140px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0"></div>
                @endif
                <input type="file" name="image" accept="image/*" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">دقائق القراءة</label>
                <input type="number" name="read_minutes" class="form-control" value="{{ old('read_minutes', $a->read_minutes ?? 5) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">تاريخ النشر</label>
                <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $a?->published_at?->format('Y-m-d')) }}">
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $a->is_active ?? true))>
                    <label class="form-check-label" for="is_active">منشور</label>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="panel-card mb-3">
    <div class="panel-card-header"><h2 class="panel-card-title">SEO</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label class="form-label">عنوان SEO (عربي)</label>
                <input type="text" name="meta_title_ar" class="form-control" value="{{ old('meta_title_ar', $a->meta_title_ar ?? '') }}">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Meta Title (English)</label>
                <input type="text" name="meta_title_en" dir="ltr" class="form-control" value="{{ old('meta_title_en', $a->meta_title_en ?? '') }}">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">وصف SEO (عربي)</label>
                <textarea name="meta_description_ar" rows="2" class="form-control">{{ old('meta_description_ar', $a->meta_description_ar ?? '') }}</textarea>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Meta Description (English)</label>
                <textarea name="meta_description_en" dir="ltr" rows="2" class="form-control">{{ old('meta_description_en', $a->meta_description_en ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ المقال</button>
