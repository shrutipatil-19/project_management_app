@extends('project_management.layout.app')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Assign Project</h4>
                        <!-- <p class="card-description"> Basic form elements </p> -->
                        <form class="forms-sample" action="{{ route('assignProjectCreate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="assign_project">Project Name</label>
                                <select class="form-control" id="assign_project" name="assign_project">
                                    @foreach ($projects as $project)
                                    <option>{{$project->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="assign_employee">Employees</label>
                                <select class="form-control" id="assign_employee" name="assign_employee">
                                    @foreach ($employees as $employee)
                                    <option>{{$employee->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

</div>
@endsection