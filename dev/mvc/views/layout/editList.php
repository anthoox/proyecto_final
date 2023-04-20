<section class="w-100 z-3 fixed-bottom modals  section__editList">   
    <form method="POST" class="bg-white h-100 d-flex flex-column justify-content-evenly align-items-center container-xxl p-3 d-flex mb-5 flex-column border shadow rounded-3">
        <div class="w-75 mb-3">
            <label for="newNameList" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Renombrar lista</label>
            <input type="text" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="newNameList" placeholder="nombre lista" name="newNameList">
        </div>
        <!-- input para enviar el id_list -->
        <input id="editNameInput" type="hidden" name="id_list" value="">
        <button id="btn-rename-list" class="btn bg-secondary text-white fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 fw-semibold btnSave" type="submit">
            Guardar
        </button>
        <i class="fs-4 la-1x las la-times icon__editList--close"></i>
    </form>
</section> 
