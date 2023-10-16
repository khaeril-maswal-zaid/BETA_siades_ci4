<?php $this->extend('myth-auth/template') ?>
<?php $this->section('content'); ?>




<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h1 class="m-0">Desa Pakubalaho</h1>
    </a>
</nav>
<!-- Navbar End -->

<!-- Quote Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Free Quote</p>
            <h1 class="display-5 mb-5">Get A Free Quote</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-light rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="gname" placeholder="Gurdian Name">
                                <label for="gname">Your Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0" id="gmail" placeholder="Gurdian Email">
                                <label for="gmail">Your Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="cname" placeholder="Child Name">
                                <label for="cname">Your Mobile</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="cage" placeholder="Child Age">
                                <label for="cage">Service Type</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary py-3 px-4" type="submit">Submit Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quote End -->



<?php $this->endSection() ?>