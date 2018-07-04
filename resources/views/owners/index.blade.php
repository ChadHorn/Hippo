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
                <div class="card-header">Owners <span class="float-right"><a href="{{ route('owners.create') }}">Add New Owner</a></span></div>

                <div class="card-body">


                    <table class="table table-light">
                      <thead>
                        <tr>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Phone Number</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($owners) > 0)
                            @foreach($owners AS $owner)
                                <tr data-url="/owners/{{ $owner->id }}">
                                  <td>{{ $owner->first_name }}</td>
                                  <td>{{ $owner->last_name }}</td>
                                  <td>{{ $owner->phone_number }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                              <td colspan="3">No records saved.</td>
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
