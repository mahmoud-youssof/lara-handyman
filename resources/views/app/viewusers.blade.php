@extends('app.app')

@section('content')



<!-- Masthead-->
<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our users!</div>
                <a class="btn btn-primary btn-xl text-uppercase" href=" {{ url('/#services') }} ">Tell Me More</a>
            </div>
        </header>
        </br>

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>workers</b></h2></div>

                    <div class="col-sm-4">
                        <!-- <button type="button" data-bs-toggle="modal"   href="#newModal" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button> -->
                    </div>
                </div>
            </div>
            <table class="table table-bordered table w-auto">
                <thead>
                    <tr>
                        <th class="w-auto">id</th>
                        <th class="w-auto">name</th>
                        <th class="w-auto">Email</th>
                        <th class="w-auto">Actions</th>
                    </tr>
                </thead>
                <tbody>
        @foreach($users as $user)

                    <tr>
                        <td class="w-auto"> {{ $user->id }}</td>
                        <td class="w-auto"> {{ $user->name }}</td>
                        <td class="w-auto"> {{ $user->email }}</td>
                        <td align="center">
                                <a class="btn btn-default" data-bs-toggle="modal"   href="#editModal{{ $user->id }}" >
                                    <em class="fa-regular {{ $is_admin = ( $user->admin == 0 ) ? 'fa-circle-xmark text-danger' : 'fa-circle-check text-success' }}  "></em>
                                </a>
                        </td>
                    </tr>
        @endforeach

                </tbody>
            </table>
        </div>
    </div>



    @foreach($users as $user)

    <div class="Workers-modal modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog mx-auto">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <!-- <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> -->
                                    <!-- <img class="img-fluid d-block mx-auto" src="image/d" alt="..." /> -->
                                    @if($user->admin == 0 )
                                    <p> Are you sure you want to Make this user Admin </p>
                                    <button class="btn btn-danger btn-xl text-uppercase"  type="button">
                                        <a href="{{ route('useradmin', [$user->id]) }}" >
                                            Confirm
                                        </a>
                                    </button>
                                    @elseif($user->admin == 1)
                                    <p> Are you sure you want to Make this Admin a user </p>
                                    <button class="btn btn-danger btn-xl text-uppercase"  type="button">
                                        <a href="{{ route('useradmin', [$user->id]) }}" >
                                            Confirm
                                        </a>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection
