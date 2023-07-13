@extends('template')

@section('profile')

<div class="container mt-8">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#personal-info">{{ __('Información de perfil') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#update-info">{{ __('Información de perfil (actualizable)') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#change-password">{{ __('Cambiar contraseña') }}</a>
        </li>
    </ul>
    <div class="tab-content mt-4">
        <div class="tab-pane fade show active" id="personal-info">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                            <div class="col-md-8">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>
                            <div class="col-md-8">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ $user->birthdate }}" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="update-info">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Ocupación') }}</label>
                            <div class="col-md-8">
                                <select id="occupation" class="form-control" name="occupation">
                                    <option value="worker"{{ $user->occupation === 'worker' ? ' selected' : '' }}>Trabajador</option>
                                    <option value="student"{{ $user->occupation === 'student' ? ' selected' : '' }}>Estudiante</option>
                                    <option value="other"{{ $user->occupation === 'other' ? ' selected' : '' }}>Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="personality" class="col-md-4 col-form-label text-md-right">{{ __('Personalidad') }}</label>
                            <div class="col-md-8">
                                <input id="personality" type="text" class="form-control" name="personality" value="{{ $user->personality }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar información') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="change-password">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user-password.update') }}" class="row g-3 needs-validation py-5" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña actual') }}</label>
                            <div class="col-md-8">
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nueva contraseña') }}</label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cambiar contraseña') }}
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('.nav-link').on('shown.bs.tab', function(e) {
            let activeTab = $(e.target).attr('href');
            $('.tab-pane').not(activeTab).removeClass('show active');
            $(activeTab).addClass('show active');
        });
    });
</script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.nav-link').on('shown.bs.tab', function(e) {
            let activeTab = $(e.target).attr("href");
            $('.tab-pane').removeClass('show active');
            $(activeTab).addClass('show active');
        });
    });
</script>