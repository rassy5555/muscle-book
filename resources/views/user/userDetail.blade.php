@extends('layouts.app')

@section('content')

<user-detail-component :user="{{ $user }}"></user-detail-component>

@endsection