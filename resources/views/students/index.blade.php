<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Show Student</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Show Student Profile
                    </div>
                    <div class="card-body">
                        <a href="{{ url('add-student') }}" class="btn btn-primary">Add New</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Profile Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>
                                                <img src="{{ asset('images') }}/{{ $student->profileimage }}"
                                                    style="max-width: 60px;">
                                            </td>
                                            <td>
                                                <a href="/show-student/{{ $student->id }}"
                                                    class="btn btn-info btn-sm">view</a>
                                            </td>
                                            <td>
                                                <a href="/edit-student/{{ $student->id }}"
                                                    class="btn btn-success btn-sm">edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('student.delete', $student->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                        data-toggle="tooltip" title="Delete">
                                                        Delete
                                                    </button>
                                                </form>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closet("form");
            var name = $(this).data("name");

            event.preventDefault();
            Swal({
                title: 'Are you sure you went to delete this record?',
                text: "If your delete this, will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete)=>{
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script> --}}
</body>

</html>
