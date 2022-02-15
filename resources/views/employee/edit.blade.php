@extends('layouts.app')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Employee</h5>
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
      <form method="post" action="{{route('employee.update',$employee->id)}}">
        {{csrf_field()}}

        <div class="form-group">
          <label for="inputName" class="col-form-label">Staff ID <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="staffid" placeholder="Enter Staff ID"  value="{{$employee->staffid}}" class="form-control">
          @error('ID')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputName" class="col-form-label"> First Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="fname" placeholder="Enter First Name"  value="{{$employee->fname}}" class="form-control">
          @error('fname')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputName" class="col-form-label"> Last Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="lname" placeholder="Enter Last Name"  value="{{$employee->lname}}" class="form-control">
          @error('lname')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="companyid">Company</label>
          <select name="companyid" class="form-control">
              <option value="">--Select company--</option>
              @foreach($companyname as $key=>$cname)

                  <option value='{{$cname->id}}' {{(($cname->id==$employee->companyid) ? 'selected' : '')}}>{{$cname->name}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="inputName" class="col-form-label"> Department <span class="text-danger"></span></label>
          <input id="inputTitle" type="text" name="department" placeholder="Enter Department"  value="{{$employee->department}}" class="form-control">
          @error('department')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputName" class="col-form-label">Email <span class="text-danger"></span></label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{$employee->email}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputName" class="col-form-label"> Phone<span class="text-danger"></span></label>
          <input id="inputTitle" type="text" name="phone" placeholder="Enter Phone"  value="{{$employee->phone}}" class="form-control">
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="address" class="col-form-label">Address</label>
          <textarea class="form-control" id="address" name="address">{{$employee->address}}</textarea>
          @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

