@extends('layouts.admin')


@push('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('admin_content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tickets List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tickets</a></li>
                                <li class="breadcrumb-item active">Tickets List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Total Tickets</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="547">547</span>k</h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 17.32 % </span> vs. previous month</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                            <i class="ri-ticket-2-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Pending Tickets</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="124">124</span>k</h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 0.96 % </span> vs. previous month</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                            <i class="mdi mdi-timer-sand"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Closed Tickets</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="107">107</span>K</h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 3.87 % </span> vs. previous month</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                            <i class="ri-shopping-bag-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Deleted Tickets</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="15.95">15.95</span>%</h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 1.09 % </span> vs. previous month</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                            <i class="ri-delete-bin-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="ticketsList">
                        <div class="card-header border-0">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">Tickets</h5>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-wrap gap-2">
                                        <button class="btn btn-danger add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Create Tickets</button>
                                        {{-- <button class="btn btn-soft-danger" id="remove-actions" style="display: none;"><i class="ri-delete-bin-2-line"></i></button> --}}
                                        <button class="btn btn-soft-danger" id="bulk_delete"><i class="ri-delete-bin-2-line"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <form>
                                <div class="row g-3">
                                    <div class="col-xxl-5 col-sm-12">
                                        <div class="search-box">
                                            <input type="text" class="form-control search bg-light border-light" placeholder="Search for ticket details or something...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-xxl-3 col-sm-4">
                                        <input type="text" class="form-control bg-light border-light" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" id="demo-datepicker" placeholder="Select date range">
                                    </div>
                                    <!--end col-->

                                    <div class="col-xxl-3 col-sm-4">
                                        <div class="input-light">
                                            <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default" id="idStatus">
                                                <option value="">Status</option>
                                                <option value="all" selected="">All</option>
                                                <option value="Open">Open</option>
                                                <option value="Inprogress">Inprogress</option>
                                                <option value="Closed">Closed</option>
                                                <option value="New">New</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-1 col-sm-4">
                                        <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                            Filters
                                        </button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end card-body-->
                        <div class="card-body">
                            <div class="table-responsive table-card mb-4">
                                <table class="table align-middle table-nowrap mb-0 data_tbl table-striped table-hover product__category__table" id="productCategoryTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 40px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>
                                            <th class="sort desc" data-sort="id">SL</th>
                                            <th class="sort desc" data-sort="id">Code</th>
                                            <th class="sort" data-sort="">Category Name</th>
                                            <th class="sort" data-sort="">Category Slug</th>
                                            <th class="sort" data-sort="">Created At</th>
                                            <th class="sort" data-sort="">Updated At</th>
                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="ticket-list-data">

                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Tickets We did not find any Tickets for you search.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-soft-info">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" action="{{ route('product.category.store') }}" autocomplete="off" id="add_category_form" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="row g-3">

                                    <div class="col-lg-6">
                                        <div>
                                            <label for="tasksTitle-field" class="form-label">Code</label>
                                            <input type="text" id="tasksTitle-field" name="code" class="form-control" placeholder="Category Code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="tasksTitle-field" class="form-label">Name</label>
                                            <input type="text" required id="name" name="name" class="form-control" placeholder="Category Name">
                                            <span class="error error_name text-danger"></span>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-4">
                                        <div>
                                            <label for="tasksTitle-field" class="form-label">Title</label>
                                            <input type="text" id="tasksTitle-field" class="form-control" placeholder="Title" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="client_nameName-field" class="form-label">Client Name</label>
                                            <input type="text" id="client_nameName-field" class="form-control" placeholder="Client Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="assignedtoName-field" class="form-label">Assigned To</label>
                                            <input type="text" id="assignedtoName-field" class="form-control" placeholder="Assigned to" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="date-field" class="form-label">Create Date</label>
                                        <input type="text" id="date-field" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="Create Date" required="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="duedate-field" class="form-label">Due Date</label>
                                        <input type="text" id="duedate-field" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="Due Date" required="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="ticket-status" class="form-label">Status</label>
                                        <select class="form-control" data-plugin="choices" name="ticket-status" id="ticket-status">
                                            <option value="">Status</option>
                                            <option value="New">New</option>
                                            <option value="Inprogress">Inprogress</option>
                                            <option value="Closed">Closed</option>
                                            <option value="Open">Open</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="priority-field" class="form-label">Priority</label>
                                        <select class="form-control" data-plugin="choices" name="priority-field" id="priority-field">
                                            <option value="">Priority</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div> --}}
                                </div>

                            </div>
                            <div class="modal-footer" style="display: block;">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add Category</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

<div class="modal fade zoomIn" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg" id="edit-content">

    </div>
</div>

<form id="deleted_form" action="" method="post">
    @method('DELETE')
    @csrf
</form>

@endsection

@push('admin_js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // alert('hi');

        /**
         * Yajra DataTable for show all data
         *
         * */
        var service__category__table = $('.data_tbl').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.category.index') }}",
            columns: [
                {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'code', name: 'code'},
                {data: 'name', name: 'name'},
                {data: 'slug', name: 'slug'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });

        $(document).on('click', '#bulk_delete', function(e) {
            var ids = [];

            if(confirm("Are you sure you want to delete !"))
            {
                $('.category_checkbox:checked').each( function(e) {
                    ids.push($(this).val());
                });
                if(ids.length > 0)
                {
                    alert(ids);
                }
                else
                {
                    alert("Please Select atlest one category");
                }
            }
        });

        $(document).on('submit', '#add_category_form', function(e) {
            e.preventDefault();
            // $('.loading_button').show();
            var url = $(this).attr('action');
            $('.submit_button').prop('type', 'button');

            $.ajax({
                url: url,
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#add_category_form')[0].reset();

                    $('#showModal').modal('hide');

                    $('.submit_button').prop('type', 'submit');

                    $('.product__category__table').DataTable().ajax.reload();
                    toastr.success(data)

                },
                error: function(err) {
                    let error = err.responseJSON;

                    $.each(error.errors, function (key, error){

                        $('.submit_button').prop('type', 'submit');
                        $('.error_' + key + '').html(error[0]);
                    });
                }
            });
        });

        $(document).on('click', '#delete_btn', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            $('#deleted_form').attr('action', url);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleted_form').submit();
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'You have cancelled to Delete It',
                    'error'
                    )
                }
            })
        })

        $(document).on('submit', '#deleted_form', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.error(data)
                    $('.product__category__table').DataTable().ajax.reload();
                },
                error: function(err) {
                    toastr.error(err.responseJSON)
                    $('.product__category__table').DataTable().ajax.reload();
                }
            });
        });


        $(document).on('click', '#edit_btn', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {

                    $('#edit-content').empty();
                    $('#edit-content').html(data);
                    $('#editModal').modal('show');
                },
                error: function(err) {
                    $('.data_preloader').hide();
                    if (err.status == 0) {
                        toastr.error('Net Connetion Error. Reload This Page.');
                    } else if (err.status == 500) {
                        toastr.error('Server Error, Please contact to the support team.');
                    }
                }
            });
        });

    });
</script>

@endpush
{{--
// $.ajax({
    //     url:"{{ route('product.category.destroyall') }}",
    //     type: 'post',
    //     data:{ids:1},
    //     contentType: false,
    //     cache: false,
    //     processData: false,
    //     success: function(data) {
    //         console.log(data);
    //         // $('#add_category_form')[0].reset();

    //         // $('#showModal').modal('hide');

    //         // $('.submit_button').prop('type', 'submit');

    //         // $('.product__category__table').DataTable().ajax.reload();
    //         // toastr.success(data)

    //     },
    //     error: function(err) {
    //         let error = err.responseJSON;

    //         $.each(error.errors, function (key, error){

    //             $('.submit_button').prop('type', 'submit');
    //             $('.error_' + key + '').html(error[0]);
    //         });
    //     }
    // }); --}}
