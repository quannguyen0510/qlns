@extends('layouts.app')
@section('content')
<router-view name="accountToolbar"></router-view>
<router-view name="accountIndex"></router-view>
<router-view></router-view>
@endsection