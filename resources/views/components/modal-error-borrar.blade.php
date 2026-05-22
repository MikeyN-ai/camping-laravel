<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="bg-danger text-white text-center py-4">
                <h4 class="fw-bold mb-0">No se puede eliminar porque tiene elementos relacionados</h4>
            </div>

            <div class="modal-body text-center px-4 pt-4 pb-0">


                @if (!empty($tablas))
                    <p class="text-start fw-bold">Revisa las siguientes tablas:</p>
                    <div class="alert alert-danger rounded-3 text-start">
                        <ul class="mb-0">
                            @foreach ($tablas as $t)
                                <li>{{ $t }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="alert alert-danger border-0 rounded-3">
                        Existen registros asociados a este elemento.
                    </div>
                @endif

            </div>

            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-danger px-4 btn-3d" data-bs-dismiss="modal">
                    Entendido
                </button>
            </div>

        </div>
    </div>
</div>

@if ($show || count($tablas ?? []) > 0)
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let modalEl = document.getElementById('{{ $id }}');

            if (modalEl) {
                let modal = new bootstrap.Modal(modalEl);
                modal.show();
            }

        });
    </script>
@endif
