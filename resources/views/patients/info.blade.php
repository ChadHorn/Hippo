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
                    {{ __('Patient') }}
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('Owner') }}</label>

                        <div class="col-md-6">
                            <a href="{{ route('owners.show', $patient->owner->id) }}">{{ $patient->owner->first_name }} {{ $patient->owner->last_name }}</a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            {{ $patient->name }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('Species') }}</label>

                        <div class="col-md-6">
                            {{ $patient->species }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('Color') }}</label>

                        <div class="col-md-6">
                            {{ $patient->color }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('DOB') }}</label>

                        <div class="col-md-6">
                            {{ $patient->dob }}
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary linkbutton" data-url="/patients/{{$patient->id}}/edit">
                                {{ __('Edit Patient') }}
                            </button>
                        </div>
                    </div>

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
