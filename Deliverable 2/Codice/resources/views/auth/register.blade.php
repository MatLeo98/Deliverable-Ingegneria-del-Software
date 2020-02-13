@extends('layouts.app')

@section('content')
<html>
<body onload="offerente()">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

<input type="radio" onclick="offerente()" name="flag" value="0"checked> Offerer<br>
<input type="radio" onclick="richiedente()" name="flag" value="1"> Job seeker<br>

<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cognome" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
                            <div class="col-md-6">
                                <input id="cognome" type="text" class="form-control" name="cognome" value="{{ old('cognome') }}" required autocomplete="cognome" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eta" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
                            <div class="col-md-6">
                                <input id="eta" type="text" class="form-control" name="eta" value="{{ old('eta') }}" required autocomplete="eta" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="indirizzo" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="indirizzo" type="text" class="form-control" name="indirizzo" value="{{ old('indirizzo') }}" required autocomplete="indirizzo" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recapito" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="recapito" type="text" class="form-control" name="recapito" value="{{ old('recapito') }}" required autocomplete="recapito" autofocus>
                            </div>
                        </div>
                        <div id="DIV">
                        <div class="form-group row">
                            <label for="ragionesociale" class="col-md-4 col-form-label text-md-right">{{ __('Business name') }}</label>
                            <div class="col-md-6">
                                <input id="ragionesociale" type="text" class="form-control" name="ragionesociale" value="{{ old('ragionesociale') }}"  autocomplete="ragionesociale" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sede" class="col-md-4 col-form-label text-md-right">{{ __('Sede') }}</label>
                            <div class="col-md-6">
                                <input id="sede" type="text" class="form-control" name="sede" value="{{ old('sede') }}"  autocomplete="sede" autofocus>
                            </div>
                        </div>
                        </div>
                        <div id="myDIV">
                        <div class="form-group row">
                            <label for="titolodistudio" class="col-md-4 col-form-label text-md-right">{{ __('Educational qualification') }}</label>
                            <div class="col-md-6">
                                <input id="titolodistudio" type="text" class="form-control" name="titolodistudio" value="{{ old('titolodistudio') }}"  autocomplete="titolodistudio" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="corsodistudi" class="col-md-4 col-form-label text-md-right">{{ __('Study course') }}</label>
                            <div class="col-md-6">
                                <input id="corsodistudi" type="text" class="form-control" name="corsodistudi" value="{{ old('corsodistudi') }}"  autocomplete="corsodistudi" autofocus>
                            </div>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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


@endsection

<script>
function offerente() {
  var x = document.getElementById("myDIV");
  var y = document.getElementById("DIV");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";

  }
}

function richiedente() {
  var x = document.getElementById("DIV");
  var y = document.getElementById("myDIV");

  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";

  }
}
</script>
</body>
</html>