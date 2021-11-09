@section('register')
<!-- Modal Register-->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 50%">
        <div class="modal-content rounded-1">
            <div class="modal-body p-4 px-5">
                <div class="main-content text-left">
                    <a href="#" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right: 20px; top: 20px; font-size: 24px;">
                        <span aria-hidden="true"><span class="icon-close2" style="color: #ccc;"></span></span>
                    </a>
                    <h4>Register New Account</h4>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" tabindex="1" value="{{ old('name') }}" autocomplete="name"
                                autofocus>
                            @error('name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @push('script')
                                    <script>
                                        $(function () {
                                            $('#modalRegister').modal({
                                                show: true
                                            });
                                        });

                                    </script>
                                @endpush
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email2">Email</label>
                            <input id="email2" type="email" class="form-control @error('email2') is-invalid @enderror"
                                name="email2" tabindex="1" value="{{ old('email2') }}"
                                autocomplete="email2">
                            @error('email2')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @push('script')
                                    <script>
                                        $(function () {
                                            $('#modalRegister').modal({
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
                                tabindex="2" autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @push('script')
                                    <script>
                                        $(function () {
                                            $('#modalRegister').modal({
                                                show: true
                                            });
                                        });

                                    </script>
                                @endpush
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password-confirm" class="control-label">Confirm Password</label>
                            </div>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" tabindex="2" autocomplete="new-password">
                        </div>

                        <div class="form-group mt-5">
                            <input type="hidden" name="role" value="customer">
                            <button type="submit" class="btn register__btn font-weight-bold btn-block btn-lg"
                                tabindex="4">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Register End -->
@show
