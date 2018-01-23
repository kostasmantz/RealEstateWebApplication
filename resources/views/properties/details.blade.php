@extends('layouts.app')

@section('content')
<div class="container content-margin content-center">
    <div class="row">
        <div class="col-md-6">
            <h2>{{$listing->name}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div style="width:300; height:200px; background:url('img/{{$listing->photo}}');" > <!-- $listing->photo -->
                <img class="card-img-top" alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Price: {{$listing->price}} for {{$listing->type}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Location: {{$listing->city}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Description:</h4>
            <div class="jumbotron">
                <p>{{ $listing->description }}</p>
            </div>
        </div>
    </div>
</div>

@endsection