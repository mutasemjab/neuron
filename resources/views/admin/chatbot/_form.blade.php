<div class="panel-card mb-3">
    <div class="panel-card-body">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-medium">التصنيف <span class="text-danger">*</span></label>
                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                    @php
                        $cats = [
                            'general'   => 'عام',
                            'services'  => 'الخدمات والعلاجات',
                            'doctors'   => 'الأطباء',
                            'locations' => 'المواقع والفروع',
                            'insurance' => 'التأمين',
                            'hours'     => 'أوقات العمل والمواعيد',
                            'pricing'   => 'الأسعار',
                            'faq'       => 'أسئلة شائعة',
                        ];
                    @endphp
                    @foreach($cats as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $chatbot?->category ?? '') === $val ? 'selected' : '' }}>
                            {{ $label }} ({{ $val }})
                        </option>
                    @endforeach
                </select>
                @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3">
                <label class="form-label fw-medium">الترتيب</label>
                <input type="number" name="order_index" class="form-control"
                    value="{{ old('order_index', $chatbot?->order_index ?? 0) }}" min="0">
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                        {{ old('is_active', $chatbot?->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label">نشط</label>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label fw-medium">العنوان (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror"
                    value="{{ old('title_ar', $chatbot?->title_ar ?? '') }}" required placeholder="مثال: ساعات العمل">
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6" dir="ltr">
                <label class="form-label fw-medium">Title (English)</label>
                <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror"
                    value="{{ old('title_en', $chatbot?->title_en ?? '') }}" placeholder="e.g. Working Hours">
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label fw-medium">المحتوى (عربي) <span class="text-danger">*</span></label>
                <textarea name="content_ar" rows="8" class="form-control @error('content_ar') is-invalid @enderror"
                    required placeholder="اكتب المعلومة بالكامل بالعربية...">{{ old('content_ar', $chatbot?->content_ar ?? '') }}</textarea>
                @error('content_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6" dir="ltr">
                <label class="form-label fw-medium">Content (English)</label>
                <textarea name="content_en" rows="8" class="form-control"
                    placeholder="Write the full information in English...">{{ old('content_en', $chatbot?->content_en ?? '') }}</textarea>
            </div>
        </div>

        <div class="mt-3">
            <label class="form-label fw-medium">الكلمات المفتاحية (tags)</label>
            <input type="text" name="tags" class="form-control"
                value="{{ old('tags', $chatbot?->tags ?? '') }}"
                placeholder="مثال: موعد، حجز، وقت، ساعات، عمل — افصل بين الكلمات بفاصلة">
            <div class="form-text">الكلمات المفتاحية تساعد في البحث الدقيق داخل قاعدة المعرفة</div>
        </div>

    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn-primary-sm px-4">
        <i class="bi bi-check-lg"></i> حفظ
    </button>
    <a href="{{ route('admin.chatbot.index') }}" class="btn-outline-sm">إلغاء</a>
</div>
