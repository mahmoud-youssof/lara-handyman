@extends('app.app')

@section('content')



<!-- Masthead-->
<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our workers!</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>
        </br>

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>workers</b></h2></div>
                    @if($errors->any())
                        {{ implode('', $errors->all(':message')) }}
                    @endif
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
        @foreach($workers as $worker)

                    <tr>
                        <td class="w-auto"> {{ $worker->id }}</td>
                        <td class="w-auto"> {{ $worker->name }}</td>
                        <td class="w-auto">
                        <a class="btn btn-dark btn-social mx-2" href="https://wa.me/{{ $worker->whatsapp }}?text= " aria-label="whatsapp"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="{{ $worker->instgram }}" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                        </td>
                        <td class="w-auto"><img class="img-fluid " src=" {{ asset('image/'. $worker->image) }} " alt="{{ $worker->name}}" /> {{ $worker->image }}</td>
                        <td align="center">
                                <a class="btn btn-default" data-bs-toggle="modal"   href="#editModal{{ $worker->id }}" ><em class="fa fa-pencil"></em></a>
                                <a class="btn btn-danger"  data-bs-toggle="modal"   href="#WorkersModal{{ $worker->id }}" ><em class="fa fa-trash"></em></a>
                        </td>
                    </tr>
        @endforeach

                </tbody>
            </table>
        </div>
    </div>



    @foreach($workers as $worker)

    <div class="Workers-modal modal fade" id="WorkersModal{{ $worker->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <p> Are you sure you want to delete this Worrker </p>
                                    <button class="btn btn-danger btn-xl text-uppercase"  type="button">
                                        <a href="{{ route('deletecontact', [$worker->id]) }}" >
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
                            <form  id="contactForm"  method="POST" action="{{ route('workerpost') }}"  enctype="multipart/form-data">
                                @csrf
                                    <div class="row align-items-stretch mb-12">
                                        <div class="col-md-10">
                                            @foreach($categories as $categories)

                                                <div class="form-check col-md-3">
                                                <input class="form-check-input" type="radio" value=" {{ $categories->categories_id}} " name="categoryid" id="flexRadioDefault1" required>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                {{ $categories->categories_name}}
                                                </label>
                                                </div>
                                            @endforeach
                                            <div class="form-group">
                                                <!-- Name input-->
                                                <input class="form-control" id="name" name="name" type="text" placeholder="Your Worker Name *" required />
                                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                            </div>
                                            </br>
                                            <div class="form-group">
                                                <!-- descreption input-->
                                                <input class="form-control" id="descreption" name="descreption" type="text" placeholder="Your Worker descreption *" required />
                                                <div class="invalid-feedback" data-sb-feedback="descreption:required">A descreption is required.</div>
                                            </div>
                                            </br>
                                            <div class="form-group">
                                                <!-- whatsapp input-->
                                                <input class="form-control" id="whatsapp" name="whatsapp" type="text" placeholder="Your Worker whatsapp *" required />
                                                <div class="invalid-feedback" data-sb-feedback="whatsapp:required">A whatsapp is required.</div>
                                            </div>
                                            </br>
                                            <div class="form-group">
                                                <!-- instgram input-->
                                                <input class="form-control" id="instgram" name="instgram" type="text" placeholder="Your Worker instgram *" required />
                                                <div class="invalid-feedback" data-sb-feedback="instgram:required">A instgram is required.</div>
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
        @foreach($workers as $worker)
    <div class="Workers-modal modal fade" id="editModal{{ $worker->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <form  id="contactForm"  method="POST" action="{{ route('workerupdate',[$worker->id]) }}"  enctype="multipart/form-data">
                                @csrf
                                    <div class="row align-items-stretch mb-12">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <!-- Name input-->
                                                <input value="{{ $worker->name }}" class="form-control" id="name" name="name" type="text" placeholder="Your Category Name *" required />
                                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                            </div>
                                            </br><div class="form-group">
                                                <!-- description input-->
                                                <input value="{{ $worker->description }}" class="form-control" id="description" name="description" type="text" placeholder="Your Worker descreption *" required />
                                                <div class="invalid-feedback" data-sb-feedback="descreption:required">A descreption is required.</div>
                                            </div>
                                            </br>
                                            <div class="form-group">
                                                <!-- whatsapp input-->
                                                <input value="{{ $worker->whatsapp }}" class="form-control" id="whatsapp" name="whatsapp" type="text" placeholder="Your Worker whatsapp *" required />
                                                <div class="invalid-feedback" data-sb-feedback="whatsapp:required">A whatsapp is required.</div>
                                            </div>
                                            </br>
                                            <div  value="{{ $worker->instgram }}" class="form-group">
                                                <!-- instgram input-->
                                                <input class="form-control" id="instgram" name="instgram" type="text" placeholder="Your Worker instgram *" required />
                                                <div class="invalid-feedback" data-sb-feedback="instgram:required">A instgram is required.</div>
                                            </div>
                                    <img class="img-fluid d-block mx-auto" src="{{ asset('image/'. $worker->image) }}" title="{{ $worker->image }}" alt="{{ $worker->image }}" />
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
