<?php if($CmsPageData->pageurl=="house-rules" || $CmsPageData->pageurl=="benefits"){ ?>
	<section id="benefits-content">
		<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
	</section>
<?php }else{ ?>
	
	<section>
		<div class="container">
			<div class="row privacy-top"></div>
		
		<!-- Get in Touch starts-->
		<?php if($CmsPageData->pageurl=="safety"){ ?>
				<div id="<?php echo $CmsPageData->pageurl; ?>">
					<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
				<div>
		<?php }else if($CmsPageData->pageurl=="about-us"){ ?>
				
					<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
				
			
			 <?php }else{ ?>
				<div id="privacy">
	   
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<h3><?php echo isset($CmsPageData->pagename)?$CmsPageData->pagename:__("Content not added yet"); ?></h3>	
							<div class="outer-one box-marg">
								<p class="text-right"><span><?php echo __('Last Updated'); ?> <b><?php echo isset($CmsPageData->created)?date("F j, Y",strtotime($CmsPageData->created)):date("F j, Y"); ?></b>.</span></p>
							</div> 
							
							<div class="outer-one ">
							
							<?php echo isset($CmsPageData->pagecontent)?$CmsPageData->pagecontent:__("Content not added yet"); ?>
							</div>
						</div>
					</div>
				</div>	
		<?php } ?>
			</div>
		</div>
	</section>
		

<?php } ?>
<style>
#privacy h3 {
  padding: 15px 0 0 5px !important;
}

#privacy p {
  padding: 15px 5px 0  !important;
}
#safety h3 {
  margin-top: 15px !important;
}
#safety p {
  margin: 0 0 5px !important;
}
#safety ul.insurance {
  padding-top: 10px;
}
.lowercase{text-transform:lowercase}
ul.term_services li{line-height:20px !important;font-size:13px !important}
.page-footer{display:none;}
</style>
