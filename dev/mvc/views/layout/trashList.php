<section class="bg-white section__trashList">   
    <form method="POST" class="d-flex flex-column justify-content-evenly align-items-center container-xxl p-3 d-flex mb-5 flex-column border shadow rounded-3">
        <div class="">
            <p class="fw-semibold fs-5 text-center">¿Quiere enviar la lista a la papelera?<p>
        </div>
        <input id="trashList" type="hidden" name="id_list" value="">
        <div class="d-flex justify-content-evenly w-100">
            <!-- a cada boton le añádimos un name para el envio por POST -->
            <button class="btn bg-secondary text-white fs-6 d-flex justify-content-center align-items-center p-2 border rounded-4 fw-semibold btnSave" type="submit" name="accept">
                Aceptar
            </button>
            <button class="btn bg-primary text-white fs-6 d-flex justify-content-center align-items-center p-2 border rounded-4 fw-semibold btnSave" type="submit" name="cancel">
                Cancelar
            </button>
        </div>
        
        <i class="fs-4 la-1x las la-times icon__trashList--close"></i>
    </form>
</section> 