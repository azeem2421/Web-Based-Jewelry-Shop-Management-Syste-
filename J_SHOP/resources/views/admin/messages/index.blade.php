@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
<div class="container mt-4">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb" class="mb-3 bg-light p-3 rounded shadow-sm">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Messages</li>
    </ol>
  </nav>

  <!-- {{-- Flash Messages --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif -->

  {{-- Page Heading --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">📩 Contact Messages</h3>
    <a href="{{ route('admin.messages.report') }}" class="btn btn-outline-primary">
      <i class="bi bi-download me-1"></i> Generate Report (PDF)
    </a>
  </div>

  {{-- Messages Table --}}
  @if($messages->count())
  <div class="table-responsive shadow-sm border rounded-4">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Received At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($messages as $index => $msg)
        <tr>
          <td>{{ $messages->firstItem() + $index }}</td>
          <td>{{ $msg->name }}</td>
          <td>{{ $msg->email }}</td>
          <td>{{ \Illuminate\Support\Str::limit($msg->message, 60) }}</td>
          <td>{{ $msg->created_at->format('d M Y, h:i A') }}</td>
          <td>
            <!-- Reply Toggle Button -->
            <button type="button" class="btn btn-sm btn-outline-success toggle-reply" data-id="{{ $msg->id }}">
              <i class="bi bi-envelope-paper me-1"></i> Reply
            </button>

            <!-- Hidden Reply Form -->
            <form action="{{ route('admin.messages.sendMail', $msg->id) }}" method="POST" class="reply-form mt-2 d-none" id="reply-form-{{ $msg->id }}">
              @csrf
              <textarea name="reply_message" class="form-control form-control-sm mb-2" rows="2" placeholder="Type your reply here..." required>{{ old('reply_message') }}</textarea>
              <button type="submit" class="btn btn-sm btn-primary">Send</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-4">
    {{ $messages->links('pagination::bootstrap-5') }}
  </div>
  @else
    <div class="alert alert-info">No contact messages found.</div>
  @endif
</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-reply').forEach(btn => {
      btn.addEventListener('click', function () {
        const id = this.dataset.id;
        const form = document.getElementById(`reply-form-${id}`);
        if (form) {
          form.classList.toggle('d-none');
        }
      });
    });
  });
</script>
@endpush

