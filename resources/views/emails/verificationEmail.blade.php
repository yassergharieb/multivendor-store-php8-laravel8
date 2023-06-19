@extends('front.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">confirmation</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('email.confirmation') }}">
                        @csrf
                      <h4> confirmation code : </h4>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">  confirmation code </label>

                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                confiramtion
                                </button>


                                    {{-- <a class="btn btn-link" href="{{ route('email.confirmation') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> --}}

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
