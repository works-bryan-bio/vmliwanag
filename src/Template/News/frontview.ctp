<section class="content container">
	<div class="row">
	<div class="col-sm-12">
		<h1><?= $news->title ?></h1>
		<small><i class="fa fa-calendar"></i> Date Posted : <?php echo $news->created->format("Y-m-d"); ?> / <i class="fa fa-user"></i> Posted By : <?php echo $news->posted_by; ?></small>
		<br/><br/><div class="addthis_inline_share_toolbox"></div>
		<br/><br/>	
		<?php if( $news->thumb != '' ){ ?>
			<img class="img-responsive" src="<?php echo $news->thumb; ?>" style="margin:20px 0px;">
		<?php } ?>		
		<?= $news->body ?>
		<br/><br />
		<a class="btn btn-success marginBottom10" href="<?php echo $this->Url->build('/news/listing'); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Back</a> 
	</div>
	</div>
</section>