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
                                <h4 class="card-title">Users Table </h4>
                                <a href="{{ asset('modals') }}/user-modal" class="btn mb-1 btn-outline-primary"
                                    data-toggle="modal" data-target="#exampleModalLong">
                                    Add User
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="{{ route('user-table.store') }}"
                                                id="createUserForm">
                                                @csrf
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
                                                            name="first_name" placeholder="Enter First Name" required
                                                            value="{{ old('first_name') }}">
                                                        @if ($errors->has('first_name'))
                                                            <small
                                                                class="text-danger">{{ $errors->first('first_name') }}</small>
                                                        @endif
                                                    </div>

                                                    <!-- Last Name -->
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" placeholder="Enter Last Name" required
                                                            value="{{ old('last_name') }}">
                                                        @if ($errors->has('last_name'))
                                                            <small
                                                                class="text-danger">{{ $errors->first('last_name') }}</small>
                                                        @endif
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="Enter Email" required
                                                            value="{{ old('email') }}">
                                                        @if ($errors->has('email'))
                                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                                        @endif
                                                    </div>

                                                    <!-- Password -->
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" placeholder="Enter Password" required>
                                                        @if ($errors->has('password'))
                                                            <small
                                                                class="text-danger">{{ $errors->first('password') }}</small>
                                                        @endif
                                                    </div>

                                                    <!-- Phone Number -->
                                                    <div class="form-group">
                                                        <label for="phone_number">Phone Number</label>
                                                        <input type="tel" class="form-control" id="phone_number"
                                                            name="phone_number" placeholder="Enter Phone Number" required
                                                            value="{{ old('phone_number') }}">
                                                        @if ($errors->has('phone_number'))
                                                            <small
                                                                class="text-danger">{{ $errors->first('phone_number') }}</small>
                                                        @endif
                                                    </div>

                                                    <!-- Address -->
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" placeholder="Enter Address" required
                                                            value="{{ old('address') }}">
                                                        @if ($errors->has('address'))
                                                            <small
                                                                class="text-danger">{{ $errors->first('address') }}</small>
                                                        @endif
                                                    </div>

                                                    <!-- Birth Date -->
                                                    <div class="form-group">
                                                        <label for="birth_date">Birth Date</label>
                                                        <input type="date" class="form-control" id="birth_date"
                                                            name="birth_date" required value="{{ old('birth_date') }}">
                                                        @if ($errors->has('birth_date'))
                                                            <small
                                                                class="text-danger">{{ $errors->first('birth_date') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Create User</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $("#createUserForm").on('submit', function(e) {
                                    e.preventDefault();

                                    var formData = new FormData(this);

                                    $.ajax({
                                        url: '{{ route('user-table.store') }}',
                                        type: 'POST',
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function(response) {
                                            Swal.fire('Success!', response.message || 'User added successfully!', 'success')
                                                .then(() => {
                                                    location.reload(); // Reload to display the new user
                                                });
                                        },
                                        error: function(xhr) {
                                            let errors = xhr.responseJSON?.errors || {};
                                            let errorMessages = Object.values(errors).flat().join('<br>');
                                            Swal.fire('Error!', errorMessages || 'Failed to add user.', 'error');
                                        },
                                    });
                                });
                            </script>

                            <h4 class="card-title">Number of users: {{ $users->count() }}</h4>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class = "text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th>#</th> <!-- Numbering Column Header -->
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr style="font-size: 14px;">
                                                <td>{{ $index + 1 }}</td> <!-- Numbering Column -->
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td style="display: flex; justify-content: space-between;">
                                                    <button type="button" class="btn btn-link p-0 px-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        onclick="editUser({{ $user->id }})">
                                                        <i class="fa fa-pencil color-muted"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="editUserModalTitle-{{ $user->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form id="editUserForm-{{ $user->id }}"
                                                                    action="{{ route('user-table.update', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editUserModalTitle-{{ $user->id }}">
                                                                            Edit User</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden                                                                       <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                        style="display: flex; flex-direction: column;">
                                                                        <!-- Hidden Input for User ID -->
                                                                        <input type="hidden" id="user_id-{{ $user->id }}"
                                                                            name="user_id" value="{{ $user->id }}">

                                                                        <!-- First Name (Mapped to name in DB) -->
                                                                        <div class="form-group">
                                                                            <label for="first_name-{{ $user->id }}" class="ml-2">First Name</label>
                                                                            <input type="text" id="first_name-{{ $user->id }}"
                                                                                name="first_name" class="form-control"
                                                                                placeholder="Enter First Name"
                                                                                style="width: 90%; margin-left: auto; margin-right: auto;">
                                                                        </div>

                                                                        <!-- Last Name -->
                                                                        <div class="form-group">
                                                                            <label for="last_name-{{ $user->id }}" class="ml-2">Last Name</label>
                                                                            <input type="text" id="last_name-{{ $user->id }}"
                                                                                name="last_name" class="form-control"
                                                                                placeholder="Enter Last Name"
                                                                                style="width: 90%; margin-left: auto; margin-right: auto;">
                                                                        </div>

                                                                        <!-- Email -->
                                                                        <div class="form-group">
                                                                            <label for="email-{{ $user->id }}" class="ml-2">Email</label>
                                                                            <input type="email" id="email-{{ $user->id }}"
                                                                                name="email" class="form-control"
                                                                                placeholder="Enter Email"
                                                                                style="width: 90%; margin-left: auto; margin-right: auto;">
                                                                        </div>

                                                                        <!-- Phone Number -->
                                                                        <div class="form-group">
                                                                            <label for="phone_number-{{ $user->id }}" class="ml-2">Phone Number</label>
                                                                            <input type="tel" id="phone_number-{{ $user->id }}"
                                                                                name="phone_number" class="form-control"
                                                                                placeholder="Enter Phone Number"
                                                                                style="width: 90%; margin-left: auto; margin-right: auto;">
                                                                        </div>

                                                                        <!-- Address -->
                                                                        <div class="form-group">
                                                                            <label for="address-{{ $user->id }}" class="ml-2">Address</label>
                                                                            <input type="text" id="address-{{ $user->id }}"
                                                                                name="address" class="form-control"
                                                                                placeholder="Enter Address"
                                                                                style="width: 90%; margin-left: auto; margin-right: auto;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        console.log('{{ route('user-table.update', $user->id) }}');

                                                        $("#editUserForm-{{ $user->id }}").on('submit', function(e) {
                                                            e.preventDefault(); // Prevent the default form submission
                                                            console.log("Form Submitted!");

                                                            var formData = new FormData(this); // Create FormData object from the form

                                                            $.ajax({
                                                                url: '{{ route('user-table.update', $user->id) }}', // The update route with the user ID
                                                                type: 'POST', // POST method to submit the data
                                                                data: formData, // Data being sent to the server
                                                                processData: false, // Don't process data (needed for FormData)
                                                                contentType: false, // Don't set content-type (needed for FormData)
                                                                success: function(response) {
                                                                    if (response.message === 'No changes were made to the user information.') {
                                                                        Swal.fire('No Changes', 'No updates were necessary as the information remained the same.', 'info');
                                                                    } else {
                                                                        Swal.fire('Success!', response.message || 'User updated successfully!', 'success')
                                                                            .then(() => {
                                                                                location.reload(); // Reload the page to reflect updated user data
                                                                            });
                                                                    }
                                                                },
                                                                error: function(xhr) {
                                                                    // Handle errors, if any
                                                                    let errors = xhr.responseJSON?.errors || {}; // Extract validation errors
                                                                    let errorMessages = Object.values(errors).flat().join('<br>'); // Flatten and join errors
                                                                    Swal.fire('Error!', errorMessages || 'Failed to update user.', 'error'); // Show error message
                                                                }
                                                            });
                                                        });
                                                    </script>

                                                    <!-- Delete Action -->
                                                    <form method="POST"
                                                        action="{{ route('user-table.destroy', $user->id) }}"
                                                        style="display:inline;" id="deleteForm-{{ $user->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link p-0 px-2"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                                            onclick="confirmDelete({{ $user->id }})">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr style="font-size: 14px;">
                                            <th>#</th> <!-- Numbering Column Footer -->
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
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#rgb(117,113,249)",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show success message before submitting the form
                    Swal.fire({
                        title: "Deleted!",
                        text: "User has been deleted successfully.",
                        icon: "success",
                        confirmButtonColor: "#rgb(117,113,249)",
                    }).then(() => {
                        // Submit the form after user clicks "OK" in the success alert
                        document.getElementById('deleteForm-' + userId).submit();
                    });
                }
            });
        }

        function editUser(userId) {
            // Set User ID in Hidden Input
            $('#editUserModal-' + userId + ' #user_id-' + userId).val(userId);

            // Optionally, populate other fields via AJAX if needed
            $.ajax({
                url: `/user/${userId}/edit`, // Adjust the URL as per your route
                method: 'GET',
                success: function(user) {
                    // Populate the fields with user data
                    $('#editUserModal-' + userId + ' #first_name-' + userId).val(user.name); // Assuming 'name' is stored as 'first name'
                    $('#editUserModal-' + userId + ' #last_name-' + userId).val(user.last_name);
                    $('#editUserModal-' + userId + ' #email-' + userId).val(user.email);
                    $('#editUserModal-' + userId + ' #phone_number-' + userId).val(user.phone_number);
                    $('#editUserModal-' + userId + ' #address-' + userId).val(user.address);
                },
                error: function(xhr, status, error) {
                    // Handle errors if necessary
                    alert("Error: " + error);
                }
            });

            // Open the modal
            $('#editUserModal-' + userId).modal('show');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
@endsection