@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials.modal')
                <h1>Tổng số sách bạn đã thêm mới là : {{ $totalBook }} </h1>
            </div>
        </div>
    </div>
@endsection

