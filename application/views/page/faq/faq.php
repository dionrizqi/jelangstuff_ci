<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="aboutus konten1">
        <div class="container">
            <div class="col-md-12">
                <h1 class="">GENERAL QUESTION</h1>
                <?php foreach($faq as $row){ ?>
                <div id="accordion">
                    <div class="accordion accordion-group" id="construction-accordion">
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingOne">
                                <h2 class="mb-0">
                                    <button href="#collapseOne<?=$row->id?>" class="btn btn-block text-left" type="button" data-toggle="collapse" aria-controls="collapseOne">
                                        <?=$row->judul?> </button>
                                </h2>
                            </div>
                            <div id="collapseOne<?=$row->id?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p><?=$row->isi?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php } ?>
                

            </div>
        </div>
    </div>
</section>

<?php $this->load->view('include/foot'); ?>