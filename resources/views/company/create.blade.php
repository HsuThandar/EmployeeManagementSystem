@extends('layouts.app')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Company</h5>
    <div class="card-body">
      @if($errors->any())
      <div class="alert alert-warning">
        <ol>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ol>
      </div>
      @endif
      <form method="post" action="{{route('company.store')}}">
        {{csrf_field()}}

        <div class="form-group">
          <label for="inputName" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputName" class="col-form-label">Email <span class="text-danger">*</span></label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{old('email')}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="address" class="col-form-label">Address</label>
          <textarea class="form-control" id="address" name="address">{{old('address')}}</textarea>
          @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

