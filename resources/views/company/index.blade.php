@extends('layouts.app')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
  @if(session('info'))
  <div class="alert alert-info">
    {{ session('info') }}
  </div>
  @endif
    @if(Auth::user()->name == "Admin")
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Company Lists</h6>
      <a href="{{route('company.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Company</a>
    </div>
    @endif
    <div class="card-body">
      <div class="table-responsive">

        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          @foreach($company as $com)
          <tbody>
            <tr>
              <td>{{ $com->name }}</td>
              <td>{{ $com->email }}</td>
              <td>{{ $com->address }}</td>
              <td>
                @if(Auth::user()->name == "Admin")
                        <a href="{{route('company.editlist',$com->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <a href="{{route('company.delete',$com->id)}}" class="btn btn-danger btn-sm dltBtn" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="delete" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>

                @endif
                    </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        {{$company->links() }}
      </div>
    </div>
</div>
@endsection

