@extends('app.app')

@section('content')

            <!-- About-->
            <section class="page-section" id="about">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">About</h2>
                    </div>
                    <ul class="timeline">
                    @foreach($about as $about1) 
                        <li class=" {{ $is_admin = ( $about1->id % 2 == 0 ) ? '' : 'timeline-inverted' }} ">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="image/{{ $about1->image}}" alt="..." /></div>
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
@endsection
