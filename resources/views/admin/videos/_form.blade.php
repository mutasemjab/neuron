@php $v = $video ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الفيديو</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar', $v->title_ar ?? '') }}" required>
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $v->title_en ?? '') }}" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الوسم (عربي)</label>
                <input type="text" name="tag_ar" class="form-control" value="{{ old('tag_ar', $v->tag_ar ?? '') }}" placeholder="جولة افتراضية">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Tag (English)</label>
                <input type="text" name="tag_en" dir="ltr" class="form-control" value="{{ old('tag_en', $v->tag_en ?? '') }}" placeholder="Virtual Tour">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">رابط الفيديو (يوتيوب)</label>
                <input type="url" name="video_url" dir="ltr" class="form-control @error('video_url') is-invalid @enderror" value="{{ old('video_url', $v->video_url ?? '') }}">
                @error('video_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">الصورة المصغرة</label>
                @if($v && $v->thumbnail)
                    <div class="mb-2"><img src="{{ $v->thumbnail_url }}" style="height:60px;width:100px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0"></div>
                @endif
                <input type="file" name="thumbnail" accept="image/*" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $v->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_main" value="1" id="is_main" @checked(old('is_main', $v->is_main ?? false))>
                    <label class="form-check-label" for="is_main">فيديو رئيسي (بطاقة كبيرة)</label>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $v->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
