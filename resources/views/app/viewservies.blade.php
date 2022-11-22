@extends('app.app')

@section('content')



<!-- Masthead-->
<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Servies!</div>
                <a class="btn btn-primary btn-xl text-uppercase" href=" {{ url('/#services') }} ">Tell Me More</a>
            </div>
        </header>
        </br>

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Servies</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" data-bs-toggle="modal"   href="#newModal" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table w-auto">
                <thead>
                    <tr>
                        <th class="w-auto">id</th>
                        <th class="w-auto">name</th>
                        <th class="w-auto">Description</th>
                        <th class="w-auto">image</th>
                        <th class="w-auto">Actions</th>
                    </tr>
                </thead>
                <tbody>
        @foreach($servies as $servie)

                    <tr>
                        <td class="w-auto"> {{ $servie->categories_id }}</td>
                        <td class="w-auto"> {{ $servie->categories_name }}</td>
                        <td class="w-auto"> {{ $servie->categories_description }}</td>
                        <td class="w-auto"><img class="img-fluid " src=" {{ asset('image/'. $servie->categories_image) }} " alt="{{ $servie->categories_name}}" /> {{ $servie->categories_image }}</td>
                        <td align="center">
                                <a class="btn btn-default" data-bs-toggle="modal"   href="#editModal{{ $servie->categories_id }}" ><em class="fa fa-pencil"></em></a>
                                <a class="btn btn-danger"  data-bs-toggle="modal"   href="#WorkersModal{{ $servie->categories_id }}" ><em class="fa fa-trash"></em></a>
                        </td>
                    </tr>
        @endforeach

                </tbody>
            </table>
        </div>
    </div>



    @foreach($servies as $servie)

    <div class="Workers-modal modal fade" id="WorkersModal{{ $servie->categories_id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <p> Are you sure you want to delete this Category </p>
                                    <button class="btn btn-danger btn-xl text-uppercase"  type="button">
                                        <a href="{{ route('deletecontact', [$servie->categories_id]) }}" >
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


    <!-- ADD NEW CATEGORY FOR  -->

    <div class="Workers-modal modal fade" id="newModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <!-- <p> Are you sure you want to delete this Category </p> -->
                            <form  id="contactForm"  method="POST" action="{{ route('categorypost') }}"  enctype="multipart/form-data">
                                @csrf
                                    <div class="row align-items-stretch mb-12">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <!-- Name input-->
                                                <input class="form-control" id="name" name="name" type="text" placeholder="Your Category Name *" required />
                                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                            </div>
                                            </br>
                                            <div class="form-group form-group-textarea mb-md-0">
                                                <!-- Phone number input-->
                                                <textarea class="form-control" id="Description" name="Description"  type="text" placeholder="Your Description *" required ></textarea>
                                                <div class="invalid-feedback"  >A Description is required.</div>
                                            </div>
                                            </br>
                                            <input accept="image/*" type="file" class="form-control" name="image" />
                                        </div>
                                    </div>
                                    </br>
                                    <!-- Submit Button-->
                                        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase  " id="submitButton" type="submit"> Add</button></div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Edit category form  -->
        @foreach($servies as $servie)
    <div class="Workers-modal modal fade" id="editModal{{ $servie->categories_id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <!-- <p> Are you sure you want to delete this Category </p> -->
                            <form  id="contactForm"  method="POST" action="{{ route('categoryupdate',[$servie->categories_id]) }}"  enctype="multipart/form-data">
                                @csrf
                                    <div class="row align-items-stretch mb-12">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <!-- Name input-->
                                                <input value="{{ $servie->categories_name }}" class="form-control" id="name" name="name" type="text" placeholder="Your Category Name *" required />
                                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                            </div>
                                            </br>
                                            <div class="form-group form-group-textarea mb-md-0">
                                                <!-- Phone number input-->
                                                <textarea value="{{ $servie->categories_description }}" class="form-control" id="Description" name="Description"  type="text" placeholder="Your Description *" required >{{ $servie->categories_description }}</textarea>
                                                <div class="invalid-feedback"  >A Description is required.</div>
                                            </div>
                                            </br>
                                    <img class="img-fluid d-block mx-auto" src="{{ asset('image/'. $servie->categories_image) }}" title="{{ $servie->categories_image }}" alt="{{ $servie->categories_image }}" />
                                    </br>
                                            <input accept="image/*" type="file" class="form-control" name="image" />
                                        </div>
                                    </div>
                                    </br>
                                    <!-- Submit Button-->
                                        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase  " id="submitButton" type="submit"> Edit</button></div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

@endsection
