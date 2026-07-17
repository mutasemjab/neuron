@php $j = $job ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الوظيفة</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">المسمى الوظيفي (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar', $j->title_ar ?? '') }}" required>
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Job Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $j->title_en ?? '') }}" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">نوع الدوام (عربي)</label>
                <input type="text" name="type_ar" class="form-control" value="{{ old('type_ar', $j->type_ar ?? '') }}" placeholder="دوام كامل / دوام جزئي">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Job Type (English)</label>
                <input type="text" name="type_en" dir="ltr" class="form-control" value="{{ old('type_en', $j->type_en ?? '') }}" placeholder="Full-time / Part-time">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الوصف (عربي) <span class="text-danger">*</span></label>
                <textarea name="description_ar" rows="3" class="form-control @error('description_ar') is-invalid @enderror" required>{{ old('description_ar', $j->description_ar ?? '') }}</textarea>
                @error('description_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Description (English) <span class="text-danger">*</span></label>
                <textarea name="description_en" dir="ltr" rows="3" class="form-control @error('description_en') is-invalid @enderror" required>{{ old('description_en', $j->description_en ?? '') }}</textarea>
                @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الموقع (عربي)</label>
                <input type="text" name="location_ar" class="form-control" value="{{ old('location_ar', $j->location_ar ?? '') }}" placeholder="عمّان">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Location (English)</label>
                <input type="text" name="location_en" dir="ltr" class="form-control" value="{{ old('location_en', $j->location_en ?? '') }}" placeholder="Amman">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $j->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $j->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
