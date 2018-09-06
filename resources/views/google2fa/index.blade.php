@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">2FA Authentication</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="one_time_password" class="col-md-4 col-form-label text-md-right">One Time
                                    Password</label>
                                <div class="col-md-6">
                                    <input id="one_time_password"
                                           type="number"
                                           class="form-control"
                                           name="one_time_password"
                                           required
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Continue
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