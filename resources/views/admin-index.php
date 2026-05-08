@extends('layouts.app')

@section('title', 'Emergency Requests — Admin')

@section('content')
<div class="container-fluid py-4">
    <h3 class="fw-bold text-danger mb-4">🚨 সকল Emergency Request</h3>

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>রোগী</th>
                            <th>Blood Group</th>
                            <th>জেলা</th>
                            <th>হাসপাতাল</th>
                            <th>যোগাযোগ</th>
                            <th>Notified</th>
                            <th>Status</th>
                            <th>তারিখ</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $req)
                        <tr>
                            <td>{{ $req->id }}</td>
                            <td>
                                <strong>{{ $req->patient_name }}</strong><br>
                                <small class="text-muted">by {{ $req->requester->name }}</small>
                            </td>
                            <td>
                                <span class="badge bg-danger fs-6">{{ $req->blood_group }}</span>
                            </td>
                            <td>{{ $req->district }}</td>
                            <td>{{ $req->hospital_name }}</td>
                            <td>{{ $req->contact_number }}</td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $req->donors_notified }} জন
                                </span>
                            </td>
                            <td>
                                @php
                                    $badgeClass = match($req->status) {
                                        'notified'  => 'bg-primary',
                                        'fulfilled' => 'bg-success',
                                        'cancelled' => 'bg-secondary',
                                        default     => 'bg-warning text-dark',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ ucfirst($req->status) }}</span>
                            </td>
                            <td>{{ $req->created_at->format('d M, H:i') }}</td>
                            <td>
                                <form action="{{ route('emergency.status', $req->id) }}" method="POST" class="d-flex gap-1">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" style="width:120px">
                                        <option value="pending"   {{ $req->status=='pending'   ? 'selected':'' }}>Pending</option>
                                        <option value="notified"  {{ $req->status=='notified'  ? 'selected':'' }}>Notified</option>
                                        <option value="fulfilled" {{ $req->status=='fulfilled' ? 'selected':'' }}>Fulfilled</option>
                                        <option value="cancelled" {{ $req->status=='cancelled' ? 'selected':'' }}>Cancelled</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary">✓</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">
                                কোনো emergency request নেই
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $requests->links() }}
    </div>
</div>
@endsection