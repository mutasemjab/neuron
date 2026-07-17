@php $b = $branch ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الفرع</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">اسم الفرع (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar', $b->name_ar ?? '') }}" required placeholder="فرع عمّان – الشميساني">
                @error('name_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Branch Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="name_en" dir="ltr" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en', $b->name_en ?? '') }}" required>
                @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">شارة الفرع (عربي)</label>
                <input type="text" name="badge_ar" class="form-control" value="{{ old('badge_ar', $b->badge_ar ?? '') }}" placeholder="الفرع الرئيسي / مفتوح">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Badge (English)</label>
                <input type="text" name="badge_en" dir="ltr" class="form-control" value="{{ old('badge_en', $b->badge_en ?? '') }}" placeholder="Main Branch / Open">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                <textarea name="address_ar" rows="2" class="form-control @error('address_ar') is-invalid @enderror" required>{{ old('address_ar', $b->address_ar ?? '') }}</textarea>
                @error('address_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Address (English) <span class="text-danger">*</span></label>
                <textarea name="address_en" dir="ltr" rows="2" class="form-control @error('address_en') is-invalid @enderror" required>{{ old('address_en', $b->address_en ?? '') }}</textarea>
                @error('address_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">ساعات العمل (عربي)</label>
                <input type="text" name="working_hours_ar" class="form-control" value="{{ old('working_hours_ar', $b->working_hours_ar ?? '') }}" placeholder="السبت – الخميس 9ص – 9م">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Working Hours (English)</label>
                <input type="text" name="working_hours_en" dir="ltr" class="form-control" value="{{ old('working_hours_en', $b->working_hours_en ?? '') }}">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" dir="ltr" class="form-control" value="{{ old('phone', $b->phone ?? '') }}">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">نص البحث في خرائط جوجل</label>
                <input type="text" name="map_query" dir="ltr" class="form-control" value="{{ old('map_query', $b->map_query ?? '') }}" placeholder="Shmeisani Amman Jordan">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $b->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_main" value="1" id="is_main" @checked(old('is_main', $b->is_main ?? false))>
                    <label class="form-check-label" for="is_main">فرع رئيسي</label>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $b->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
