@extends('students.layout')

@section('content')
<div class="pull-left">
    <h2>Student CRUD Step by Step</h2>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb padding">
        <div class="pull-right">
            <a href="{{ route('students.create') }}" class="btn btn-success">Create new student</a>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
<div class="alert aler-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>Fee</th>
        <th>Country</th>
        <th>City</th>

        <th width="280px">Action</th>
        <th></th>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->studname }}</td>
        <td>{{ $student->course }}</td>
        <td>{{ $student->fee }}</td>
        <td>{{ $student->address->country }}</td>
        <td>{{ $student->address->city }}</td>
        <td>
            <form action="{{ route('students.destroy', $student->id) }}" method="post">
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>