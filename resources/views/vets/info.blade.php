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
                    {{ __('Vet Information') }}
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            {{ $vet->email }}
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary linkbutton" data-url="/vets/{{ $vet->id }}/edit">
                                {{ __('Edit Vet') }}
                            </button>
                        </div>
                    </div>

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
