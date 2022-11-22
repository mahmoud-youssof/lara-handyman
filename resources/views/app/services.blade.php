@extends('app.app')

@section('content')

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                </div>
                <div class="row text-center justify-content-center">
                    @foreach($allCategories as $category)
                        <div class="col-md-4">
                        <img class="img-fluid card-img-top" src=" {{ asset('image/'. $category->categories_image) }} " alt="{{ $category->categories_name}}" />
                            <h4 class="my-3">{{  $category->categories_name}}</h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Workers Grid-->
        <section class="page-section bg-light" id="Workers">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Workers</h2>
                </div>
                <div class="row">
                @foreach($workers as $worker)

                    <div class="col-lg-3 col-sm-6 mb-4">
                        <!-- Workers item 1-->
                        <div class="Workers-item">
                            <a class="Workers-link" data-bs-toggle="modal" href="#WorkersModal{{ $worker->id }}">
                                <div class="Workers-hover">
                                    <div class="Workers-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                    <img class="img-fluid card-img-top d-block mx-auto" src=" {{ asset('image/'. $worker->image )  }} " alt="..." />
                            </a>
                            <div class="Workers-caption">
                                <div class="Workers-caption-heading">{{  $worker->name}}</div>
                                <div class="Workers-caption-subheading text-muted">{{  $worker->categories_name}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="Workers-modal modal fade" id="WorkersModal{{ $worker->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog mx-auto">
                            <div class="modal-content">
                                <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/img/close-icon.svg')  }} " alt="Close modal" /></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project details-->
                                                <!-- <h2 class="text-uppercase">Project Name</h2> -->
                                                <!-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> -->
                                                <img class="img-fluid d-block mx-auto" src=" {{ asset('image/'.  $worker->image) }} " alt="..." />
                                                <p> {{ $worker->description }} </p>
                                                <ul class="list-inline">
                                                    <li>
                                                        <strong>Name:</strong>
                                                        {{ $worker->name }}
                                                    </li>
                                                    <li>
                                                        <strong>Category:</strong>
                                                        {{ $worker->categories_id }}
                                                    </li>
                        <a class="btn btn-dark btn-social mx-2" href="https://wa.me/{{ $worker->whatsapp }}?text= " aria-label="whatsapp"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="{{ $worker->instgram }}" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                                                </ul>
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
                <div style="text-align: center;"> {{ $workers->links() }}    </div>

                </div>
            </div>
        </section>

@endsection
