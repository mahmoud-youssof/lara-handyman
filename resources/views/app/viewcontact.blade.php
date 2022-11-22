@extends('app.app')

@section('content')



<!-- Masthead-->
<header class="masthead">
            <div class="container">
                <!-- <div class="masthead-subheading">Welcome To Our Servies!</div> -->
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>
        </br>

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Messages</b></h2></div>
                    <div class="col-sm-4">
                        <!-- <button type="button" data-bs-toggle="modal"   href="#WorkersModal2" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button> -->
                    </div>
                </div>
            </div>
            <table class="table table-bordered table w-auto">
                <thead>
                    <tr>
                        <th class="w-auto">id</th>
                        <th class="w-auto">name</th>
                        <th class="w-auto">email</th>
                        <th class="w-auto">Phone</th>
                        <th class="w-auto">message</th>
                        <th class="w-auto">Actions</th>
                    </tr>
                </thead>
                <tbody>
        @foreach($contacts as $contact)

                    <tr>
                        <td class="w-auto"> {{ $contact->id }}</td>
                        <td class="w-auto"> {{ $contact->name }}</td>
                        <td class="w-auto"> {{ $contact->email }}</td>
                        <td class="w-auto"> {{ $contact->phone }}</td>
                        <td class="w-auto"> {{ $contact->message }}</td>
                        <td align="center">
                                <!-- <a class="btn btn-default"><em class="fa fa-pencil"></em></a> -->
                                <a class="btn btn-danger" data-bs-toggle="modal"   href="#WorkersModal{{ $contact->id }}" ><em class="fa fa-trash"></em></a>
                        </td>
                    </tr>
        @endforeach

                </tbody>
            </table>
        </div>
    </div>



    @foreach($contacts as $contact)

    <div class="Workers-modal modal fade" id="WorkersModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <p> Are you sure you want to delete this message </p>
                                    <button class="btn btn-danger btn-xl text-uppercase"  type="button">
                                        <a href="{{ route('deletecontact', [$contact->id]) }}" >
                                            Delete
                                        </a>
                                    </button>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

@endsection
