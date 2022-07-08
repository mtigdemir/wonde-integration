@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Students') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>#ID</th>
                            <th>Class Name</th>
                            <th>Class Description</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($class->students->data as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->forename}} {{$student->middle_names}}</td>
                                    <td>{{$student->surname}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
