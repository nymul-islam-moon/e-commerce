<div class="modal-content border-0">
    <div class="modal-header p-3 bg-soft-info">
        <h5 class="modal-title" id="exampleModalLabel">Add Product Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
    </div>
    <form class="tablelist-form" action="{{ route('product.category.update', $productCategory->id) }}" autocomplete="off" id="edit_category_form" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="row g-3">

                <div class="col-lg-6">
                    <div>
                        <label for="tasksTitle-field" class="form-label">Code</label>
                        <input type="text" id="tasksTitle-field" name="code" class="form-control" value="{{ $productCategory->code }}" placeholder="Category Code" disabled>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <label for="tasksTitle-field" class="form-label">Name</label>
                        <input type="text" required id="name" name="name" class="form-control" value="{{ $productCategory->name }}" placeholder="Category Name">
                        <span class="error error_e_name text-danger"></span>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer" style="display: block;">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="update-btn">Update Category</button>
                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
            </div>
        </div>
    </form>
</div>

<script>
    $(document).on('submit', '#edit_category_form', function(e) {
        e.preventDefault();

        $('.update_button').prop('type', 'button');

        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                toastr.success(data);
                $('#editModal').modal('hide');
                $('.update_button').prop('type', 'submit');
                $('.product__category__table').DataTable().ajax.reload();
            },
            error: function(err) {

                $('.error').html('');

                if (err.status == 0) {
                    toastr.error('Net Connetion Error. Reload This Page.');
                    return;
                } else if (err.status == 500) {
                    toastr.error('Server error. Please contact to the support team.');
                    return;
                }
                $.each(err.responseJSON.errors, function(key, error) {
                    $('.error_e_' + key + '').html(error[0]);
                });
            }
        });
    });
</script>
