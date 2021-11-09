@section('login')
<!-- Modal Login-->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 30%">
        <div class="modal-content rounded-1">
            <div class="modal-body p-4 px-5">
                <div class="main-content text-left">
                    <a href="#" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right: 20px; top: 20px; font-size: 24px;">
                        <span aria-hidden="true"><span class="icon-close2" style="color: #ccc;"></span></span>
                    </a>
                    <h4>Login</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" tabindex="1" value="{{ old('email') }}"
                                autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @push('script')
                                    <script>
                                        $(function () {
                                            $('#modalLogin').modal({
                                                show: true
                                            });
                                        });

                                    </script>
                                @endpush
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                tabindex="2" autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @push('script')
                                    <script>
                                        $(function () {
                                            $('#modalLogin').modal({
                                                show: true
                                            });
                                        });

                                    </script>
                                @endpush
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                    id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Remember Me</label>
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <button type="submit" class="btn register__btn font-weight-bold btn-block btn-lg"
                                tabindex="4">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Login End -->
@show
