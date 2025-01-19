$(document).on('click', '.edit_account_btn', function () {
    // alert($(this).val());
    var account_id = $(this).val();
    $('#edit-account-modal').modal('show');

    $.ajax({
        type: "GET",
        url: "/get-account-details-ajax/" + account_id,
        success: function (response) {
            if (response.status == 200) {
                $('#account_name_edit').val(response.accounts.account_name);
                $('#code_edit').val(response.accounts.code);
                $('#parent_account_edit').val(response.accounts.parent_account);

                if (response.accounts.type == '0') {
                    $('#primary_account_edit').prop('checked', true);
                    $('#sub_account_edit').prop('checked', false);
                } else {
                    $('#primary_account_edit').prop('checked', false);
                    $('#sub_account_edit').prop('checked', true);
                }

                $('#notes_edit').val(response.accounts.notes);

                var url = "{{ route('accounts.update', ':id') }}";
                url = url.replace(':id', account_id);
                $('#edit_form').prop('action', url);
            }
        }
    });
});

$(document).on('click', '.account_details_btn', function () {
    var account_id = $(this).val();
    $('#details-account-modal').modal('show');

    $.ajax({
        type: "GET",
        url: "/get-account-details-ajax/" + account_id,
        success: function (response) {
            if (response.status == 200) {
                $('#account_name_details').val(response.accounts.account_name);
                $('#code_details').val(response.accounts.code);
                $('#parent_account_details').val(response.accounts.parent_account);

                if (response.accounts.type == '0') {
                    $('#primary_account_details').prop('checked', true);
                    $('#sub_account_details').prop('checked', false);
                } else {
                    $('#primary_account_details').prop('checked', false);
                    $('#sub_account_details').prop('checked', true);
                }
                $('#notes_details').val(response.accounts.notes);
                var url = "{{ route('accounts.destroy', ':id') }}";
                url = url.replace(':id', account_id);
                $('#details_form').prop('action', url);
            }
        }
    });
});
$('.create-account-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var account_id = button.data('whatever'); // Extract info from data-* attributes
    var code = button.data('whatever'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

    $('#parent_account_id').val(account_id);
    generateChildCode(parseInt(account_id));
    var modal = $(this)
})

function generateChildCode(parent_id) {
    // Get the last child code from the database
    $.ajax({
        type: 'GET',
        url: '/getlastchildcode/' + parent_id,
        success: function (lastChildCode) {
            // Increment the last child code to get the new child code
            $('#create_code').val(lastChildCode);
            //    alert(lastChildCode);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function test(elem) {
    var id = $(elem).data('id');
    console.log("JS::{{ route('getaccountvouchers', ':id') }}".replace(':id', id));
    $.ajax({
        url: "{{ route('getaccountvouchers', ':id') }}".replace(':id', id),
        method: 'GET',
        success: function (data) {
            let content = '';
            data['vouchers'].forEach(function (items) {
                var details_url = "{{ route('vouchers.show', ':id') }}";
                details_url = details_url.replace(':id', items.voucher_id);
                content += `<tr>
                    <td>${items.voucher_number}</td>
                    <td>${items.fullname}</td>
                    <td>${items.created_at}</td>
                    <td> <div class="dropdown">
                                                        <a class="font-size-16 text-muted" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true">
                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="${details_url}">عرض تفاصيل السند</a>

                                                        </div>
                                                    </div></td>
                </tr>`;
            });
            $('#dynamicContent').html(content);
            $('#table_account_name').html(data['account_name'])

        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}
$(document).on('click', '.data-link', function () {

});
function checkIfExistItem(e) {
  var t = $("#purchaseTable > tbody > tr").length;
  if (t == 0) {
      alert("يجب أن توجد مادة واحد على الأقل.");
      return false;
  }
}