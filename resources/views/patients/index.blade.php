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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Patients <span class="float-right"><a href="{{ route('patients.create') }}">Add New Patient</a></span></div>

                <div class="card-body">


                    <table class="table table-light">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Species</th>
                          <th scope="col">Color</th>
                          <th scope="col">DOB</th>
                          <th scope="col">Owner</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($patients) > 0)
                            @foreach($patients AS $patient)
                                <tr data-url="/patients/{{ $patient->id }}">
                                  <td>{{ $patient->name }}</td>
                                  <td>{{ $patient->species }}</td>
                                  <td>{{ $patient->color }}</td>
                                  <td>{{ $patient->dob }}</td>
                                  <td><a href="{{ route('owners.show', $patient->owner->id) }}">{{ $patient->owner->first_name }} {{ $patient->owner->last_name }}</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                              <td colspan="5">No records saved.</td>
                            </tr>
                        @endif
                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
