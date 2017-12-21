<?php use Cake\Utility\Inflector; ?>
<?php use Cake\Utility\Text; ?>
<br class="clear">
<hr />
<br/>
<div class="content container">
<?php if( $news->count() > 0 ){ ?>
	<?php foreach($news as $n){ ?>
	<?php $news_slug = Inflector::slug($n->title, "-"); ?>		
			<div class="row">
		        <div class="col-sm-4 left"><a href="<?php echo $this->Url->build('/news/' . $n->id . '/' . $news_slug); ?>"><img src="<?php echo $n->thumb; ?>" class="img-responsive"></a></div>
		        <div class="col-sm-8 left">
		          <h3 class="title"><a href="<?php echo $this->Url->build('/news/' . $n->id . '/' . $news_slug); ?>"><?php echo $n->title; ?></a></h3>
		          <small><span class="glyphicon glyphicon-user"></span> Posted By : <?php echo $n->posted_by; ?></small>		          
		          <p><?php echo $n->excerpt; ?></p>
		          <a class="btn btn-success pull-right marginBottom10" href="<?php echo $this->Url->build('/news/' . $n->id . '/' . $news_slug); ?>">Read More</a> 
		        </div>		      		      
		    </div>				
		    <hr>				
	<?php } ?>	
	<div class="clearfix"></div>
	<div class="paginator" style="text-align:center;">
        <ul class="pagination">
        <?= $this->Paginator->prev('«') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('»') ?>
        </ul>
        <p class="hidden"><?= $this->Paginator->counter() ?></p>
    </div>    
<?php }else{ ?>
	<h3>Coming soon</h3>
<?php } ?>
</div>
