@extends('vendor.laraplusadmin.authentication.admin.master')

@section('content')
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo float-left">
                <img src="img/logo.png" height="54" alt="Porto Admin" />
            </a>

            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-right">
                    <h2 class="title text-uppercase font-weight-bold m-0"><i class="fa fa-user mr-1"></i> Sign In</h2>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
                <div class="card-body">

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <div class="input-group input-group-icon">
                                <input name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" value="{{ old('email') }}" />
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                            </div>

                        </div>

                        <div class="form-group mb-3">
                            <div class="clearfix">
                                <label class="float-left">Password</label>
                                <a href="{{ route('password.request') }}" class="float-right">Lost Password?</a>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" />
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="remember" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
                                    <label for="RememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary mt-2">Sign In</button>
                            </div>
                        </div>

                        <span class="mt-3 mb-3 line-thru text-center text-uppercase">
								<span>or</span>
							</span>

                        <div class="mb-1 text-center">
                            <a class="btn btn-facebook mb-3 ml-1 mr-1" href="#">Connect with <i class="fa fa-facebook"></i></a>
                            <a class="btn btn-twitter mb-3 ml-1 mr-1" href="#">Connect with <i class="fa fa-twitter"></i></a>
                        </div>

                        <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a></p>

                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017. All Rights Reserved.</p>
        </div>
    </section>

@endsection
