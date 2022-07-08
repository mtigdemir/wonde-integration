@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Login to Wonde') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            
                            @error('teacherId')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            @if(session('message'))
                                <div class="alert alert-danger">{{ session('message') }}</div>
                            @endif

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Your School</label>
                                <select name="schoolId" class="form-select" aria-label="Default select example">
                                    @foreach($schools as $school)
                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="employeeNumber">Type your employee Number</label>
                                <input required ame="teacherId" class="form-control" id="employeeNumber"
                                    aria-describedby="employeeHelp" placeholder="Enter employee number" value="A1851920782">
                                <small id="employeeHelp" class="form-text text-muted">This is your emplooye number start with A example A123456721 </small>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
