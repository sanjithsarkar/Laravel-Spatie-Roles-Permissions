@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Show User</h2>
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <strong>Roles:</strong>
                        @forelse($user->roles as $role)
                            <span class="badge bg-success">{{ $role->name }}</span>
                        @empty
                            <span class="badge bg-secondary">No Roles</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
