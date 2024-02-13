@extends('layouts.app')
@section('content')
<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    
                    <form action="{{ route('profile.update', Auth::user()->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="small mb-1" for="username"></label>
                            <input class="form-control" name="username" id="username" type="text" placeholder="Enter your username" value="{{ Auth::user()->username }}">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email address</label>
                            <input class="form-control" name="email" id="email" type="email" placeholder="Enter your email address" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="skills">Skills</label>
                            <input class="form-control" name="skills" id="skills" type="skills" placeholder="Enter Your Skills ex : artist , voice-over" value="{{Auth::user()->skills}}">
                        </div>
                        <button class="btn btn-primary" type="submite">Save changes</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection