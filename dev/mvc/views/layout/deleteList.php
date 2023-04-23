<section class="w-100 z-3 fixed-bottom modals  section__deleteList">   
    <form method="POST" class="bg-white h-100 d-flex flex-column justify-content-evenly align-items-center container-xxl p-3 d-flex mb-5 flex-column border shadow rounded-3">
        <div class="w-75">
            <p class="fw-semibold fs-5 text-center">¿Quiere eliminar definitivamente la lista?<p>
        </div>
        <input id="deleteList" type="hidden" name="id_list" value="">
        <div class="d-flex justify-content-evenly w-100">
            <!-- a cada boton le añádimos un name para el envio por POST -->
            <button class="btn bg-secondary text-white fs-5 d-flex justify-content-center align-items-center p-2 border rounded-4 fw-semibold btnSave" type="submit" name="acceptDel">
                Aceptar
            </button>
            <button class="btn bg-primary text-white fs-5 d-flex justify-content-center align-items-center p-2 border rounded-4 fw-semibold btnSave" type="submit" name="cancelDel">
                Cancelar
            </button>
        </div>
        <i class="fs-4 la-1x las la-times icon__deleteList--close"></i>
    </form>
</section> 