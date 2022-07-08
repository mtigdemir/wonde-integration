@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My Classes') }}</div>

                <div class="card-body">
                    <h3>{{ __('Welcome') }} {{$teacher->title}}. {{$teacher->forename}} {{$teacher->surname}}</h3>
                    <table class="table">
                        <thead>
                            <th>#ID</th>
                            <th>Class Name</th>
                            <th>Class Description</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($teacher->classes->data as $class)
                                <tr>
                                    <td>{{$class->id}}</td>
                                    <td>{{$class->name}}</td>
                                    <td>{{$class->description}}</td>
                                    <td>
                                        <a href="{{route('showClass', $class->id)}}"> View Students</a>
                                    </td>
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
