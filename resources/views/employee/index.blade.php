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
      <h6 class="m-0 font-weight-bold text-primary float-left">Employee Lists</h6>
      <a href="{{route('employee.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Employee</a>
    </div>
    @endif
    <div class="card-body">
      <div class="table-responsive">

        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Staff ID</th>
              <th>Name</th>
              <th>Department</th>
              <th>Company</th>
              <th>Action</th>
            </tr>
          </thead>
          @foreach($employee as $em)
          @php
              $companyname=DB::table('companies')->select('name')->where('id',$em->companyid)->get();
          @endphp
          <tbody>
            <tr>
              <td>{{ $em->staffid }}</td>
              <td>{{ $em->fname }}{{ $em->lname }}</td>
              <td>{{ $em->department }}</td>
              <td>
                @foreach($companyname as $companyname)
                  {{$companyname->name ?? ""}}
                @endforeach
              </td>
              <td>
                @if(Auth::user()->name == "Admin")
                        <a href="{{route('employee.editlist',$em->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <a href="{{route('employee.delete',$em->id)}}" class="btn btn-danger btn-sm dltBtn" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="delete" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>

                  @endif
                    </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        {{$employee->links() }}
      </div>
    </div>
</div>
@endsection

