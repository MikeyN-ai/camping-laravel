<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="bg-danger text-white text-center py-4">
                <h4 class="fw-bold mb-0">No se puede eliminar</h4>
            </div>

            <div class="modal-body text-center px-4 pt-4 pb-2">
                <p class="fs-5 mb-3">No se puede eliminar porque tiene elementos relacionados</p>

                <div class="alert alert-danger border-0 rounded-3 mb-0">
                    {{ $message ?? 'Existen registros asociados a este elemento.' }}
                </div>
            </div>

            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-danger px-4 btn-3d" data-bs-dismiss="modal">
                    Entendido
                </button>
            </div>
        </div>
    </div>
</div>


@if($show || $message)
<script>

document.addEventListener('DOMContentLoaded', function () {

    let modalEl =
        document.getElementById('{{ $id }}');

    if(modalEl){

        let modal =
            new bootstrap.Modal(modalEl);

        modal.show();
    }

});

</script>
@endif
