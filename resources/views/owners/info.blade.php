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
                    {{ __('Owner') }}
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            {{ $owner->first_name }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            {{ $owner->last_name }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                            {{ $owner->phone_number }}
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary linkbutton" data-url="/owners/{{$owner->id}}/edit">
                                {{ __('Edit Owner') }}
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="backlink">
                <a href="{{ route('owners.index') }}">&larr; Back to Owner List</a>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ __('Associated Patients') }}  <span class="float-right"><a href="{{ route('patients.create') }}/owner/{{ $owner->id }}">Add New Patient</a></span>
                </div>

                @forelse ($owner->patients as $patient)
                    <div class="card-body patientscard linkbutton" data-url="{{ route('patients.show', $patient->id) }}">
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
                            <label for="name" class="col-md-4 text-md-right">{{ __('DOB') }}</label>

                            <div class="col-md-6">
                                {{ $patient->dob }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card-body">No patients associated with this owner.</div>
                @endforelse

            </div>

        </div>
    </div>
</div>
@endsection
