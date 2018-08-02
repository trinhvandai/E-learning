@extends('layouts.default')

@section('title')
    {{ $selectedCourse->name . ' - ' . __('course') }}
@endsection

@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="product-info">
                    <div class="col-sm-8">                                    
                        <div class="inner-box ads-details-wrapper">
                            <h2> {{ $selectedCourse->name }} </h2>
                            <p class="item-intro"><span class="poster"> {{ __('updated_at') . $selectedCourse->updated_at . __('by') . $selectedCourse->teacher_name }} </span></p>
                            <div id="owl-demo" class="owl-carousel owl-theme">
                                <div class="item">
                                    <img src="{{ str_replace('public/', '', asset($selectedCourse->course_avatar)) }}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ str_replace('public/', '', asset($selectedCourse->course_avatar_2)) }}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ str_replace('public/', '', asset($selectedCourse->course_avatar_3)) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <h2 class="title-2"><strong> {{ __('course_detail') }} </strong></h2>
                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <p class="mb15"> {{ $selectedCourse->description }} </p>
                                </div>
                                <div class="col-md-4" id="active-btn">
                                    @if (!($activeCourse))
                                        <button type="button" class="btn btn-primary"> {{ __('active_now') }} </button>
                                    @elseif ($activeCourse === 1)
                                        <button type="button" class="btn btn-warning"> {{ __('cancel_active') }} </button>
                                    @elseif ($activeCourse === 2)
                                        <button type="button" class="btn btn-success"> {{ __('go_study') }} </button>
                                    @endif
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin "><strong> {{ __('teacher') }} </strong> {{ $selectedCourse->teacher_name }} </p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong> {{ __('category') }} </strong> <a href="#"> {{ $selectedCourse->category->name }} </a></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong> {{ __('lecture') }} </strong> {{ $selectedCourse->lecture_count . __('lectures') }} </p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong> {{ __('time') }} </strong> {{ $selectedCourse->time . __('hours')}} </p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong> {{ __('view') }} </strong> {{ $selectedCourse->view }} </p>
                                            </li>
                                            <li>
                                                 <p class="no-margin"><strong> {{ __('like:') }} </strong> {{ $selectedCourse->like }} </p>
                                            </li>
                                            <li>
                                                <p class="no-margin">                                                        
                                                    <strong>
                                                        @if (!($activeCourse))
                                                            {{ __('status') . ': ' . __('ready') }}
                                                        @elseif ($activeCourse === 1)
                                                            {{ __('status') . ': ' . __('pending') }}
                                                        @elseif ($activeCourse === 2)
                                                            {{ __('status') . ': ' . __('actived') }} 
                                                        @endif
                                                    </strong>
                                                </p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li>
                                                <a href="#"> <i class=" fa fa-phone"></i> {{ $selectedCourse->teacher_phone }} </a></li>
                                                <li>
                                                    <li>
                                                        <a href="#"> {{ __('posted_by') }} <i class=" fa fa-user"></i> {{ $selectedCourse->teacher_name }} </a></li>
                                                        <li>
                                                            <a href="#"> <i class=" fa fa-heart"></i> {{ __('like') }} </a></li>
                                                            <li>
                                                                <a href="#"> <i class="fa fa-share-alt"></i> Share </a><br><br>
                                                                <div class="social-link">
                                                                    <a class="twitter" target="_blank" data-original-title="twitter" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                                                                    <a class="facebook" target="_blank" data-original-title="facebook" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                                                                    <a class="google" target="_blank" data-original-title="google-plus" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
                                                                    <a class="linkedin" target="_blank" data-original-title="linkedin" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="inner-box">
                                            <div class="widget-title">
                                                <h4>Advertisement</h4>
                                            </div>
                                            <img src="assets/img/img1.jpg" alt="">
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="features-box wow fadeInDownQuick" data-wow-delay="0.3s">
                                                <div class="features-icon">
                                                    <i class="lnr lnr-star">
                                                    </i>
                                                </div>
                                                <div class="features-content">
                                                    <h4>
                                                        Fraud Protection
                                                    </h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis repellat rerum assumenda facere.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="features-box wow fadeInDownQuick" data-wow-delay="0.6s">
                                                <div class="features-icon">
                                                    <i class="lnr lnr-chart-bars"></i>
                                                </div>
                                                <div class="features-content">
                                                    <h4>
                                                        No Extra Fees
                                                    </h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis repellat rerum assumenda facere.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="features-box wow fadeInDownQuick" data-wow-delay="0.9s">
                                                <div class="features-icon">
                                                    <i class="lnr lnr-spell-check"></i>
                                                </div>
                                                <div class="features-content">
                                                    <h4>
                                                        Verified Data
                                                    </h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis repellat rerum assumenda facere.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="features-box wow fadeInDownQuick" data-wow-delay="0.9s">
                                                <div class="features-icon">
                                                    <i class="lnr lnr-smile"></i>
                                                </div>
                                                <div class="features-content">
                                                    <h4>
                                                        Friendly Return Policy
                                                    </h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aut magni perferendis repellat rerum assumenda facere.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::text('user', $currentUserId, ['class' => 'form-control hidden', 'id' => 'user_id']) }}
                        {{ Form::text('course', $selectedCourse->id, ['class' => 'form-control hidden', 'id' => 'course_id']) }}
                        <section class="featured-lis mb30">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                                        <h3 class="section-title">Related Products</h3>
                                        <div id="new-products" class="owl-carousel">
                                            <div class="item">
                                                <div class="product-item">
                                                    <div class="carousel-thumb">
                                                        <img src="assets/img/product/img1.jpg" alt="">
                                                        <div class="overlay">
                                                            <a href="ads-details.html"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                    <a href="ads-details.html" class="item-name">Lorem ipsum dolor sit</a>
                                                    <span class="price">$150</span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-item">
                                                    <div class="carousel-thumb">
                                                        <img src="assets/img/product/img2.jpg" alt="">
                                                        <div class="overlay">
                                                            <a href="ads-details.html"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                    <a href="ads-details.html" class="item-name">Sed diam nonummy</a>
                                                    <span class="price">$67</span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-item">
                                                    <div class="carousel-thumb">
                                                        <img src="assets/img/product/img3.jpg" alt="">
                                                        <div class="overlay">
                                                            <a href="ads-details.html"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                    <a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
                                                    <span class="price">$300</span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-item">
                                                    <div class="carousel-thumb">
                                                        <img src="assets/img/product/img4.jpg" alt="">
                                                        <div class="overlay">
                                                            <a href="ads-details.html"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                    <a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
                                                    <span class="price">$45</span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-item">
                                                    <div class="carousel-thumb">
                                                        <img src="assets/img/product/img5.jpg" alt="">
                                                        <div class="overlay">
                                                            <a href="ads-details.html"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                    <a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
                                                    <span class="price">$1120</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        $('button').on('click', function() {
            console.log('clicked');
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });              
            $.post(
                '/courses_users/activeCourse',
                {
                    user_id : $('#user_id').val(),
                    course_id : $('#course_id').val()
                },
                function(data) {
                    if (typeof(data) === 'boolean') {
                        $('#active-btn button').removeClass('btn-warning');
                        $('#active-btn button').addClass('btn-primary');
                        $('#active-btn button').text(' {{ __('active_now') }} ');

                        $.notify({
                            // options
                            message: '{{ __('cancel_active_success') }}' 
                        },{
                            // settings
                            type: 'warning'
                        });
                    } else {
                        $('#active-btn button').removeClass('btn-primary');
                        $('#active-btn button').addClass('btn-warning');
                        $('#active-btn button').text(' {{ __('cancel_active') }} ');

                        $.notify({
                            // options
                            message: ' {{ __('active_success') }} ' 
                        },{
                            // settings
                            type: 'success'
                        });
                    }                  
                }
            );
        })
    </script>
@endsection
