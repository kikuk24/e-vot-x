<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Start Card Style -->
<div class="rbt-course-card-area rbt-section-gap bg-color-white">
	<div class="container">
		<div class="row align-items-center mb--60">
			<div class="col-lg-12">
				<div class="section-title text-center">
					<img src="<?= base_url() ?>assets/images/logo-muhammadiyah.png" width="100" height="100" /><br>
					<p class="description has-medium-font-size mt--15"><?= $config->NM_CONFIG ?></p>
					<p class="description has-medium-font-size mt--11">Kode Kartu Suara : <?= $pemilih->ID_PEMILIH; ?></p>
					<p class="description has-medium-font-size mt--15">Jumlah Sisa Suara : <?= $config->JML_MAX_VOTE - $jml_pilihan ?></p>
					<?php if ($this->session->flashdata('sukses')) : ?>
						<small class="text-success"><?= $this->session->flashdata('sukses'); ?></small>
					<?php endif; ?>
					<?php if ($this->session->flashdata('gagal')) : ?>
						<small class="text-danger"><?= $this->session->flashdata('gagal'); ?></small>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- Start Card Area -->
		<?php $sisa_suara =  $config->JML_MAX_VOTE - $jml_pilihan;
		if ($sisa_suara != '0') :
		?>
			<div class="row g-5">
				<?php foreach ($calon as $row) { ?>
					<!-- Start Single Card  -->
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
						<div class="rbt-card variation-03 rbt-hover">
							<div class="rbt-card-img">
								<a class="thumbnail-link" href="<?= site_url('voting/vote_aisyiyah/pilih/' . $row->ID_CALON) ?>">
									<img src="<?= base_url() ?>file/foto/<?= $row->FOTO ?>" alt="<?= $row->NM_CALON ?>">
									<span class="rbt-btn btn-white icon-hover btn-md">
										<span class="btn-text">Pilih</span>
										<span class="btn-icon"><i class="feather-arrow-right"></i></span>
									</span>
								</a>
							</div>
							<div class="rbt-card-body">
								<h5 class="rbt-card-title"><a href="#"><?= $row->NM_CALON ?></a>
								</h5>
							</div>
							<div class="card-information">
								<div class="card-count"><?= $row->NBM ?></div>
							</div>
						</div>
					</div>
					<!-- End Single Card  -->
				<?php } ?>
			</div>
			<!-- End Card Area -->
		<?php endif; ?>
		<hr>

		<a class="rbt-btn btn-gradient rbt-switch-btn rbt-switch-y" href="<?= site_url('voting/vote_aisyiyah/selesai') ?>">
			<span data-text="Selesai Voting">Selesai</span>
		</a>
	</div>
</div>
<!-- End Card Style -->