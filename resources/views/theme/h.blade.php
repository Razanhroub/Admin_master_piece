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
                                            <th>Status</th>
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
                                                            alt="{{ $subcategory->category->category_name }}" width="50">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-link p-0 px-2"
                                                        data-toggle="modal" data-target="#viewRecipesModal-{{ $subcategory->subcategory_id }}">
                                                        View Recipes
                                                    </button>
                                                    <!-- View Recipes Modal -->
                                                    <div class="modal fade" id="viewRecipesModal-{{ $subcategory->subcategory_id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="viewRecipesModalTitle-{{ $subcategory->subcategory_id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="viewRecipesModalTitle-{{ $subcategory->subcategory_id }}">
                                                                        Recipes for {{ $subcategory->sub_category_name }}
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul>
                                                                        @foreach ($subcategory->recipes as $recipe)
                                                                            <li>{{ $recipe->recipe_name }} - <img src="{{ asset('Userassets/images/recipes/' . $recipe->recipe_img) }}" alt="{{ $recipe->recipe_name }}" width="50"></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($subcategory->is_deleted)
                                                        <span class="badge badge-danger px-3 py-1">Deleted</span>
                                                    @else
                                                        <span class="badge badge-success px-3 py-1">Active</span>
                                                    @endif
                                                </td>
                                                <td style="display: flex; justify-content: space-between;">
                                                    <button type="button" class="btn btn-link p-0 px-2"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        onclick="editSubcategory({{ $subcategory->subcategory_id }})">
                                                        <i class="fa fa-pencil color-muted"></i>
                                                    </button>
                                                    <!-- Edit Subcategory Modal -->
                                                    <div class="modal fade" id="editSubcategoryModal-{{ $subcategory->subcategory_id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="editSubcategoryModalTitle-{{ $subcategory->subcategory_id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form id="editSubcategoryForm-{{ $subcategory->subcategory_id }}"
                                                                    action="{{ route('subcategories-table.update', $subcategory->subcategory_id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editSubcategoryModalTitle-{{ $subcategory->subcategory_id }}">
                                                                            Edit Subcategory
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" id="subcategory_id-{{ $subcategory->subcategory_id }}"
                                                                            name="subcategory_id" value="{{ $subcategory->subcategory_id }}">
                                                                        <div class="form-group">
                                                                            <label for="sub_category_name-{{ $subcategory->subcategory_id }}">Subcategory Name</label>
                                                                            <input type="text" id="sub_category_name-{{ $subcategory->subcategory_id }}"
                                                                                name="sub_category_name" class="form-control"
                                                                                value="{{ $subcategory->sub_category_name }}" required>
                                                                            @if ($errors->has('sub_category_name'))
                                                                                <small class="text-danger">{{ $errors->first('sub_category_name') }}</small>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="POST" action="{{ route('subcategories-table.destroy', $subcategory->subcategory_id) }}"
                                                        style="display:inline;" id="deleteForm-{{ $subcategory->subcategory_id }}">