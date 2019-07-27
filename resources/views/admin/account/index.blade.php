@extends('layouts.app')
@section('content')
<router-view name="account-toolbar"></router-view>
<router-view name="account-index"></router-view>
<router-view></router-view>
@endsection