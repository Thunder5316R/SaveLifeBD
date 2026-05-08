@extends('layouts.app')
@section('title', 'AI Donor Recommendation')

@section('content')
<style>
.ai-hero { background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); color: white; padding: 40px 0 20px; }
.score-bar { height: 8px; border-radius: 4px; background: #e5e7eb; overflow: hidden; }
.score-fill { height: 100%; border-radius: 4px; transition: width 1s ease; }
.donor-card { border: none; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); transition: transform .2s, box-shadow .2s; }
.donor-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(220,38,38,0.15); }
.badge-score { font-size: 1.4rem; font-weight: 800; }
.score-excellent { color: #16a34a; }
.score-good      { color: #2563eb; }
.score-fair      { color: #d97706; }
.tag { display: inline-block; font-size: 11px; background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; border-radius: 20px; padding: 2px 10px; margin: 2px; }
.breakdown-row { display: flex; align-items: center; gap: 8px; margin-bottom: 6px; font-size: 13px; }
.breakdown-label { width: 90px; color: #6b7280; }
.rank-badge { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; }
.rank-1 { background: #fbbf24; color: #78350f; }
.rank-2 { background: #9ca3af; color: #1f2937; }
.rank-3 { background: #c2693e; color: white; }
.rank-other { background: #e5e7eb; color: #374151; }
</style>

<div class="ai-hero">
    <div class="container">
        <div class="d-flex align-items-center gap-3 mb-2">
            <span style="font-size:2.5rem;">🤖</span>
            <div>
                <h2 class="mb-0 fw-bold">AI Donor Recommendation</h2>
                <p class="mb-0 opacity-75">Smart matching based on eligibility, location & activity</p>
            </div>
        </div>
    </div>
</div>

{{-- Search Form --}}
<div class="container mt-4">
    <div class="card donor-card p-4 mb-4">
        <h5 class="fw-bold mb-3">🔍 Find Best Donors</h5>
        <form action="{{ route('blood.recommend') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Blood Group *</label>
                    <select name="blood_group" class="form-select" required>
                        <option value="">Select Blood Group</option>
                        @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg)
                            <option value="{{ $bg }}" {{ ($bloodGroup ?? '') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ $location ?? '' }}" placeholder="e.g. Dhaka, Lakshmipur...">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Emergency Level</label>
                    <select name="emergency" class="form-select">
                        <option value="low"    {{ ($emergency ?? '') == 'low'    ? 'selected' : '' }}>🟢 Low</option>
                        <option value="medium" {{ ($emergency ?? 'medium') == 'medium' ? 'selected' : '' }}>🟡 Medium</option>
                        <option value="high"   {{ ($emergency ?? '') == 'high'   ? 'selected' : '' }}>🔴 High / Urgent</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-danger w-100 fw-bold">🤖 Find Donors</button>
                </div>
            </div>
        </form>
    </div>

    @if(isset($donors))
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">
                Results for <span class="text-danger">{{ $bloodGroup }}</span>
                @if($location) near <span class="text-primary">{{ $location }}</span> @endif
            </h5>
            <span class="badge bg-danger fs-6">{{ $donors->count() }} donors found</span>
        </div>

        @if($donors->count() === 0)
            <div class="alert alert-warning">
                <strong>No compatible donors found.</strong> Try a different blood group or remove the location filter.
            </div>
        @else
            <div class="row g-3">
                @foreach($donors->take(12) as $index => $donor)
                    @php
                        $score = $donor->ai_score;
                        $scoreClass = $score >= 75 ? 'score-excellent' : ($score >= 50 ? 'score-good' : 'score-fair');
                        $rankClass  = $index === 0 ? 'rank-1' : ($index === 1 ? 'rank-2' : ($index === 2 ? 'rank-3' : 'rank-other'));
                        $bd = $donor->score_breakdown;
                    @endphp
                    <div class="col-md-6 col-lg-4">
                        <div class="card donor-card h-100 p-3">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rank-badge {{ $rankClass }}">{{ $index + 1 }}</div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">{{ $donor->name }}</h6>
                                        <small class="text-muted">{{ $donor->blood_donate_number }} donation(s)</small>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="badge-score {{ $scoreClass }}">{{ $score }}</div>
                                    <div style="font-size:10px; color:#9ca3af;">AI SCORE</div>
                                </div>
                            </div>

                            {{-- Score Bar --}}
                            <div class="score-bar mb-3">
                                <div class="score-fill" style="width: {{ $score }}%; background: {{ $score >= 75 ? '#16a34a' : ($score >= 50 ? '#2563eb' : '#d97706') }};"></div>
                            </div>

                            {{-- Info --}}
                            <div class="mb-2">
                                <span class="badge bg-danger me-1">{{ $donor->blood_group }}</span>
                                <span class="text-muted" style="font-size:13px;">📍 {{ Str::limit($donor->present_address, 35) }}</span>
                            </div>
                            <div class="mb-3" style="font-size:13px;">
                                📞 <a href="tel:{{ $donor->phone }}" class="text-decoration-none fw-semibold text-danger">{{ $donor->phone }}</a>
                            </div>

                            {{-- Eligibility --}}
                            <div class="mb-2">
                                <span class="tag">{{ $donor->eligibility_label }}</span>
                            </div>

                            {{-- Reason --}}
                            <p style="font-size:12px; color:#6b7280; margin-bottom:10px;">{{ $donor->recommendation_reason }}</p>

                            {{-- Score Breakdown --}}
                            <details>
                                <summary style="font-size:12px; cursor:pointer; color:#9ca3af;">Score breakdown</summary>
                                <div class="mt-2">
                                    @foreach([
                                        'Blood Group' => [$bd['blood_group'], 40],
                                        'Eligibility' => [$bd['eligibility'], 30],
                                        'Activity'    => [$bd['activity'],    20],
                                        'Location'    => [$bd['location'],    10],
                                    ] as $label => [$val, $max])
                                    <div class="breakdown-row">
                                        <span class="breakdown-label">{{ $label }}</span>
                                        <div class="score-bar flex-grow-1"><div class="score-fill bg-primary" style="width: {{ ($val/$max)*100 }}%;"></div></div>
                                        <span style="width:40px; text-align:right; font-size:12px;">{{ $val }}/{{ $max }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </details>

                            <a href="tel:{{ $donor->phone }}" class="btn btn-outline-danger btn-sm mt-3 w-100">
                                📞 Contact Donor
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
</div>
@endsection