@extends('layouts.default')

@section('title')
    {{ $selectedUser->name }} - Thông tin cá nhân
@endsection

@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 page-sideabr">
                    <aside>
                        <div class="inner-box">
                            <div class="user-panel-sidebar">
                                <div class="collapse-box">
                                    <h5 class="collapset-title no-border">Thông tin của tôi<a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified"><i class="fa fa-angle-down"></i></a></h5>
                                    <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li class="active">
                                                <a href="account-home.html"><i class="fa fa-home"></i>Trang cá nhân</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="collapse-box">
                                    <h5 class="collapset-title">My Ads <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
                                    <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li>
                                                <a href="account-myads.html"><i class="fa fa-credit-card"></i> My Ads <span class="badge">44</span></a>
                                            </li>
                                            <li>
                                                <a href="account-favourite-ads.html"><i class="fa fa-heart-o"></i> Favourite Ads <span class="badge">19</span></a>
                                            </li>
                                            <li>
                                                <a href="account-saved-search.html"><i class="fa fa-star-o"></i> Saved Search <span class="badge">13</span></a>
                                            </li>
                                            <li>
                                                <a href="account-archived-ads.html"><i class="fa fa-folder-o"></i> Archived Ads <span class="badge">49</span></a>
                                            </li>
                                            <li>
                                                <a href="account-pending-approval-ads.html"><i class="fa fa-hourglass-o"></i> Pending Approval <span class="badge">33</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="collapse-box">
                                    <h5 class="collapset-title">Terminate Account <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#close"><i class="fa fa-angle-down"></i></a></h5>
                                    <div aria-expanded="true" id="close" class="panel-collapse collapse in">
                                        <ul class="acc-list">
                                            <li>
                                                <a href="account-close.html"><i class="fa fa-close"></i> Close Account</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inner-box">
                            <div class="widget-title">
                                <h4>Advertisement</h4>
                            </div>
                            <img src="/assets/img/img1.jpg" alt="">
                        </div>
                    </aside>
                </div>
                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <div class="usearadmin">
                            <h3><img class="userimg" src="{{ asset($selectedUser->image) }}" alt="">{{ $selectedUser->name }}</h3>
                        </div>
                    </div>
                    @include('flash::message')
                    <div class="inner-box">
                        <div class="welcome-msg">
                            <h3 class="page-sub-header2 clearfix no-padding">Xin chào {{ $selectedUser->name }}</h3>
                            <span class="page-sub-header-sub small"> Đăng nhập lần cuối {{ $diffTimeVietnamese }}</span>
                        </div>
                        <div id="accordion" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Thông tin của tôi </a> </h4>
                                </div>
                                <div class="panel-collapse collapse in" id="collapseB1">
                                    <div class="panel-body">
                                        {{ Form::model($selectedUser, ['route' => ['users.update', $selectedUser->id]]) }}
                                            {{ Form::hidden('role', $selectedUser->role) }}
                                            <input name="_method" type="hidden" value="PUT">
                                            <div class="form-group">
                                                {{ Form::label('name', 'Tên', ['class' => 'control-label']) }}
                                                <div @if ($errors->has('name')) style="border: 1px solid red" @endif>
                                                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                                                </div>
                                                <p style="color: red"> {{ $errors->first('name')}} </p>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                                                {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'readonly']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('address', 'Địa chỉ', ['class' => 'control-label']) }}
                                                <div @if ($errors->has('address')) style="border: 1px solid red" @endif>
                                                    {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) }}
                                                </div>
                                                <p style="color: red"> {{ $errors->first('address')}} </p>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('image', 'Ảnh đại diện', ['class' => 'control-label']) }}
                                            <br>
                                                {{ Form::file('image', ['id' => 'image', 'style' => 'display: none;', 'onchange' => 'readURL(this)']) }}
                                                <input type="button" value="Cập nhật ảnh đại diện" onclick="document.getElementById('image').click();" />
                                                <input type="button" id="cancel" value="Hủy bỏ" onclick="backImage()" hidden="" />
                                                <input type="text" id="cancel-value" name="cancel_value" hidden="" value="cancel" disabled=""/>
                                                <input type="button" id="delete" name="delete" value="Xóa ảnh đại diện" onclick="deleteImage()"/>
                                                <input type="text" id="delete-value" name="delete_value" hidden="" value="delete" disabled=""/>
                                            </div>
                                            <img class="userimg" id="currentImage" src="{{ asset($selectedUser->image) }}" style="width: 160px; height: 160px">
                                            <br>
                                            <br>
                                            <div class="form-group">
                                                {{ Form::label('detail', 'Viết điều gì đó về bạn', ['class' => 'control-label']) }}
                                                {{ Form::textarea('detail', null, ['class' => 'form-control', 'id' => 'detail', 'rows' => 5, 'cols' => 30]) }}
                                            </div>
                                            @if ($selectedUser->role == 0 || $selectedUser->role == 1)
                                            <div class="form-group">
                                                {{ Form::label('office', 'Nơi làm việc', ['class' => 'control-label']) }}
                                                <select name="country" class="country" id="country">
                                                    <option selected="selected">--Seleccionar Pais--</option>
                                                    @foreach(\App\Models\Province::all() as $province)
                                                        <option value="{{ $province->id  }}">{{ $province->name  }}</option>
                                                    @endforeach
                                                </select> <br/><br/>

                                                <select name="city" class="city" id="city">
                                                    <option selected="selected">--Seleccionar Ciudad--</option>
                                                </select>
                                                {{--<div @if ($errors->has('office')) style="border: 1px solid red" @endif>--}}
                                                    {{--{{ Form::text('office', null, ['class' => 'form-control', 'id' => 'office']) }}--}}
                                                {{--</div>--}}
                                                <p style="color: red"> {{ $errors->first('office')}} </p>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('group', 'Khối dạy', ['class' => 'control-label']) }}
                                                    @if ($errors->has('group'))
                                                    {{ Form::select('group', [
                                                        '1' => 'Lớp một',
                                                        '2' => 'Lớp hai',
                                                        '3' => 'Lớp ba',
                                                        '4' => 'Lớp bốn',
                                                        '5' => 'Lớp năm',
                                                        '6' => 'Lớp sáu',
                                                        '7' => 'Lớp bảy',
                                                    ], null, ['class' => 'form-control', 'id' => 'group', 'placeholder' => 'Chọn lớp dạy của bạn', 'style' => 'border: 1px solid red']) }}
                                                    @else
                                                        {{ Form::select('group', [
                                                        '1' => 'Lớp một',
                                                        '2' => 'Lớp hai',
                                                        '3' => 'Lớp ba',
                                                        '4' => 'Lớp bốn',
                                                        '5' => 'Lớp năm',
                                                        '6' => 'Lớp sáu',
                                                        '7' => 'Lớp bảy',
                                                    ], null, ['class' => 'form-control', 'id' => 'group', 'placeholder' => 'Chọn lớp dạy của bạn']) }}
                                                    @endif
                                                <p style="color: red"> {{ $errors->first('group')}} </p>
                                            </div>
                                            @endif
                                            @if ($selectedUser->role == 0 || $selectedUser->role == 2)
                                            <div class="form-group">
                                                {{ Form::label('grade', 'Khối học', ['class' => 'control-label']) }}
                                                {{ Form::select('grade', [
                                                    '1' => 'Lớp một',
                                                    '2' => 'Lớp hai',
                                                    '3' => 'Lớp ba',
                                                    '4' => 'Lớp bốn',
                                                    '5' => 'Lớp năm',
                                                    '6' => 'Lớp sáu',
                                                    '7' => 'Lớp bảy',
                                                    '8' => 'Lớp tám',
                                                    '9' => 'Lớp chín',
                                                    '10' => 'Lớp mười',
                                                    '11' => 'Lớp mười một',
                                                    '12' => 'Lớp mười hai'
                                                ], null, ['class' => 'form-control', 'id' => 'grade', 'placeholder' => 'Chọn khối học của bạn']) }}
                                                <p style="color: red"> {{ $errors->first('grade')}} </p>
                                            </div>
                                            @endif
                                        {{ Form::submit('Cập nhật', ['class' => 'btn btn-common', 'name' => 'update_info', 'style' => 'margin-top: 20px;']) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="#collapseB2" data-toggle="collapse"> Thay đổi mật khẩu </a> </h4>
                                </div>
                                <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB2">
                                    <div class="panel-body">
                                        {{ Form::model($selectedUser, ['route' => ['users.update', $selectedUser->id]]) }}
                                            <input name="_method" type="hidden" value="PUT">
                                            <div class="form-group">
                                                {{ Form::label('old_password', 'Nhập mật khẩu cũ', ['class' => 'control-label']) }}
                                                <div @if ($errors->has('old_password')) style="border: 1px solid red" @endif>
                                                    {{ Form::password('old_password', ['class' => 'form-control', 'id' => 'old-password']) }}
                                                </div>
                                                <p style="color: red"> {{ $errors->first('old_password')}} </p>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('new_password', 'Nhập mật khẩu mới', ['class' => 'control-label']) }}
                                                <div @if ($errors->has('new_password')) style="border: 1px solid red" @endif>
                                                    {{ Form::password('new_password', ['class' => 'form-control', 'id' => 'new-password']) }}
                                                </div>
                                                <p style="color: red"> {{ $errors->first('new_password')}} </p>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('password_confirmation', 'Nhập lại mật khẩu mới', ['class' => 'control-label']) }}
                                                <div @if ($errors->has('password_confirmation')) style="border: 1px solid red" @endif>
                                                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirmation']) }}
                                                </div>
                                                <p style="color: red"> {{ $errors->first('password_confirmation')}} </p>
                                            </div>
                                        {{ Form::submit('Thay đổi mật khẩu', ['class' => 'btn btn-common', 'name' => 'update_password', 'style' => 'margin-top:20px;']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#name').focus(function() {
                $('#name').parent().removeAttr('style');
                $('#name').parent().next().remove();
            })
            $('#address').focus(function() {
                $('#address').parent().removeAttr('style');
                $('#address').parent().next().remove();
            })
            $('#detail').focus(function() {
                $('#detail').parent().removeAttr('style');
                $('#detail').parent().next().remove();
            })
            $('#office').focus(function() {
                $('#office').parent().removeAttr('style');
                $('#office').next().remove();
            })
            $('#group').focus(function() {
                $('#group').removeAttr('style');
                if($('#group').next().is('p')) {
                    $('#group').next().remove();
                }
            })
            $('#grade').focus(function() {
                $('#grade').parent().removeAttr('style');
                $('#grade').parent().next().remove();
            })
            $('#old-password').focus(function() {
                $('#old-password').parent().removeAttr('style');
                $('#old-password').parent().next().remove();
            })
            $('#new-password').focus(function() {
                $('#new-password').parent().removeAttr('style');
                if($('#new-password').parent().next().is('p')) {
                    console.log("abc");
                }
                $('#new-password').parent().next().remove();
            })
            $('#password-confirmation').focus(function() {
                $('#password-confirmation').parent().removeAttr('style');
                $('#password-confirmation').parent().next().remove();
            })
        })

        function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#currentImage').attr('src', e.target.result);
                        $('#cancel').fadeIn(1000);
                    };

                reader.readAsDataURL(input.files[0]);
                $('#cancel-value').attr('disabled', '');
                $('#delete-value').attr('disabled', '');
            }
        }

        function backImage() {
            $('#currentImage').attr('src', '{{ asset($selectedUser->image) }}');
            $('#cancel-value').removeAttr('disabled');
            $('#delete-value').attr('disabled', '');
            $('#cancel').fadeOut(1000);
        }

        function deleteImage() {
            $('#currentImage').attr('src', '{{ asset('images/user_image/avatar.png') }}');
            $('#cancel').fadeIn(1000);
            $('#cancel-value').attr('disabled', '');
            $('#delete-value').removeAttr('disabled');
        }

        $('select#country').change(function(){
            var countryId = $(this).val();
            $('#city').children().remove();
            $.get('/districts/'+countryId, function(data){
                $.each(data, function(index, element){
                    console.log(element);
                    $('select#city').append('<option value="'+element.id+'" class="cityItems">'+element.name+'</option>')
                });
            }, 'json');
        });
    </script>
@endsection
