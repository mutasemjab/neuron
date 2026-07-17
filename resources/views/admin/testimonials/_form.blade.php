@php $t = $testimonial ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الشهادة</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">اسم المريض (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="patient_name_ar" class="form-control @error('patient_name_ar') is-invalid @enderror" value="{{ old('patient_name_ar', $t->patient_name_ar ?? '') }}" required>
                @error('patient_name_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Patient Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="patient_name_en" dir="ltr" class="form-control @error('patient_name_en') is-invalid @enderror" value="{{ old('patient_name_en', $t->patient_name_en ?? '') }}" required>
                @error('patient_name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الوصف (عربي)</label>
                <input type="text" name="role_text_ar" class="form-control" value="{{ old('role_text_ar', $t->role_text_ar ?? '') }}" placeholder="مريض – فرع عمّان">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Role Text (English)</label>
                <input type="text" name="role_text_en" dir="ltr" class="form-control" value="{{ old('role_text_en', $t->role_text_en ?? '') }}" placeholder="Patient – Amman Branch">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الشهادة (عربي) <span class="text-danger">*</span></label>
                <textarea name="quote_ar" rows="3" class="form-control @error('quote_ar') is-invalid @enderror" required>{{ old('quote_ar', $t->quote_ar ?? '') }}</textarea>
                @error('quote_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Quote (English) <span class="text-danger">*</span></label>
                <textarea name="quote_en" dir="ltr" rows="3" class="form-control @error('quote_en') is-invalid @enderror" required>{{ old('quote_en', $t->quote_en ?? '') }}</textarea>
                @error('quote_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الطبيب المعالج</label>
                <select name="doctor_id" class="form-select @error('doctor_id') is-invalid @enderror">
                    <option value="">— بدون تحديد —</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" @selected(old('doctor_id', $t->doctor_id ?? '') == $doctor->id)>{{ $doctor->name_ar }} — {{ $doctor->specialization_ar }}</option>
                    @endforeach
                </select>
                @error('doctor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">التقييم (1-5)</label>
                <input type="number" name="rating" min="1" max="5" class="form-control" value="{{ old('rating', $t->rating ?? 5) }}">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">العملية / الإجراء (عربي)</label>
                <input type="text" name="procedure_ar" class="form-control" value="{{ old('procedure_ar', $t->procedure_ar ?? '') }}" placeholder="مثال: جراحة الديسك بالمنظار">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Procedure (English)</label>
                <input type="text" name="procedure_en" dir="ltr" class="form-control" value="{{ old('procedure_en', $t->procedure_en ?? '') }}" placeholder="e.g. Endoscopic disc surgery">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">صورة المريض</label>
                @if($t && $t->avatar)
                    <div class="mb-2"><img src="{{ $t->avatar_url }}" style="height:60px;width:60px;object-fit:cover;border-radius:50%;border:1px solid #e2e8f0"></div>
                @endif
                <input type="file" name="avatar" accept="image/*" class="form-control">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $t->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $t->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
