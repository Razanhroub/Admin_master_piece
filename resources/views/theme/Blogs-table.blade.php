@extends('theme.master')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blogs</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blogs Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Recipe</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $index => $blog)
                                            <tr style="font-size: 14px;">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $blog->user->name }} {{$blog->user->last_name  }}</td>
                                                <td>{{ $blog->recipe->recipe_name }}</td>
                                                <td>
                                                    @if ($blog->is_deleted)
                                                        <span class="badge badge-danger px-3 py-1">Deleted</span>
                                                    @else
                                                        <span class="badge badge-success px-3 py-1">Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Delete Action -->
                                                    <form method="POST" action="{{ route('blogs-table.destroy', $blog->blog_id) }}" style="display:inline;" id="deleteForm-{{ $blog->blog_id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-link p-0 px-2" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirmDelete({{ $blog->blog_id }})">
                                                            <i style="display: flex; justify-content :center" class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr style="font-size: 14px;">
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Recipe</th>
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
    </div>

    <script>
        function confirmDelete(blogId) {
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
                        text: "Blog has been deleted successfully.",
                        icon: "success",
                        confirmButtonColor: "#rgb(117,113,249)",
                    }).then(() => {
                        document.getElementById('deleteForm-' + blogId).submit();
                    });
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
