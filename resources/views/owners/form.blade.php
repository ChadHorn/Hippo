@extends('layouts.app')

@section('js')
    <script src="{{ asset('js/form.js') }}" defer></script>
@endsection

@section('css')
    <link href="{{ asset('css/form.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container">
    @guest
    <div class="row justify-content-center">
        <img src="/images/logo.png" class="loginlogo" />
    </div>
    @endguest
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (Request::segment(2) == 'create')
                        {{ __('Add New Owner') }}
                    @elseif (Request::segment(3) == 'edit')
                        {{ __('Edit Owner') }}
                    @else
                    @endif
                </div>

                <div class="card-body">
                    @if (Request::segment(2) == 'create')
                        <form method="POST" action="{{ route('owners.store') }}" aria-label="{{ __('Add New Owner') }}">
                    @elseif (Request::segment(3) == 'edit')
                        <form method="POST" action="{{ route('owners.update', Request::segment(2)) }}" aria-label="{{ __('Edit Owner') }}">
                        @method('PUT')
                    @else
                    @endif
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name', isset($owner->first_name) ? $owner->first_name : null) }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name', isset($owner->last_name) ? $owner->last_name : null) }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number', isset($owner->phone_number) ? $owner->phone_number : null) }}" required autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">

                                    @if (Request::segment(2) == 'create')
                                        {{ __('Add New Owner') }}
                                    @elseif (Request::segment(3) == 'edit')
                                        {{ __('Edit Owner') }}
                                    @else
                                    @endif
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="backlink">
                <a href="{{ route('owners.index') }}">&larr; Back to Owner List</a>
                @if (Request::segment(3) == 'edit')
                    <form method="POST" action="{{ route('owners.destroy', Request::segment(2)) }}" aria-label="{{ __('Delete Owner') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger float-right del">
                            {{ __('Delete Owner') }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
