@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('students.store') }}" method="post">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label for="name" class="pb-1">Name</label>
                                <input type="text" class="form-control" id="name"
                                    value="{{ old('name') }}" placeholder="Enter Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label for="name" class="pb-1">Division</label>
                                <select class="form-select" aria-label="Division">
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endsection
