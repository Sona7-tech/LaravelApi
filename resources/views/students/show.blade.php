@extends('students.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Student</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('students.index') }}" class="btn btn-primary"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('students.update', $student->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Name: </strong>
                <input type="text" name="studname" value="{{ $student->studname }}" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course: </strong>
                <input type="text" name="course" value="{{ $student->course }}" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fee: </strong>
                <input type="text" name="fee" value="{{ $student->fee }}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country: </strong>
                <input type="text" name="country" value="{{ $student->address->country }}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City: </strong>
                <input type="text" name="city" value="{{ $student->address->city }}" class="form-control">
            </div>
        </div>
    </div>
</form>
@endsection