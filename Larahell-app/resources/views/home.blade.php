@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if ($user->roles_id == 1)
                        anda login sebagai admin
                    @else
                        anda login sebagai user
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
