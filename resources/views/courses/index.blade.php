@extends('layouts.default')

@section('title')
    {{ __('course_list') }}
@endsection

@section('content')
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 page-content">
                <div class="product-filter">
                    <div class="grid-list-count">
                        <a class="grid switchToList active" href="#"><i class="fa fa-th-large"></i></a>
                        <a class="list switchToGrid" href="#"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="adds-wrapper">
                    @foreach ($courses as $course)
                        <div class="item-list">
                            <div class="col-sm-2 no-padding photobox">
                                <div class="add-image">
                                    <a href="#"><img src="{{ str_replace('public/', '', asset($course->course_avatar)) }}" alt=""></a>
                                    <span class="photo-count"><i class="fa fa-eye"></i> {{ $course->view }} </span>
                                </div>
                            </div>
                            <div class="col-sm-7 add-desc-box">
                                <div class="add-details">
                                    <h5 class="add-title"><a href="ads-details.html"> {{ $course->name }} </a></h5>
                                    <div class="info">
                                        {{ $course->category->name }}
                                        <br>
                                        {{ __('rate') }}
                                        @for ($temp = 0; $temp < $course->course_rate; $temp++)
                                            <span class="add-type"><i class="icon fa fa-star"></i></span>
                                        @endfor
                                        <br>
                                        <span class="date">
                                            <i class="fa fa-clock"></i>
                                           {{ __('updated_at') . $course->updated_at }}
                                        </span>
                                        <br>
                                        <span class="category"> {{ __('level') . $course->level }}  </span> -
                                        <span class="item-location"><i class="fa fa-map-book"></i> {{ $course->lecture_count . __('lectures') . __('with') . $course->time . __('hours') }} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 text-right price-box">
                                <h2 class="item-price"> {{ $course->teacher_name }} </h2> 
                                <a class="btn btn-common btn-sm" href="{{ route('courses.show', $course->id) }}"><i class="fa fa-info"></i><span> {{ __('detail_course') }} </span></a>
                                <a class="btn btn-danger btn-sm"> <i class="fa fa-heart"></i> <span> {{ $course->like }} </span> </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination-bar">
                    <ul class="pagination">
                        <li> {{ $courses->appends(\Request::except('page'))->render() }} </li>
                    </ul>
                </div>
                @if (Auth::user()->role == 1)
                <div class="post-promo text-center">
                    <h2> {{ __('create_course_p1') }} </h2>
                    <h5> {{ __('create_course_p2') }} </h5>
                    <a href="post-ads.html" class="btn btn-post btn-danger"> {{ __('create_course_p3') }} </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
