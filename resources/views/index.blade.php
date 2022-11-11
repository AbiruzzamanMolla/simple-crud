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
                        <a href="{{ route('students.edit', $student->id) }}"
                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button class="btn btn-danger deleteButton" data-toggle="tooltip"
                            data-placement="top" title="" data-original-title="Delete"
                            data-url="{{ route('students.destroy', $student->id) }}"
                            data-token="{{ csrf_token() }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </td>
                <form id="delete-form-{{$student->id}}"
                    + action="{{route('students.destroy', $student->id)}}"
                    method="post">
                  @csrf @method('DELETE')
              </form>
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data Found...</td>
            </tr>
        @endforelse
    </tbody>
</table>
{{ $students->links() }}
@endsection

@section('script')
<script type="text/javascript">
    $(".deleteButton").click(function (e) {
        e.preventDefault();
        var URL = $(this).data('url');
        var token = $(this).data('token');
        deleteConfirmation(URL, token);
    });
    function deleteConfirmation(URL, token) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    type: 'DELETE',
                    url: URL,
                    data: {
                        _token: token
                    },
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                            location.reload();
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
</script>
@endsection