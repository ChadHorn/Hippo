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
                <div class="card-header">Veterinarians <span class="float-right"><a href="{{ route('vets.create') }}">Add New Vet</a></span></div>

                <div class="card-body">


                    <table class="table table-light">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Practice Name</th>
                          <th scope="col">Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($vets) > 0)
                            @foreach($vets AS $vet)
                                <tr data-url="/vets/{{ $vet->id }}">
                                  <td>{{ $vet->id }}</td>
                                  <td>{{ $vet->name }}</td>
                                  <td>{{ $vet->email }}</td>
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
