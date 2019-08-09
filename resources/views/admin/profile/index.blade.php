@extends('layouts.app')
@section('content')
    <div>
        <h4><strong>Profile Employee:</strong> @if(Auth::user()){{ $user->name }}@endif</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3 ">
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif
                    <div class="view overlay" width="200px">
                        <img class="rounded-circle" src="{{ Storage::url($user->avatar) }}" style="width:100%"/>
                            <div class="middle">
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Change</button>
                            </div>
                    </div>
                    <h5>
                        @if(Auth::user())Mã NV: {{ $user->id }}</br></br>
                            <span> {{ $user->name }}</span>
                        @endif
                    </h5>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>Tên nhân viên: {{ $user->name }}</li>
                        <hr>
                        <li>Giới tính: @if($user->gender == 0) Nam @else Nữ @endif</li>
                        <hr>
                        <li>Ngày sinh: {{ $user->birthday }}</li>
                        <hr>
                        <li>Nơi sinh: {{ $user->birthplace }}</li>
                        <hr>
                        <li>Thường trú: {{ $user->resident }}</li>
                        <hr>
                        <li>Email: {{ $user->email }}</li>
                        <hr>
                        <li>SĐT: {{ $user->phone }}</li>
                        <hr>
                        <li>Số CMND:{{ $user->cmnd }} </li>
                        <hr>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>Quốc tịch: {{ $user->nationality }}</li>
                        <hr>
                        <li>Số thẻ: {{ $user->numbercard }}</li>
                        <hr>
                        <li>Ngày vào làm: {{ $user->daystowork }} </li>
                        <hr>

                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Images</h4>
                </div>
                <div class="modal-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="profile" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection


