@extends('UserSideTheme.pages.edit_profile')
@section('main_content')

<div class="row justify-content-center align-items-center p-5 m-5">
    @if (session('success'))
        <div class="col-md-12 row justify-content-center">
            <div class="col-md-6 alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif  
    @if (session('error'))
        <div class="col-md-12 row justify-content-center">
            <div class="col-md-6 alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="col-md-12 h2">
        Edit Profile
    </div>

    @if ($success == 1 )
        <div class="col-md-6">
            <form method="POST" action="{{ route ('editProfile') }}">
                @csrf
                <div class="form-group">
                    <label for="NameField">Name</label>
                    <input name="name" value="{{ $name }}" type="text" class="form-control" id="NameField" aria-describedby="NameHelp" placeholder="Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lNameField">Last Name</label>
                    <input name="last_name" value="{{ $last_name }}" type="text" class="form-control" id="lNameField" aria-describedby="lNameHelp" placeholder="Last Name">
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="EmailField">Email address</label>
                    <input name="email" value="{{ $email }}" type="email" class="form-control" id="EmailField" aria-describedby="emailHelp" placeholder="Email Address">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="PasswordField">Password</label>
                    <input name="pass" value="" type="password" class="form-control" id="PasswordField" placeholder="Password">
                    @error('pass')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-custom-primary">Submit</button>
            </form>
        </div>
    @endif
</div>

@endsection