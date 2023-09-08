<div class="jumbotron cover bg1 text-center">
	<div class="container">
		<h1 class="hidden-xs">Sky2C Freight Systems Inc.</h1>			
		<p class="hidden-xs">At Sky2C, we offer our clients a comprehensive suite of<br> <strong>shipping solutions and logistics</strong> services.</p>
		<p class="hidden-sm hidden-md hidden-lg hidden-rt visible-xs">International shipping, logistics and freight forwarding services</p>			
	</div>
</div>

<div class="container"> 
	<div class="row">
		
		<span class="hilighticon iconh-seamless"></span>
		
		<h1 class="subcover text-center">Delivering seamless experiences</h1>
		
		<div class="col-lg-2  col-lg-offset-5 text-center col-md-4  col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">				
			<span class="bluebar"></span>
		</div>
		
		<div class="col-lg-6  col-lg-offset-3 text-center col-md-8  col-md-offset-2 text-center col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
			<p>Sky2c track & trace system for your Sky2c delivery</p>
			<?php 
			echo $this->Form->create(@$order,['url'=> ['controller' => 'Tracks', 'action' => 'track-order'],
											 'id'    =>'orderTracking',
											 'enctype' =>'multipart/form-data',
											 'novalidate'=>'novalidate',
											 'autocomplete'=>'off'
				]); 
			?>
			
			<div class="form-group">
				<?php 
					echo $this->Form->input('descartes_id',[
					   'label' => false,
					   'type' => 'text',
					   'required' => true,
					   'placeholder' => 'Enter tracking number',
					   'class'=>'form-control']);
				
				$rederError = $this->Flash->render(); 
				if(!empty($rederError)){
					echo '<label id="descartes-id-error">'.$rederError.'</span>';
					echo '<script>$(function(){var focusElement = $("#descartes-id-error");ScrollToTop(focusElement, function() { focusElement.focus(); });});</script>';
				}
				?>	
			
			</div>
			
			<button type="button" class="reset btn btn-warning">Clear</button> 
			<button type="submit" class="btn btn-info">Track</button>
			<?php echo $this->form->end(); ?>
		</div>
		
	</div>
</div>
