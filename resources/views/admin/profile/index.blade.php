@extends('layouts.app')
@section('content')
    <div>
        <h4><strong>Trang cá nhân:</strong> @if(Auth::user()){{ Auth::user()->name }}@endif</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3 ">
                    <div class="view overlay" width="200px">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXEt1isQ1nMtBdRADlrCjJFzv_SlgRKklidNseFF59i9RQg0Mt"
                             class="img-thumbnail" alt="Cinque Terre" width="200" height="350">
                            <div class="middle">
                                <a href=""> <div class="text">Change</div></a>
                            </div>
                    </div>
                    <h5>
                        @if(Auth::user())Mã NV: {{ Auth::user()->id }}</br></br>
                            <span> {{ Auth::user()->name }}</span>
                        @endif
                    </h5>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>Tên nhân viên: {{ Auth::user()->name }}</li>
                        <hr>
                        <li>Giới tính: @if(Auth::user()->gender == 0) Nam @else Nữ @endif</li>
                        <hr>
                        <li>Ngày sinh: {{ Auth::user()->birthday }}</li>
                        <hr>
                        <li>Nơi sinh: {{ Auth::user()->birthplace }}</li>
                        <hr>
                        <li>Thường trú: {{ Auth::user()->resident }}</li>
                        <hr>
                        <li>Email: {{ Auth::user()->email }}</li>
                        <hr>
                        <li>SĐT: {{ Auth::user()->phone }}</li>
                        <hr>
                        <li>Số CMND:{{ Auth::user()->cmnd }} </li>
                        <hr>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>Quốc tịch: {{ Auth::user()->nationality }}</li>
                        <hr>
                        <li>Số thẻ: {{ Auth::user()->numbercard }}</li>
                        <hr>
                        <li>Ngày vào làm: {{ Auth::user()->daystowork }} </li>
                        <hr>

                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection


