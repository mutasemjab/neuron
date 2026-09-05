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

 <div class="row" style="row-gap: 150px;">

    <div class="col-12 col-md-6">
        <label class="form-label">
            مقتطف (عربي) <span class="text-danger">*</span>
        </label>

        <div id="editor_excerpt_ar"
             class="rte-editor rte-editor-sm"
             dir="rtl">
            {!! old('excerpt_ar', $a->excerpt_ar ?? '') !!}
        </div>

        <textarea name="excerpt_ar"
                  class="rte-source @error('excerpt_ar') is-invalid @enderror">{{ old('excerpt_ar', $a->excerpt_ar ?? '') }}</textarea>

        @error('excerpt_ar')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="col-12 col-md-6">
        <label class="form-label">
            Excerpt (English) <span class="text-danger">*</span>
        </label>

        <div id="editor_excerpt_en"
             class="rte-editor rte-editor-sm"
             dir="ltr">
            {!! old('excerpt_en', $a->excerpt_en ?? '') !!}
        </div>

        <textarea name="excerpt_en"
                  class="rte-source @error('excerpt_en') is-invalid @enderror">{{ old('excerpt_en', $a->excerpt_en ?? '') }}</textarea>

        @error('excerpt_en')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="col-12 col-md-6">
        <label class="form-label">
            نص المقال (عربي) <span class="text-danger">*</span>
        </label>

        <div id="editor_body_ar"
             class="rte-editor"
             dir="rtl">
            {!! old('body_ar', $a->body_ar ?? '') !!}
        </div>

        <textarea name="body_ar"
                  class="rte-source @error('body_ar') is-invalid @enderror">{{ old('body_ar', $a->body_ar ?? '') }}</textarea>

        @error('body_ar')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="col-12 col-md-6">
        <label class="form-label">
            Article Body (English) <span class="text-danger">*</span>
        </label>

        <div id="editor_body_en"
             class="rte-editor"
             dir="ltr">
            {!! old('body_en', $a->body_en ?? '') !!}
        </div>

        <textarea name="body_en"
                  class="rte-source @error('body_en') is-invalid @enderror">{{ old('body_en', $a->body_en ?? '') }}</textarea>

        @error('body_en')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>

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

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<style>
.rte-source { position:absolute; width:1px; height:1px; padding:0; margin:0; border:0; overflow:hidden; clip:rect(0 0 0 0); white-space:nowrap; }
.rte-editor { background:#fff; border-radius:0 0 6px 6px; }
.rte-editor .ql-editor { min-height:220px; font-size:1rem; }
.rte-editor-sm .ql-editor { min-height:70px; }
.rte-editor .ql-toolbar { border-radius:6px 6px 0 0; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
(function () {
    const uploadUrl = @json(route('admin.articles.editor-image'));
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function imageHandler() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.addEventListener('change', () => {
            const file = input.files[0];
            if (!file) return;
            const quill = this.quill;
            const range = quill.getSelection(true);
            const formData = new FormData();
            formData.append('image', file);
            fetch(uploadUrl, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: formData,
            })
                .then(res => res.json())
                .then(data => {
                    if (data.location) quill.insertEmbed(range.index, 'image', data.location, 'user');
                })
                .catch(() => alert('تعذر رفع الصورة.'));
        });
        input.click();
    }

    const smallToolbar = [['bold', 'italic', 'underline'], [{ color: [] }], ['link'], ['clean']];
    const fullToolbar = [
        [{ header: [2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ color: [] }, { background: [] }],
        [{ list: 'ordered' }, { list: 'bullet' }],
        ['blockquote', 'link', 'image'],
        ['clean'],
    ];

    function initEditor(editorId, toolbar, withImage) {
        const container = document.getElementById(editorId);
        if (!container) return;
        const source = container.nextElementSibling;

        const quill = new Quill(container, {
            theme: 'snow',
            modules: {
                toolbar: withImage ? { container: toolbar, handlers: { image: imageHandler } } : toolbar,
            },
        });

        quill.on('text-change', () => { source.value = quill.root.innerHTML; });

        container.closest('form').addEventListener('submit', () => {
            source.value = quill.root.innerHTML;
        });
    }

    initEditor('editor_excerpt_ar', smallToolbar, false);
    initEditor('editor_excerpt_en', smallToolbar, false);
    initEditor('editor_body_ar', fullToolbar, true);
    initEditor('editor_body_en', fullToolbar, true);
})();
</script>
@endpush
