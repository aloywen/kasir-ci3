<div class="container">

    <!-- Outer Row -->
    <div class="row align-items-center justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">                                

                                <div class="">
                                    <div class="row d-flex justify-content-center align-items-center flex-column">
                                        <div class="col-10">
                                            <div class="sidebar-brand-icon">
                                            <h3 class="text-center">KLINIK DHARMA BAKTI</h3>
                                            </div><br/>
                                        </div>
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth/index'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan Username Anda ..." value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block text-lg">
                                        Login
                                    </button>
                                </form>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div> 