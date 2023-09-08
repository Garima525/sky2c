<?php
/**
 * Template Name: Innerpages fullwidth Without Image
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
get_header();
$banner_class=get_post_meta( get_the_ID(), 'banner_class', true ); ?>
<div class="inner-page-banner <?php echo $banner_class; ?>" id="post-<?php the_ID(); ?>" >
	<div class="innerpage_title">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">
					<?php /* <h1 class="section_title"><?php the_title(); ?></h1> */ ?>
				</div>
			</div>
		<?php /*  <div class="breadcrumb"><p><?php get_breadcrumb(); ?></p></div> */ ?>
		</div>
	</div>
</div>
<div id="primary" class="content-area innerpages-content clr">
	<div id="content" class="site-content innerpages" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry clr">
					<div class="container">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">
								<h1 class="innerpages-content-title"><?php the_title(); ?></h1>
							</div>
						</div>				
						<div class="row ">
							<?php the_content(); ?>
						</div>
					</div>
				</div><!-- .entry-content -->
			</article><!-- #post -->
		<?php //comments_template(); ?>
	<?php endwhile; ?>
	</div><!-- #content -->
</div><!-- #primary -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript"> 
function roundit(which){
return Math.round(which*100)/100
} 
/*function calc(Numbers,length,width, height,grossweight,cubicfeet,cubicweight,formname){
var temp;
var temp_length = eval("document."+formname+"."+length);
var temp_height = eval("document."+formname+"."+height);
var temp_width=eval("document."+formname+"."+width);
var temp_cubicweight=eval("document."+formname+"."+cubicweight);
var temp_cubicfeet=eval("document."+formname+"."+cubicfeet);
var temp_num=eval("document."+formname+"."+Numbers);
var theone;
for (i=0;i<document.quote.QuoteFor.length;i++){
if (document.quote.QuoteFor[i].checked==true)
theone=i
} 
if (document.quote.QuoteFor[theone].value == "International")
	temp_cubicweight.value = roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/166);
else
	temp_cubicweight.value = roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/194);
temp_cubicfeet.value =  roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/1728);
document.quote.TotalNumbers.value = roundit(document.quote.Numbers1.value) + roundit(document.quote.Numbers2.value) + roundit(document.quote.Numbers3.value);
document.quote.TotalGrossWeight.value = roundit(document.quote.GrossWeight1.value) + roundit(document.quote.GrossWeight2.value) + roundit(document.quote.GrossWeight3.value);
document.quote.TotalCubicFeet.value = roundit(document.quote.CubicFeet1.value) + roundit(document.quote.CubicFeet2.value) + roundit(document.quote.CubicFeet3.value);
document.quote.TotalCubicWeight.value = roundit(document.quote.CubicWeight1.value) + roundit(document.quote.CubicWeight2.value) + roundit(document.quote.CubicWeight3.value);
}*/
function calc(Numbers,length,width, height,grossweight,cubicfeet,cubicweight,formname){ 
	var temp;
	var idno = Numbers; 
	//var forlen = Numbers[Numbers.length -1];
	var forlen = jQuery("#packingprovider").find("tr").length - 1; 
	var temp_num = jQuery("#"+Numbers).val(); 
	var temp_length = jQuery("#"+length).val(); 
	var temp_height = jQuery("#"+height).val();
	var temp_width = jQuery("#"+width).val();
	var temp_cubicweight = jQuery("#"+cubicweight).val();
	var temp_cubicfeet = jQuery("#"+cubicfeet).val(); 
	
	var theone;
	for (i=0;i<3;i++){
		if (document.quote.QuoteFor[i].checked==true)
			theone=i;		
	}	
		if (document.quote.QuoteFor[theone].value == "International") {
			temp_cubicweight.value = roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/166);
		} else {
			temp_cubicweight.value = roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/194);
			temp_cubicfeet.value =  roundit((temp_num.value) * (temp_length.value) * (temp_height.value) * (temp_width.value)/1728);
		}
		var totalnos = 0;
		var totalgrswgt = 0;
		var totalcbft = 0;
		var totalcbwt = 0;
		
		var temp_cubicweightind = roundit((temp_num) * (temp_length) * (temp_height) * (temp_width)/194);
		jQuery("#"+cubicweight).val(temp_cubicweightind);
		
		var temp_cubicfeetind =  roundit((temp_num) * (temp_length) * (temp_height) * (temp_width)/1728);
		jQuery("#"+cubicfeet).val(temp_cubicfeetind);
		
		for (j=1;j<=forlen;j++){
				
			var chk = jQuery("#Numbers"+j).val();
			var grwgt = jQuery("#GrossWeight"+j).val(); 
			var cbft = jQuery("#CubicFeet"+j).val();
			var cbwt = jQuery("#CubicWeight"+j).val();
			 
			totalnos += roundit(chk);
			totalgrswgt += roundit(grwgt);
			totalcbft += roundit(cbft);
			totalcbwt += roundit(cbwt);
		}
		//alert(totalnos);
		document.getElementById("TotalNumbers").value = totalnos;
		document.getElementById("TotalGrossWeight").value = totalgrswgt;
		document.getElementById("TotalCubicFeet").value = totalcbft.toFixed(2);
		document.getElementById("TotalCubicWeight").value = totalcbwt.toFixed(2);
		//document.getElementById("TotalNumbers").value = roundit(document.quote.TotalNumbers.value);
		//document.quote.TotalNumbers.value = roundit(document.quote.TotalNumbers.value);
		/*document.quote.TotalGrossWeight.value = roundit(document.quote.GrossWeight1.value) + roundit(document.quote.GrossWeight2.value) + roundit(document.quote.GrossWeight3.value);
		document.quote.TotalCubicFeet.value = roundit(document.quote.CubicFeet1.value) + roundit(document.quote.CubicFeet2.value) + roundit(document.quote.CubicFeet3.value);
		document.quote.TotalCubicWeight.value = roundit(document.quote.CubicWeight1.value) + roundit(document.quote.CubicWeight2.value) + roundit(document.quote.CubicWeight3.value);*/
		
		
}

function checktotal(){
	
	//jQuery("#packingprovider").find("tr")
//var tid = jQuery("#packingprovider").find("tr").length - 1;
//alert(tid);
}



</script>
<?php /*<script src="<?php echo site_url(); ?>/js/validation.js?ver=37"></script>*/ ?>
<?php get_footer(); ?>