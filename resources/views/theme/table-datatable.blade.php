@extends('theme.master')
@section('content')
    <div class="content-body">
        {{-- @dd($users) --}}

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex; justify-content: space-between;">
                                <h4 class="card-title">Data Table</h4>
                                <a href="{{ asset('modals') }}/user-modal" class="btn mb-1 btn-outline-primary"
                                    data-toggle="modal" data-target="#exampleModalLong">
                                    Add User
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">User Information</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- First Name -->
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                        placeholder="Enter First Name">
                                                </div>

                                                <!-- Last Name -->
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                        placeholder="Enter Last Name">
                                                </div>

                                                <!-- Email -->
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter Email">
                                                </div>

                                                <!-- Password -->
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Enter Password">
                                                </div>

                                                <!-- Phone Number -->
                                                <div class="form-group">
                                                    <label for="phone_number">Phone Number</label>
                                                    <input type="text" class="form-control" id="phone_number"
                                                        placeholder="Enter Phone Number">
                                                </div>

                                                <!-- Address -->
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address"
                                                        placeholder="Enter Address">
                                                </div>
                                                <!-- Address -->
                                                <div class="form-group">
                                                    <label for="address">Birth of date</label>
                                                    <input type="date" class="form-control" id="address"
                                                        placeholder="Enter Address">
                                                </div>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <h4 class="card-title">Number of users: {{ $users->count() }}</h4>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>

                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>
                                                    <!-- Edit Action -->
                                                    <a href="{{ route('table-datatable.edit', $user->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa fa-pencil color-muted m-r-5"></i>
                                                    </a>

                                                    <!-- Delete Action -->
                                                    <form method="POST"
                                                        action="{{ route('table-datatable.destroy', $user->id) }}"
                                                        style="display:inline;" id="deleteForm-{{ $user->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                            data-placement="top" title="Delete"
                                                            onclick="confirmDelete({{ $user->id }})">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </form>

                                                    <script>
                                                        function confirmDelete(userId) {
                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Yes, delete it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    // Show success message before submitting the form
                                                                    Swal.fire({
                                                                        title: "Deleted!",
                                                                        text: "User has been deleted successfully.",
                                                                        icon: "success",
                                                                        confirmButtonColor: "#3085d6",
                                                                    }).then(() => {
                                                                        // Submit the form after user clicks "OK" in the success alert
                                                                        document.getElementById('deleteForm-' + userId).submit();
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    </script>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>



                                    <tfoot>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
@endsection
