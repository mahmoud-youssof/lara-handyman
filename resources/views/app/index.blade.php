@extends('app.app')

@section('content')


<!-- Masthead-->
<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Servies!</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                </div>
                <div class="row text-center">
                @foreach($allCategories as $category)
                    <div class="col-md-4">
                    <img class="img-fluid card-img-top" src=" {{ asset('image/'. $category->categories_image) }}  " alt="{{ $category->categories_name}}" />

                        <h4 class="my-3"><a href="{{ route('servicesid', [$category->categories_id]) }}" style="text-decoration: none;">{{  $category->categories_name}} </a></h4>
                        <p class="text-muted">{{  $category->categories_description}}</p>
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
                    <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
                </div>
                <div class="row">
                @foreach($workers as $worker)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Workers item 1-->
                        <div class="Workers-item">
                            <a class="Workers-link" data-bs-toggle="modal"   href="#WorkersModal{{ $worker->id }}">
                                <div class="Workers-hover">
                                    <div class="Workers-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid card-img-top" src=" {{ asset('image/'. $worker->image) }}  " alt="{{ $worker->image}}" />
                            </a>
                            <div class="Workers-caption">
                                <div class="Workers-caption-heading">{{  $worker->name}}</div>
                                <div class="Workers-caption-subheading text-muted">{{  $worker->categories_name}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                </div>
                <ul class="timeline">
                @foreach($about as $about1)

                    <li class=" {{ $is_admin = ( $about1->id % 2 == 0 ) ? '' : 'timeline-inverted' }} ">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src=" {{ asset('image/'. $about1->image) }} " alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                            {{  $about1->title}}
                            </div>
                            <div class="timeline-body"><p class="text-muted">{{  $about1->description}}</p></div>
                        </div>
                    </li>
                    @endforeach
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>


        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                </div>
                <form  id="contactForm"  method="POST" action="{{ route('contactmessage') }}"     >
                @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" name="phone"  type="number" placeholder="Your Phone *" required />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" name="message"  id="message" placeholder="Your Message *" required></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase  " id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>


        @foreach($workers as $worker)

        <div class="Workers-modal modal fade" id="WorkersModal{{ $worker->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog mx-auto">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src=" {{ asset('assets/img/close-icon.svg') }} " alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <!-- <h2 class="text-uppercase">Project Name</h2>  -->
                                    <img class="img-fluid d-block mx-auto" src=" {{ asset('image/'. $worker->image) }} " alt="..." />
                                    <p> {{ $worker->description }} </p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Name:</strong>
                                            {{ $worker->name }}
                                        </li>
                                        <li>
                                            <strong>Servies:</strong>
                                            {{ $worker->categories_name }}
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


@endsection
