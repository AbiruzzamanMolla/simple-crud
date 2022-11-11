@extends('layouts.app')
@section('content')
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Division</th>
            <th scope="col">Distict</th>
            <th scope="col">Upzilla</th>
            <th scope="col" class="text-center" width="10%">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $student)
            <tr>
                <th scope="row">{{ $loop->index +1 }}</th>
                <td>{{ $student->name }}</td>
                <td>{{ $student->division->name }}</td>
                <td>{{ $student->distict->name }}</td>
                <td>{{ $student->upzilla->name }}</td>
                <td class="text-center">
                  <div class="btn-group" role="group">
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning"><i
                      class="fa-solid fa-pen-to-square"></i></a>
                    <button type="button" class="btn btn-danger"><i
                      class="fa-solid fa-trash"></i></button>
                  </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data Found...</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
