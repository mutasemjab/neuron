@php $f = $faq ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات السؤال</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">السؤال (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="question_ar" class="form-control @error('question_ar') is-invalid @enderror" value="{{ old('question_ar', $f->question_ar ?? '') }}" required>
                @error('question_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Question (English) <span class="text-danger">*</span></label>
                <input type="text" name="question_en" dir="ltr" class="form-control @error('question_en') is-invalid @enderror" value="{{ old('question_en', $f->question_en ?? '') }}" required>
                @error('question_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الإجابة (عربي) <span class="text-danger">*</span></label>
                <textarea name="answer_ar" rows="4" class="form-control @error('answer_ar') is-invalid @enderror" required>{{ old('answer_ar', $f->answer_ar ?? '') }}</textarea>
                @error('answer_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Answer (English) <span class="text-danger">*</span></label>
                <textarea name="answer_en" dir="ltr" rows="4" class="form-control @error('answer_en') is-invalid @enderror" required>{{ old('answer_en', $f->answer_en ?? '') }}</textarea>
                @error('answer_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $f->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $f->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
