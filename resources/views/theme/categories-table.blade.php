@extends('theme.master')
@section('content')
    <div class="content-body">


        {{-- @dd($categories); --}}

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Categories</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex; justify-content: space-between;">
                                <h4 class="card-title">Categories table </h4>
                                <a href="{{ asset('modals') }}/user-modal" class="btn mb-1 btn-outline-primary"
                                    data-toggle="modal" data-target="#exampleModalLong">
                                    Add New Category
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="{{ route('categories-table.store') }}"
                                                enctype="multipart/form-data" id="createUserForm">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="category_name">Category Name</label>
                                                        <input type="text" class="form-control" id="category_name"
                                                            name="category_name" placeholder="Enter Category Name" required>
                                                        @if ($errors->has('category_name'))
                                                            <small
                                                                class="text-danger">{{ $errors->first('category_name') }}</small>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="category_image">Category Image</label>
                                                        <input type="file" class="form-control" id="category_image"
                                                            name="category_image" accept="image/*">
                                                        @if ($errors->has('category_image'))
                                                            <small
                                                                class="text-danger">{{ $errors->first('category_image') }}</small>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Create Category</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <h4 class="card-title">Number of Categories:{{ $categories->count() }} </h4>
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
                                            <th>#</th> <!-- Numbering Column Footer -->
                                            <th>Category Name</th>
                                            <th>Category image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $index => $category)
                                            <tr style="font-size: 14px;">
                                                <td>{{ $index + 1 }}</td> <!-- Numbering Column -->
                                                <td>{{ $category->category_name }}</td>
                                                <td>
                                                    @if ($category->category_image)
                                                        <img src="{{ asset('assets/images/category/' . $category->category_image) }}"
                                                            alt="{{ $category->category_name }}" width="50">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>


                                                <td>
                                                    @if ($category->is_deleted)
                                                        <span class="badge badge-danger px-3 py-1">Deleted</span>
                                                    @else
                                                        <span class="badge badge-success px-3 py-1">Active</span>
                                                    @endif
                                                </td>
                                                <td style="display: flex; justify-content: space-between;">
                                                    <button type="button" class="btn btn-link p-0 px-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        onclick="editCategory({{ $category->category_id }})">
                                                        <i class="fa fa-pencil color-muted"></i>
                                                    </button>


                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="editCategoryModal-{{ $category->category_id }}" tabindex="-1"
                                                        role="dialog"
                                                        aria-labelledby="editCategoryModalTitle-{{ $category->category_id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form id="editCategoryForm-{{ $category->category_id }}"
                                                                    action="{{ route('categories-table.update', $category->category_id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editCategoryModalTitle-{{ $category->category_id }}">
                                                                            Edit Category</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                        style="display: flex; flex-direction: column;">
                                                                        <!-- Hidden Input for Category ID -->
                                                                        <input 
                                                                        type="hidden"
                                                                            id="category_id-{{ $category->category_id }}"
                                                                            name="category_id"
                                                                            value="{{ $category->category_id }}" >

                                                                        <!-- Category Name -->
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="category_name-{{ $category->category_id }}"
                                                                                class="ml-2">Category Name</label>
                                                                            <input style="width: 90%; margin-left: auto; margin-right: auto;" 
                                                                            type="text" 
                                                                                id="category_name-{{ $category->category_id }}"
                                                                                name="category_name" class="form-control"
                                                                                placeholder="Enter Category Name"
                                                                                value="{{ $category->category_name }}"
                                                                                required>
                                                                            @if ($errors->has('category_name'))
                                                                                <small
                                                                                    class="text-danger">{{ $errors->first('category_name') }}</small>
                                                                            @endif
                                                                        </div>

                                                                        <!-- Category Image -->
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="category_image-{{ $category->category_id }}"
                                                                                class="ml-2">Category Image</label>
                                                                            <input style="width: 90%; margin-left: auto; margin-right: auto;"
                                                                            type="file"
                                                                                id="category_image-{{ $category->category_id }}"
                                                                                name="category_image" class="form-control"
                                                                                accept="image/*">
                                                                            @if ($errors->has('category_image'))
                                                                                <small
                                                                                    class="text-danger">{{ $errors->first('category_image') }}</small>
                                                                            @endif
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
                                                

                                                    <!-- Delete Action -->
                                                    <form method="POST"
                                                        action="{{ route('categories-table.destroy', $category->category_id) }}"
                                                        style="display:inline;"
                                                        id="deleteForm-{{ $category->category_id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link p-0 px-2"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                                            onclick="confirmDelete({{ $category->category_id }})">
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
                                            <th>Category Name</th>
                                            <th>Category image</th>
                                            <th>Status</th>
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
        function confirmDelete(CategoryId) {
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
                        document.getElementById('deleteForm-' + CategoryId).submit();
                    });
                }
            });
        }

       
    </script>
<script>
    function editCategory(categoryId) {
        // Set Category ID in Hidden Input
        $('#editCategoryModal-' + categoryId + ' #category_id-' + categoryId).val(categoryId);

        // Optionally, populate other fields via AJAX if needed
        $.ajax({
            url: `/categories-table/${categoryId}/edit`, // Adjust the URL as per your route
            method: 'GET',
            success: function(category) {
                // Populate the fields with category data
                $('#editCategoryModal-' + categoryId + ' #category_name-' + categoryId).val(category.category_name);
                // Assuming 'category_name' is the field name in your database
            },
            error: function(xhr, status, error) {
                // Handle errors if necessary
                alert("Error: " + error);
            }
        });

        // Open the modal
        $('#editCategoryModal-' + categoryId).modal('show');
    }
</script>
    <script>
        $("#createUserForm").on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('categories-table.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire('Success!', response.message || 'Category added successfully!', 'success')
                        .then(() => {
                            location.reload(); // Reload to display the new category
                        });
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors || {};
                    let errorMessages = Object.values(errors).flat().join('<br>');
                    Swal.fire('Error!', errorMessages || 'Failed to add category.', 'error');
                },
            });
        });
    </script>
        <script>
            console.log('{{ route('categories-table.update', $category->category_id) }}');
        
            $("#editCategoryForm-{{ $category->category_id }}").on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission
                console.log("Form Submitted!");
        
                var formData = new FormData(this); // Create FormData object from the form
        
                $.ajax({
                    url: '{{ route('categories-table.update', $category->category_id) }}', // The update route with the category ID
                    type: 'POST', // POST method to submit the data
                    data: formData, // Data being sent to the server
                    processData: false, // Don't process data (needed for FormData)
                    contentType: false, // Don't set content-type (needed for FormData)
                    success: function(response) {
                        if (response.message === 'No changes were made to the category information.') {
                            Swal.fire('No Changes', 'No updates were necessary as the information remained the same.', 'info');
                        } else {
                            Swal.fire('Success!', response.message || 'Category updated successfully!', 'success')
                                .then(() => {
                                    location.reload(); // Reload the page to reflect updated category data
                                });
                        }
                    },
                    error: function(xhr) {
                        // Handle errors, if any
                        let errors = xhr.responseJSON?.errors || {}; // Extract validation errors
                        let errorMessages = Object.values(errors).flat().join('<br>'); // Flatten and join errors
                        Swal.fire('Error!', errorMessages || 'Failed to update category.', 'error'); // Show error message
                    }
                });
            });
        </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
@endsection
