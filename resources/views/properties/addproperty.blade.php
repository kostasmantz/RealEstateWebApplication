@extends('layouts.app')

@section('content')

<div class="container content-margin">

  <div class="row">
    <div class="col-md-6">
    <h1>Add Product</h1>
    </div>
  </div>
  <div class="row">
    <form role="form" method="post" action="{{ route('addProperty') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <!-- Name Field -->
      <div class="form-group">
        <label for="name">Listing Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Listing Name"> 
      </div>
      <!-- Description Field -->
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description..."></textarea>
      </div>
      <!-- Photo Field -->
      <div class="form-group">
        <label for="photo">Photo</label><br>
        <input class="filestyle" id="photo" name="photo" data-icon="false" type="file"> 
      </div>
      <!-- Price Field -->
      <div class="form-group">
        <label for="price">Price</label><br>
        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price"> 
      </div>
      <!-- City Field -->
      <div class="form-group">
        <label for="city">City</label><br>
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter your City"> 
      </div>
      <!-- Type Field -->
      <div class="form-group">
        Property Type:
        <div class="form-check">
          <input class="form-check-input" type="radio" name="listingType" id="listingType" value="sale" checked>
          <label class="form-check-label" for="listingType">
          Sale
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="listingType" id="listingType" value="rent">
          <label class="form-check-label" for="listingType">
          Rent
          </label>
        </div>
      </div>
      <!-- Sumbit Button -->
      <input type="submit" class="btn btn-primary mb-2" value="Add">
    </form>
  </div>
    
  

</div>
<!-- /.container -->

@endsection