<div class="modal fade bs-example-modal-{{$name}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning">@lang('settings.warning')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="bx bx-info-circle text-warning  display-1"></i>
                <p>@lang('settings.confirm_delete')</p>

                <div class="modal-footer d-flex justify-content-center mb-1">
                    <form action="{{ $destroy_route }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">@lang('settings.delete')</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('settings.cancel')</button>

                </div>
            </div>
        </div>
    </div>
</div>