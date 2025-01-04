@extends('theme.master')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Subcategories</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex; justify-content: space-between;">
                                <h4 class="card-title">Subcategories Table</h4>
                                <a href="{{ asset('modals') }}/subcategory-modal" class="btn mb-1 btn-outline-primary"
                                    data-toggle="modal" data-target="#addSubcategoryModal">
                                    Add New Subcategory

                                </a>
                                <!-- Add Subcategory Modal -->
                                <div class="modal fade" id="addSubcategoryModal" tabindex="-1" role="dialog"
                                aria-labelledby="addSubcategoryModalTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{ route('subcategories-table.store') }}"
                                            enctype="multipart/form-data" id="createSubcategoryForm">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addSubcategoryModalTitle">Add New Subcategory</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="category_id">Category</label>
                                                    <select class="form-control" id="category_id" name="category_id" required>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sub_category_name">Subcategory Name</label>
                                                    <input type="text" class="form-control" id="sub_category_name"
                                                        name="sub_category_name" placeholder="Enter Subcategory Name" required>
                                                    @if ($errors->has('sub_category_name'))
                                                        <small class="text-danger">{{ $errors->first('sub_category_name') }}</small>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Create Subcategory</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <h4 class="card-title">Number of Subcategories: {{ $subcategories->count() }}</h4>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th>#</th>
                                            <th>Subcategory Name</th>
                                            <th>Category</th>
                                            <th>Category Image</th>
                                            <th>Recipes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $index => $subcategory)
                                            <tr style="font-size: 14px;">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $subcategory->sub_category_name }}</td>
                                                <td>{{ $subcategory->category->category_name }}</td>
                                                <td>
                                                    @if ($subcategory->category->category_image)
                                                        <img src="{{ asset('assets/images/category/' . $subcategory->category->category_image) }}"
                                                            alt="{{ $subcategory->category->category_name }}"
                                                            width="50">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-link p-0 px-2" data-toggle="modal"
                                                        data-target="#viewRecipesModal-{{ $subcategory->subcategory_id }}">
                                                        View Recipes
                                                    </button>
                                                    <!-- View Recipes Modal -->
                                                    <div class="modal fade"
                                                        id="viewRecipesModal-{{ $subcategory->subcategory_id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="viewRecipesModalTitle-{{ $subcategory->subcategory_id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="viewRecipesModalTitle-{{ $subcategory->subcategory_id }}">
                                                                        Recipes for {{ $subcategory->sub_category_name }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Recipe Image</th>
                                                                                    <th>Recipe Name</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($subcategory->recipes as $recipe)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <img src="{{ asset('Userassets/images/recipes/' . $recipe->recipe_img) }}"
                                                                                                alt="{{ $recipe->recipe_name }}"
                                                                                                width="50">
                                                                                        </td>
                                                                                        <td>{{ $recipe->recipe_name }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td style="display: flex; justify-content: space-between;">
                                                    <button type="button" class="btn btn-link p-0 px-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        onclick="editSubcategory({{ $subcategory->subcategory_id }})">
                                                        <i class="fa fa-pencil color-muted"></i>
                                                    </button>
                                                    <!-- Edit Subcategory Modal -->
                                                    <div class="modal fade"
                                                        id="editSubcategoryModal-{{ $subcategory->subcategory_id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="editSubcategoryModalTitle-{{ $subcategory->subcategory_id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form method="POST" class="editSubcategoryForm"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="PATCH">
                                                                    <input type="hidden" name="subcategory_id"
                                                                        value="{{ $subcategory->subcategory_id }}">

                                                                    <div class="form-group">
                                                                        <label
                                                                        class="mt-3 mb-3"
                                                                            style="color: black;  display: flex; justify-content: center"
                                                                            for="sub_category_name-{{ $subcategory->subcategory_id }}">Subcategory
                                                                            Name</label>
                                                                        <input style="width: 90%; display:flex ; justify-content:center" type="text" class="mt-3 mb-3 mr-6 ml-3"
                                                                            id="sub_category_name-{{ $subcategory->subcategory_id }}"
                                                                            name="sub_category_name"
                                                                            value="{{ $subcategory->sub_category_name }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update
                                                                            Subcategory</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('subcategories-table.destroy', $subcategory->subcategory_id) }}"
                                                        style="display:inline;"
                                                        id="deleteForm-{{ $subcategory->subcategory_id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link p-0 px-2"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                                            onclick="confirmDelete({{ $subcategory->subcategory_id }})">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr style="font-size: 14px;">
                                            <th>#</th>
                                            <th>Subcategory Name</th>
                                            <th>Category</th>
                                            <th>Category Image</th>
                                            <th>Recipes</th>
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
    </div>

    <script>
        function confirmDelete(subcategoryId) {
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
                    Swal.fire({
                        title: "Deleted!",
                        text: "Subcategory has been deleted successfully.",
                        icon: "success",
                        confirmButtonColor: "#rgb(117,113,249)",
                    }).then(() => {
                        document.getElementById('deleteForm-' + subcategoryId).submit();
                    });
                }
            });
        }

        function editSubcategory(subcategoryId) {
            $('#editSubcategoryModal-' + subcategoryId + ' #subcategory_id-' + subcategoryId).val(subcategoryId);

            $.ajax({
                url: `{{ url('subcategories-table') }}/${subcategoryId}/edit`, // Fetch subcategory data
                method: 'GET',
                success: function(subcategory) {
                    // Populate modal fields
                    $('#editSubcategoryModal-' + subcategoryId + ' #sub_category_name-' + subcategoryId).val(
                        subcategory.sub_category_name);
                },
                error: function() {
                    Swal.fire('Error!', 'Failed to fetch subcategory data.', 'error');
                }
            });

            // Show the modal
            $('#editSubcategoryModal-' + subcategoryId).modal('show');
        }

        // Update Subcategory Form Submission
        $(".editSubcategoryForm").on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            var subcategoryId = $(this).find('input[name="subcategory_id"]').val();

            $.ajax({
                url: `{{ url('subcategories-table') }}/${subcategoryId}`, // This hits the update function
                type: 'POST', // Laravel update typically expects PATCH, but we can send _method as POST
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire('Success!', response.message || 'Subcategory updated successfully!',
                            'success')
                        .then(() => {
                            $('#editSubcategoryModal-' + subcategoryId).modal('hide');
                            location.reload();
                        });
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors || {};
                    let errorMessages = Object.values(errors).flat().join('<br>');
                    Swal.fire('Error!', errorMessages || 'Failed to update subcategory.', 'error');
                },
            });
        });


        $("#createSubcategoryForm").on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('subcategories-table.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire('Success!', response.message || 'Subcategory added successfully!',
                            'success')
                        .then(() => {
                            location.reload();
                        });
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors || {};
                    let errorMessages = Object.values(errors).flat().join('<br>');
                    Swal.fire('Error!', errorMessages || 'Failed to add subcategory.', 'error');
                },
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
