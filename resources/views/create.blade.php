@extends('layouts.app')
@section('title', 'Emergency Blood Request')



@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Hind+Siliguri:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    :root {
        --red:       #e8192c;
        --red-dark:  #b5101e;
        --red-glow:  rgba(232,25,44,0.18);
        --navy:      #0d1b2a;
        --navy-mid:  #162032;
        --card-bg:   #ffffff;
        --text-main: #1a1a2e;
        --text-muted:#64748b;
        --border:    #e2e8f0;
        --input-bg:  #f8fafc;
    }

    body { background: #f1f4f8; }

    /* ── PAGE WRAPPER ── */
    .em-page {
        min-height: 100vh;
        padding: 0 0 80px;
        font-family: 'Hind Siliguri', sans-serif;
    }

    /* ── HERO BANNER ── */
    .em-hero {
        background: linear-gradient(135deg, var(--navy) 0%, #1a0a0d 60%, #2d0810 100%);
        padding: 56px 24px 64px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .em-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 60% 50% at 50% 100%, rgba(232,25,44,0.25) 0%, transparent 70%),
            repeating-linear-gradient(45deg, transparent, transparent 40px, rgba(255,255,255,0.015) 40px, rgba(255,255,255,0.015) 41px);
        pointer-events: none;
    }
    .em-hero .pulse-ring {
        width: 80px; height: 80px;
        background: var(--red);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 24px;
        position: relative;
        box-shadow: 0 0 0 0 rgba(232,25,44,0.5);
        animation: pulseRing 2s infinite;
    }
    .em-hero .pulse-ring svg { width:38px; height:38px; fill:#fff; }
    @keyframes pulseRing {
        0%   { box-shadow: 0 0 0 0   rgba(232,25,44,0.6); }
        70%  { box-shadow: 0 0 0 22px rgba(232,25,44,0);   }
        100% { box-shadow: 0 0 0 0   rgba(232,25,44,0);   }
    }
    .em-hero h1 {
        font-family: 'Rajdhani', sans-serif;
        font-size: clamp(1.8rem, 5vw, 2.8rem);
        font-weight: 700;
        color: #fff;
        letter-spacing: 1px;
        margin: 0 0 10px;
        position: relative;
    }
    .em-hero h1 span { color: var(--red); }
    .em-hero p {
        color: rgba(255,255,255,0.62);
        font-size: 1rem;
        margin: 0;
        position: relative;
    }

    /* ── STEP BADGES ── */
    .em-steps {
        display: flex;
        justify-content: center;
        gap: 0;
        margin: -20px auto 0;
        max-width: 560px;
        position: relative;
        z-index: 2;
        padding: 0 16px;
    }
    .em-step {
        flex: 1;
        background: #fff;
        border-top: 3px solid var(--border);
        text-align: center;
        padding: 14px 8px 12px;
        font-size: 0.72rem;
        color: var(--text-muted);
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        position: relative;
        transition: border-color .2s;
    }
    .em-step:first-child { border-radius: 12px 0 0 0; }
    .em-step:last-child  { border-radius: 0 12px 0 0; }
    .em-step.active { border-top-color: var(--red); color: var(--red); }
    .em-step .step-num {
        display: block;
        font-family: 'Rajdhani', sans-serif;
        font-size: 1.3rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 3px;
    }

    /* ── CARD ── */
    .em-card {
        max-width: 640px;
        margin: 0 auto;
        background: #fff;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 8px 40px rgba(0,0,0,0.10);
        overflow: hidden;
    }

    /* ── ALERT ── */
    .em-alert {
        display: flex; align-items: center; gap: 12px;
        padding: 14px 20px;
        border-radius: 10px;
        margin: 24px 28px 0;
        font-size: .9rem; font-weight: 500;
    }
    .em-alert.success { background:#d1fae5; color:#065f46; border-left: 4px solid #10b981; }
    .em-alert.warning { background:#fef3c7; color:#92400e; border-left: 4px solid #f59e0b; }

    /* ── FORM BODY ── */
    .em-form-body { padding: 28px 28px 32px; }

    .em-section-title {
        font-family: 'Rajdhani', sans-serif;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--red);
        margin: 0 0 16px;
        padding-bottom: 8px;
        border-bottom: 2px solid #fde8ea;
        display: flex; align-items: center; gap: 8px;
    }

    .em-row { display: grid; gap: 16px; margin-bottom: 16px; }
    .em-row.col-2 { grid-template-columns: 1fr 1fr; }
    .em-row.col-1 { grid-template-columns: 1fr; }

    .em-field { display: flex; flex-direction: column; gap: 6px; }
    .em-field label {
        font-size: .82rem;
        font-weight: 600;
        color: var(--text-main);
        display: flex; align-items: center; gap: 5px;
    }
    .em-field label .req { color: var(--red); }
    .em-field label .icon { font-size: .9rem; }

    .em-field input,
    .em-field select,
    .em-field textarea {
        background: var(--input-bg);
        border: 1.5px solid var(--border);
        border-radius: 10px;
        padding: 11px 14px;
        font-size: .92rem;
        font-family: 'Hind Siliguri', sans-serif;
        color: var(--text-main);
        transition: border-color .2s, box-shadow .2s, background .2s;
        outline: none;
        width: 100%;
        box-sizing: border-box;
    }
    .em-field input:focus,
    .em-field select:focus,
    .em-field textarea:focus {
        border-color: var(--red);
        background: #fff;
        box-shadow: 0 0 0 3px var(--red-glow);
    }
    .em-field input.is-invalid,
    .em-field select.is-invalid {
        border-color: #f87171;
        background: #fff5f5;
    }
    .em-field .invalid-msg {
        font-size: .78rem;
        color: #dc2626;
        margin-top: 2px;
    }
    .em-field select { appearance: none; cursor: pointer; }
    .em-select-wrap { position: relative; }
    .em-select-wrap::after {
        content: '▾';
        position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
        color: var(--text-muted); pointer-events: none; font-size:.85rem;
    }

    /* blood group grid */
    .blood-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 8px;
    }
    .blood-opt { display: none; }
    .blood-opt + label {
        display: flex; align-items: center; justify-content: center;
        border: 2px solid var(--border);
        border-radius: 10px;
        padding: 10px 6px;
        font-family: 'Rajdhani', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-muted);
        cursor: pointer;
        transition: all .18s;
        user-select: none;
    }
    .blood-opt:checked + label {
        border-color: var(--red);
        background: var(--red);
        color: #fff;
        box-shadow: 0 4px 12px var(--red-glow);
    }
    .blood-opt + label:hover { border-color: var(--red); color: var(--red); }

    /* counter input */
    .counter-wrap {
        display: flex; align-items: center;
        border: 1.5px solid var(--border);
        border-radius: 10px;
        overflow: hidden;
        background: var(--input-bg);
        transition: border-color .2s, box-shadow .2s;
    }
    .counter-wrap:focus-within {
        border-color: var(--red);
        box-shadow: 0 0 0 3px var(--red-glow);
    }
    .counter-btn {
        background: none; border: none;
        padding: 0 16px; font-size: 1.3rem;
        color: var(--red); cursor: pointer;
        transition: background .15s;
        height: 44px; line-height: 44px;
    }
    .counter-btn:hover { background: #fde8ea; }
    .counter-wrap input {
        border: none; background: transparent;
        text-align: center; width: 56px;
        font-size: 1rem; font-weight: 700;
        box-shadow: none !important;
        padding: 0;
    }

    /* ── INFO BOX ── */
    .em-info-box {
        background: linear-gradient(135deg, #fff5f5 0%, #fce7e9 100%);
        border: 1px solid #fecdd3;
        border-radius: 12px;
        padding: 14px 18px;
        margin-bottom: 24px;
        display: flex; gap: 12px; align-items: flex-start;
    }
    .em-info-box .icon { font-size: 1.4rem; flex-shrink: 0; margin-top: 1px; }
    .em-info-box p { margin: 0; font-size: .84rem; color: #9b1c1c; line-height: 1.6; }
    .em-info-box strong { color: var(--red); }

    /* ── SUBMIT BUTTON ── */
    .em-submit {
        width: 100%;
        background: var(--red);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 15px;
        font-family: 'Rajdhani', sans-serif;
        font-size: 1.15rem;
        font-weight: 700;
        letter-spacing: 1px;
        cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 10px;
        transition: background .2s, transform .15s, box-shadow .2s;
        box-shadow: 0 4px 20px rgba(232,25,44,0.35);
    }
    .em-submit:hover {
        background: var(--red-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(232,25,44,0.45);
    }
    .em-submit:active { transform: translateY(0); }
    .em-submit .spinner {
        display: none;
        width: 18px; height: 18px;
        border: 2px solid rgba(255,255,255,.4);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin .7s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    .em-note {
        text-align: center;
        color: var(--text-muted);
        font-size: .8rem;
        margin-top: 12px;
    }
    .em-note span { color: var(--red); font-weight: 600; }

    /* divider */
    .em-divider {
        border: none;
        border-top: 1.5px dashed #e9d8da;
        margin: 24px 0;
    }

    @media (max-width: 600px) {
        .em-form-body { padding: 20px 16px 24px; }
        .em-row.col-2 { grid-template-columns: 1fr; }
        .em-hero { padding: 40px 16px 56px; }
        .em-card { border-radius: 0; box-shadow: none; }
        .em-steps { max-width: 100%; }
    }
</style>
@endpush

@section('content')
<div class="em-page">

    {{-- ── HERO ── --}}
    <div class="em-hero">
        <div class="pulse-ring">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/>
            </svg>
        </div>
        <h1>Emergency <span>Blood</span> Request</h1>
        <p>AI স্বয়ংক্রিয়ভাবে সেরা ৫ জন উপযুক্ত donor খুঁজে Message পাঠাবে</p>
    </div>

    {{-- ── STEP INDICATORS ── --}}
    <div class="em-steps">
        <div class="em-step active">
            <span class="step-num">১</span>
            তথ্য দিন
        </div>
        <div class="em-step active">
            <span class="step-num">২</span>
            AI খোঁজে
        </div>
        <div class="em-step active">
            <span class="step-num">৩</span>
            Message যায়
        </div>
    </div>

    {{-- ── CARD ── --}}
    <div class="em-card">

        {{-- Alerts --}}

        @if(session('success'))
        <div class="em-alert success">
            <span></span>
            <div>{{ session('success') }}</div>
        </div>
        @endif

        @if(session('warning'))
        <div class="em-alert warning">
            <span></span>
            <div>{{ session('warning') }}</div>
        </div>
        @endif

        @if(session('error'))
        <div class="em-alert error">
            <span></span>
            <div>{{ session('error') }}</div>
        </div>
        @endif

        @if ($errors->any())
        <div class="em-alert error">
            <span></span>

            <div>
                <strong>Validation Failed!</strong>

                <ul style="margin:8px 0 0 18px; padding:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form action="{{ route('emergency.store') }}" method="POST" id="emergencyForm">
            @csrf
            <div class="em-form-body">

                {{-- INFO BOX --}}
                <div class="em-info-box">
                    <span class="icon">🤖</span>
                    <p>
                        <strong>AI Priority System:</strong> আপনার Blood Group, জেলা এবং সর্বশেষ donation date অনুযায়ী
                        সবচেয়ে উপযুক্ত <strong>৫ জন donor</strong> কে স্বয়ংক্রিয়ভাবে Message পাঠানো হবে।
                    </p>
                </div>

                {{-- PATIENT INFO --}}
                <div class="em-section-title">
                    <span>🏥</span> রোগীর তথ্য
                </div>

                <div class="em-row col-12">
                    <div class="em-field">
                        <label><span class="icon">👤</span> রোগীর নাম <span class="req">*</span></label>
                        <input type="text" required name="patient_name"
                            placeholder="রোগীর পুরো নাম লিখুন"
                            value="{{ old('patient_name') }}"
                            class="{{ $errors->has('patient_name') ? 'is-invalid' : '' }}">
                        @error('patient_name')<div class="invalid-msg">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="em-row col-12">
                    <div class="em-field">
                        <label><span class="icon">🏨</span> হাসপাতাল <span class="req">*</span></label>
                        <input type="text" name="hospital_name" required
                            placeholder="হাসপাতালের নাম ও ঠিকানা"
                            value="{{ old('hospital_name') }}"
                            class="{{ $errors->has('hospital_name') ? 'is-invalid' : '' }}">
                        @error('hospital_name')<div class="invalid-msg">{{ $message }}</div>@enderror
                    </div>
                    <div class="em-field">
                        <label><span class="icon">📞</span> যোগাযোগ নম্বর <span class="req">*</span></label>
                        <input type="text" name="contact_number" required
                            placeholder="01XXXXXXXXX"
                            value="{{ old('contact_number') }}"
                            class="{{ $errors->has('contact_number') ? 'is-invalid' : '' }}">
                        @error('contact_number')<div class="invalid-msg">{{ $message }}</div>@enderror
                    </div>
                </div>

                <hr class="em-divider">

                {{-- BLOOD INFO --}}
                <div class="em-section-title">
                    <span>🩸</span> রক্তের তথ্য
                </div>

                <div class="em-field" style="margin-bottom:16px">
                    <label><span class="icon">🔴</span> রক্তের গ্রুপ বেছে নিন <span class="req">*</span></label>
                    <div class="blood-grid">
                        @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $g)
                        <input type="radio" name="blood_group" required value="{{ $g }}"
                            id="bg_{{ str_replace('+','p',str_replace('-','m',$g)) }}"
                            class="blood-opt"
                            {{ old('blood_group') == $g ? 'checked' : '' }}>
                        <label for="bg_{{ str_replace('+','p',str_replace('-','m',$g)) }}">{{ $g }}</label>
                        @endforeach
                    </div>
                    @error('blood_group')<div class="invalid-msg">{{ $message }}</div>@enderror
                </div>

                <div class="em-row col-4">
                    <div class="em-field">
                        <label><span class="icon">📍</span> জেলা <span class="req">*</span></label>
                        <div class="em-select-wrap">
                            <select name="district" required class="{{ $errors->has('district') ? 'is-invalid' : '' }}">
                                <option value="">-- জেলা বেছে নিন --</option>
                                @foreach($districts as $d)
                                <option value="{{ $d }}" {{ old('district')==$d ? 'selected':'' }}>{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('district')<div class="invalid-msg">{{ $message }}</div>@enderror
                    </div>
                    <div class="em-field">
                        <label><span class="icon">🩺</span> কত ব্যাগ লাগবে <span class="req">*</span></label>
                        <div class="counter-wrap">
                            <button type="button" class="counter-btn" onclick="changeCount(-1)">−</button>
                            <input type="number" required name="units_needed" id="unitsCount"
                                value="{{ old('units_needed', 1) }}" min="1" max="10" readonly>
                            <button type="button" class="counter-btn" onclick="changeCount(1)">+</button>
                        </div>
                    </div>
                </div>

                <hr class="em-divider">

                {{-- EXTRA NOTE --}}
                <div class="em-section-title">
                    <span>📝</span> অতিরিক্ত তথ্য
                </div>

                <div class="em-field" style="margin-bottom:24px">
                    <label>বিশেষ তথ্য (ঐচ্ছিক)</label>
                    <textarea name="note" rows="3"
                        placeholder="যেকোনো গুরুত্বপূর্ণ তথ্য, রোগীর অবস্থা ইত্যাদি...">{{ old('note') }}</textarea>
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="em-submit" id="submitBtn">
                    <span class="spinner" id="spinner"></span>
                    <span id="btnText" class="text-white">🚨 Emergency Alert পাঠান</span>
                </button>

                <p class="em-note">
                    Submit এর পর AI <span>৩০ সেকেন্ডের</span> মধ্যে উপযুক্ত donor দের Message করবে
                </p>

            </div>
        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
function changeCount(delta) {
    const input = document.getElementById('unitsCount');
    let val = parseInt(input.value) + delta;
    if (val < 1) val = 1;
    if (val > 10) val = 10;
    input.value = val;
}

document.getElementById('emergencyForm').addEventListener('submit', function() {
    document.getElementById('spinner').style.display = 'block';
    document.getElementById('btnText').textContent = 'পাঠানো হচ্ছে...';
    document.getElementById('submitBtn').disabled = true;
});
</script>
@endpush
