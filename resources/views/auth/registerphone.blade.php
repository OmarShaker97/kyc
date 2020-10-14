@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-off-set-8">
            <div class="card">
                
                <div class="card-body bg-dark text-white">
                    <div class="center">
                        <h1 class="card-title">{{ __('Register') }}</h1>

                        <h5>Please fill in the fields below</h5>
                        

                        <form method="POST" action="{{ route('sms.update', Auth::user()) }}">
                            @csrf
                            @method('put')

                            <div class="form-group row">

                            <label for="phone" class="col-md-3 col-form-label text-md-center"></label>

                                <div class="col-md-6">
                                    <input id="phone" type="phone" placeholder="Phone"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
