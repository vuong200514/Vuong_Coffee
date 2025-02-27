<div class="program-modal modal fade" id="ProductDetailModal" tabindex="-1" role="dialog" aria-hidden="true"
  data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ '/'.'storage/icons/close-icon.svg' }}"
                  alt="Đóng Modal" />
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <h2 class="text-uppercase">
                            </h2>
                            <br>
                            <p class="orientasi text-center">
                            </p>
                            <img id="modal-image" width="70%" class="img-fluid d-block mx-auto" alt="" />
                            <div>
                                <h3>
                                    Mô tả sản phẩm
                                </h3>
                                <div class="content">
                                    <div>
                                        <p class="description">
                                        </p>
                                    </div>
                                    <div class="pembagi"></div>
                                    <div class="price">
                                    </div>
                                    <div class="stock">
                                    </div>
                                    <div class="discount">

                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-xl j mt-4" data-bs-dismiss="modal" type="button">Trở lại</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .program-modal .modal-content {
        background-color: #f5f0e3;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease-in-out;
    }

    .program-modal .close-modal img {
        width: 20px;
        height: 20px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .program-modal .close-modal img:hover {
        transform: rotate(90deg);
    }

    .program-modal .modal-body h2 {
        color: #5c4a2e;
        font-size: 2rem;
        margin-bottom: 20px;
        animation: slideInDown 0.5s ease-in-out;
    }

    .program-modal .modal-body p.orientasi {
        color: #997720;
        font-size: 1.2rem;
        animation: slideInLeft 0.5s ease-in-out;
    }

    .program-modal .modal-body img#modal-image {
        border-radius: 10px;
        margin-bottom: 20px;
        animation: zoomIn 0.5s ease-in-out;
    }

    .program-modal .modal-body .content h3 {
        color: #5c4a2e;
        font-size: 1.5rem;
        margin-bottom: 10px;
        animation: slideInRight 0.5s ease-in-out;
    }

    .program-modal .modal-body .content .description,
    .program-modal .modal-body .content .price,
    .program-modal .modal-body .content .stock,
    .program-modal .modal-body .content .discount {
        color: #3e2f1c;
        font-size: 1rem;
        margin-bottom: 10px;
        animation: fadeIn 0.5s ease-in-out;
    }

    .program-modal .modal-body .content .pembagi {
        border-top: 1px solid #e0d8c3;
        margin: 10px 0;
    }

    .program-modal .btn-primary {
        background-color: #997720;
        border-color: #997720;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .program-modal .btn-primary:hover {
        background-color: #5c4a2e;
        border-color: #5c4a2e;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideInDown {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes slideInLeft {
        from { transform: translateX(-20px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideInRight {
        from { transform: translateX(20px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes zoomIn {
        from { transform: scale(0.8); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
</style>
