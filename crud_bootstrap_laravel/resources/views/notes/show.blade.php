@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Cabeçalho -->
        <div class="d-flex justify-content-between align-items-center mb-4">
             <div>
                <h2 class="text-dark-emphasis m-0 mb-1">View Note</h2>
                <p class="text-muted m-0">Note details and content</p>
             </div>
             <a href="{{ route('notes.index') }}" class="btn btn-warning">
                Back to Notes
            </a>

        </div>

        <!-- success message -->

        <div class="card">
            <div class="card-body p-4">
                <div class="mb-4 pb-3 border-bottom" style="border-color: #30363d !important;">
                    <label class="text-muted text-uppercase small mb-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">Title</label>
                    <h3 class="text-dark-emphasis m-0"> {{ $note->title }}</h3>
                </div>

                <div class="mb-4">
                    <label class="text-muted text-uppercase small mb-2" style="font-size: 0.75rem; letterspacing: 0.5px;">Content</label>
                    <p class="text-dark-emphasis mb-0" style="line-height: 1.; white-space:pre-wrap;">{{ $note->content }} </p>
                </div>
    '           
                <div class="pt-3 border-top" style="border-color: #30363d !important;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <small class="text-muted d-block">Created</small>
                            <small class="text-dark-emphasis">
                                {{ $note->created_at->diffForHumans() }}
                            </small>
                        </div>

                        <div class="col-md-6">
                            <small class="text-muted d-block">Last Updated</small>
                            <small class="text-dark-emphasis">
                                {{ $note->updated_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection