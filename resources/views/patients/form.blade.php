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
                        {{ __('Add New Patient') }}
                    @elseif (Request::segment(3) == 'edit')
                        {{ __('Edit Patient') }}
                    @else
                    @endif
                </div>

                <div class="card-body">
                    @if(isset($owners) && count($owners) > 0)

                        @if (Request::segment(2) == 'create')
                            <form method="POST" action="{{ route('patients.store') }}" aria-label="{{ __('Add New Patient') }}">
                        @elseif (Request::segment(3) == 'edit')
                            <form method="POST" action="{{ route('patients.update', Request::segment(2)) }}" aria-label="{{ __('Edit Patient') }}">
                            @method('PUT')
                        @else
                        @endif
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Owner') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="owner_id"  required autofocus>
                                        <option value=""></option>
                                        @foreach ($owners as $owner)
                                            <option value="{{ $owner->id }}" {{ ((isset($patient->owner_id) && $patient->owner_id === $owner->id) || Request::segment(4) !== '' && Request::segment(4) == $owner->id ? 'selected=selected' : null) }}>{{ $owner->first_name }} {{ $owner->last_name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('owner') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', isset($patient->name) ? $patient->name : null) }}" required autofocus />

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Species') }}</label>

                                <div class="col-md-6">
                                    <input id="species" type="text" class="form-control{{ $errors->has('species') ? ' is-invalid' : '' }}" name="species" value="{{ old('species', isset($patient->species) ? $patient->species : null) }}" required autofocus />

                                    @if ($errors->has('species'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('species') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ old('color', isset($patient->color) ? $patient->color : null) }}" required autofocus />

                                    @if ($errors->has('color'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('color') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob', isset($patient->dob) ? $patient->dob : null) }}" required autofocus />

                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">

                                        @if (Request::segment(2) == 'create')
                                            {{ __('Add New Patient') }}
                                        @elseif (Request::segment(3) == 'edit')
                                            {{ __('Edit Patient') }}
                                        @else
                                        @endif
                                    </button>
                                </div>
                            </div>

                        </form>
                    @else
                        Please <a href="{{ route('owners.create') }}">add an owner</a> prior to adding a patient.
                    @endif
                </div>
            </div>
            <div class="backlink">
                <a href="{{ route('patients.index') }}">&larr; Back to Patient List</a>
                @if (Request::segment(3) == 'edit')
                    <form method="POST" action="{{ route('patients.destroy', Request::segment(2)) }}" aria-label="{{ __('Delete Patient') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger float-right del">
                            {{ __('Delete Patient') }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
