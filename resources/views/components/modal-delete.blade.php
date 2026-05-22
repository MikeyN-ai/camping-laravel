<div class="modal fade" id="{{ $id }}" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white bg-danger">
                <h5 class="modal-title">Confirmar eliminación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>¿Seguro que quieres eliminar <span class="fw-semibold" id="nombreEliminar"></span>?</p>

                <div class="alert alert-danger py-2 mb-0">
                    <i class="bi bi-exclamation-triangle-fill pe-1"></i>
                    Esta acción no se puede deshacer
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary btn-3d" data-bs-dismiss="modal">Cancelar</button>
                <form id="formEliminar" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-3d">
                        <i class="bi bi-trash"></i>
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('{{ $id }}').addEventListener('show.bs.modal', function(e) {

        let boton = e.relatedTarget;

        let nombre = boton.getAttribute('data-nombre');

        let ruta = boton.getAttribute('data-ruta');

        document.getElementById('nombreEliminar').textContent = nombre;

        document.getElementById('formEliminar').action = ruta;
    });
</script>
