@extends('layouts.app')

@section('js')
    <script src="{{ asset('js/form.js') }}" defer></script>
@endsection

@section('css')
    <link href="{{ asset('css/form.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (Request::segment(2) == 'create')
                        {{ __('Add New Veterinarian') }}
                    @elseif (Request::segment(3) == 'edit')
                        {{ __('Edit Veterinarian') }}
                    @else
                    @endif
                </div>

                <div class="card-body">
                    @if (Request::segment(2) == 'create')
                        <form method="POST" action="{{ route('vets.store') }}" aria-label="{{ __('Add New Vet') }}">
                    @elseif (Request::segment(3) == 'edit')
                        <form method="POST" action="{{ route('vets.update', Request::segment(2)) }}" aria-label="{{ __('Edit Vet') }}">
                        @method('PUT')
                    @else
                    @endif
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', isset($vet->email) ? $vet->email : null) }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Vet') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="backlink">
                <a href="{{ route('vets.index') }}">&larr; Back to Vet List</a>
                @if (Request::segment(3) == 'edit')
                    <form method="POST" action="{{ route('vets.destroy', Request::segment(2)) }}" aria-label="{{ __('Delete Vet') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger float-right del">
                            {{ __('Delete Vet') }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
