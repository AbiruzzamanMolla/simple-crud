@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label for="name" class="pb-1">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $student->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label for="divison" class="pb-1">Division</label>
                                <select class="form-select @error('division_id') is-invalid @enderror"
                                    name="division_id" aria-label="Division" id="divison">
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}" @selected(old('division_id') == $division->id)>{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label for="distict_id" class="pb-1">Distict</label>
                                <select class="form-select @error('distict_id') is-invalid @enderror" aria-label="Distict" name="distict_id" id="distict_id">
                                    <option value="">Select Distict</option>
                                    @foreach($disticts as $distict)
                                    <option value="{{ $distict->id }}" @selected(old('distict_id') == $distict->id)>{{ $distict->name }}</option>
                                @endforeach
                                </select>
                                @error('distict_id')
                                <div class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label for="upzilla_id" class="pb-1">Upzilla</label>
                                <select class="form-select @error('upzilla_id') is-invalid @enderror"
                                    aria-label="Upzilla" name="upzilla_id" id="upzilla_id">
                                    <option value="">Select Upzilla</option>
                                    @foreach($upzillas as $upzilla)
                                    <option value="{{ $upzilla->id }}" @selected(old('upzilla_id') == $upzilla->id)>{{ $upzilla->name }}</option>
                                @endforeach
                                </select>
                                @error('upzilla_id')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-3 offset-5"><button class="btn btn-success">Update</button></div>
                    </div>
                </form>
            </div>
        </div>
        @endsection
        @section('script')
        <script>
            $(document).ready(function () {
                // get distict data
                $('select[name="division_id"]').on('change', function (e) {
                    var divID = $(this).val();
                    if (divID) {
                        $.ajax({
                            url: '/ajax/distict/' + divID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="upzilla_id"]').empty();
                                $('select[name="upzilla_id"]').append(
                                    '<option value="">Select Upzilla</option>');
                                $('select[name="distict_id"]').empty();
                                $('select[name="distict_id"]').append(
                                    '<option value="">Select Distict</option>');
                                $.each(data, function (key, value) {
                                    $('select[name="distict_id"]').append(
                                        '<option value=" ' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            }

                        })
                    }
                });
                // get upzilla data
                $('select[name="distict_id"]').on('change', function (e) {
                    var disID = $(this).val();
                    if (disID) {
                        $.ajax({
                            url: '/ajax/upzilla/' + disID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="upzilla_id"]').empty();
                                $('select[name="upzilla_id"]').append(
                                    '<option value="">Select Upzilla</option>');
                                $.each(data, function (key, value) {
                                    $('select[name="upzilla_id"]').append(
                                        '<option value=" ' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            }

                        })
                    }
                });
            });

        </script>
        @endsection
