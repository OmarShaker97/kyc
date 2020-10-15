@extends('layouts.app')

@section('content')
<div class="container bg">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                @include('flash::message')
            </div>
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Verify Your Phone Number') }}</div>

                <div class="card-body bg-dark text-white">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your phone address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your phone messages for a verification code.') }}
                    <br>
                    {{ __('Please enter the verification code below') }}
                    <br><br>

                    <form class="d-inline" method="POST" action="{{ route('sms.onClickVerify') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="h4">Verification Code</label>
                            <input type="text" class="form-control" name="code" id="code"/>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Click here to verify') }}</button>
                    </form>

                    <br><br>

                    {{ __('If you did not receive the sms') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
</div>
@endsection
