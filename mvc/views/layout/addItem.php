<section class="w-100 z-3 fixed-bottom modals section__addItem">   
    <form method="POST" class="h-100 bg-white d-flex flex-column justify-content-evenly align-items-center container-xxl p-3 d-flex mb-5 flex-column border shadow rounded-4">
        <h3 class="text-center">Añadir a la lista</h3>
        <div class="w-75 mb-3">
            <label for="nameItem" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
            <input type="text" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="nameItem" placeholder="nombre" name="nameItem" required>
        </div>
        <button class="btn bg-secondary text-white fs-5 d-flex justify-content-center align-items-center p-1 border rounded-4 fw-semibold btnSave" type="submit">
            Guardar
        </button>
        <i class="fs-4 la-1x las la-times icon__addList--close"></i>
    </form>
</section> 
