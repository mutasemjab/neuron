@php $s = $stat ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الرقم</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-4">
                <label class="form-label">القسم <span class="text-danger">*</span></label>
                <select name="section" class="form-select @error('section') is-invalid @enderror" required>
                    <option value="hero" @selected(old('section', $s->section ?? '') === 'hero')>الواجهة الرئيسية (Hero)</option>
                    <option value="main" @selected(old('section', $s->section ?? '') === 'main')>قسم الإحصائيات</option>
                </select>
                @error('section')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-4">
                <label class="form-label">الرقم <span class="text-danger">*</span></label>
                <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number', $s->number ?? 0) }}" required>
                @error('number')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-4">
                <label class="form-label">اللاحقة (اختياري)</label>
                <input type="text" name="suffix" class="form-control" value="{{ old('suffix', $s->suffix ?? '') }}" placeholder="+ أو %">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">التسمية (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="label_ar" class="form-control @error('label_ar') is-invalid @enderror" value="{{ old('label_ar', $s->label_ar ?? '') }}" required>
                @error('label_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Label (English) <span class="text-danger">*</span></label>
                <input type="text" name="label_en" dir="ltr" class="form-control @error('label_en') is-invalid @enderror" value="{{ old('label_en', $s->label_en ?? '') }}" required>
                @error('label_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $s->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $s->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
