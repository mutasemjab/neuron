@php
    $isAr    = app()->getLocale() === 'ar';
    $default = collect($countries)->firstWhere('iso', 'JO') ?? $countries[0];
    $flag    = fn ($iso) => 'https://flagcdn.com/w40/' . strtolower($iso) . '.png';
@endphp

<div class="cc-picker" data-cc>
    <input type="hidden" name="phone_country_code" value="{{ $default['dial'] }}" data-cc-value>

    <button type="button" class="cc-btn" data-cc-btn aria-haspopup="listbox" aria-expanded="false">
        <img class="cc-flag" src="{{ $flag($default['iso']) }}" alt="" data-cc-flag>
        <span class="cc-dial" dir="ltr" data-cc-dial>{{ $default['dial'] }}</span>
        <svg class="cc-chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
    </button>

    <div class="cc-panel" data-cc-panel hidden>
        <input type="text" class="cc-search" data-cc-search placeholder="{{ $isAr ? 'ابحث عن دولة...' : 'Search country...' }}" autocomplete="off">
        <ul class="cc-list" role="listbox">
            @foreach ($countries as $country)
                <li role="option" class="cc-item @if ($country['iso'] === $default['iso']) is-selected @endif"
                    data-dial="{{ $country['dial'] }}"
                    data-flag="{{ $flag($country['iso']) }}"
                    data-search="{{ mb_strtolower($country['name_ar'] . ' ' . $country['name_en'] . ' ' . $country['dial']) }}">
                    <img class="cc-flag" src="{{ $flag($country['iso']) }}" alt="" loading="lazy">
                    <span class="cc-name">{{ $isAr ? $country['name_ar'] : $country['name_en'] }}</span>
                    <span class="cc-code" dir="ltr">{{ $country['dial'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@once
    @push('styles')
        <style>
            .cc-picker { position: relative; flex: 0 0 140px; }
            .cc-btn {
                width: 100%; height: 100%; min-height: 50px;
                display: flex; align-items: center; gap: 8px;
                padding: 0 12px; background: #fff;
                border: 1.5px solid var(--line-2); border-radius: 12px;
                cursor: pointer; font: inherit; color: var(--ink);
                transition: border-color .25s;
                -webkit-appearance: none; appearance: none;
            }
            .cc-btn:hover, .cc-picker.open .cc-btn { border-color: var(--teal); }
            .cc-flag { width: 24px; height: 17px; object-fit: cover; border-radius: 3px; box-shadow: 0 0 0 1px rgba(0,0,0,.1); flex-shrink: 0; }
            .cc-dial { font-weight: 700; font-size: .92rem; font-family: var(--f-num); }
            .cc-chev { width: 14px; height: 14px; margin-inline-start: auto; color: var(--muted); transition: transform .25s; }
            .cc-picker.open .cc-chev { transform: rotate(180deg); }

            .cc-panel {
                position: absolute; top: calc(100% + 6px); left: 0; z-index: 60;
                width: 300px; max-width: 86vw;
                background: #fff; border: 1px solid var(--line); border-radius: 14px;
                box-shadow: var(--shadow-lg); overflow: hidden;
                direction: ltr;
            }
            [dir="rtl"] .cc-panel { direction: rtl; }
            .cc-panel[hidden] { display: none; }
            .cc-search {
                width: 100%; border: 0; border-bottom: 1px solid var(--line);
                padding: 12px 14px; font: inherit; font-size: .9rem; outline: none; background: #fafcfc;
            }
            .cc-list { list-style: none; margin: 0; padding: 6px; max-height: 260px; overflow-y: auto; }
            .cc-item {
                display: flex; align-items: center; gap: 10px;
                padding: 9px 10px; border-radius: 8px; cursor: pointer; font-size: .9rem;
            }
            .cc-item:hover { background: var(--teal-light); }
            .cc-item.is-selected { background: var(--teal-light); font-weight: 700; }
            .cc-item .cc-name { flex: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
            .cc-item .cc-code { color: var(--muted); font-family: var(--f-num); font-size: .84rem; }
            .cc-item[hidden] { display: none; }

            @media (max-width: 600px) { .cc-picker { flex: 0 0 auto; } }
        </style>
    @endpush

    @push('scripts')
        <script>
            (function () {
                document.querySelectorAll('[data-cc]').forEach(function (root) {
                    const btn = root.querySelector('[data-cc-btn]');
                    const panel = root.querySelector('[data-cc-panel]');
                    const search = root.querySelector('[data-cc-search]');
                    const items = root.querySelectorAll('.cc-item');
                    const value = root.querySelector('[data-cc-value]');

                    function close() { panel.hidden = true; root.classList.remove('open'); btn.setAttribute('aria-expanded', 'false'); }
                    function open() {
                        panel.hidden = false; root.classList.add('open'); btn.setAttribute('aria-expanded', 'true');
                        search.value = ''; items.forEach(i => i.hidden = false); search.focus();
                        const sel = root.querySelector('.cc-item.is-selected');
                        if (sel) sel.scrollIntoView({ block: 'nearest' });
                    }

                    btn.addEventListener('click', () => panel.hidden ? open() : close());
                    search.addEventListener('input', () => {
                        const q = search.value.trim().toLowerCase();
                        items.forEach(i => i.hidden = q !== '' && !i.dataset.search.includes(q));
                    });
                    items.forEach(function (item) {
                        item.addEventListener('click', function () {
                            value.value = item.dataset.dial;
                            root.querySelector('[data-cc-dial]').textContent = item.dataset.dial;
                            root.querySelector('[data-cc-flag]').src = item.dataset.flag;
                            items.forEach(i => i.classList.remove('is-selected'));
                            item.classList.add('is-selected');
                            close();
                        });
                    });
                    document.addEventListener('click', e => { if (!root.contains(e.target)) close(); });
                    document.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
                });
            })();
        </script>
    @endpush
@endonce
