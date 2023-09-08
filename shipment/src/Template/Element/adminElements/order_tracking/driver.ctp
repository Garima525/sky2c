<div class="timeline">
	<?php 
	//pr($trackingRecords); die;
	if(!empty($trackingRecords[0]['order_tracking'])){
	
	
		$j=1;
		//echo "<pre>"; print_r($trackingRecords[0]); die;
		foreach($trackingRecords[0]['order_tracking'] as $trackingDet){
			if($j%2==0){
				$class="even";	
			}else{
				$class="odd";
			}
			$columnStatus = '';
			
			if($trackingDet['status']==4 || in_array($trackingDet['status'],array("DL","Delivered","delivered"))){
				$columnStatus = 'track_process_completed';
			}else if($trackingDet['status']==3){
				$columnStatus = 'track_underprocess';
			}
			
	?>	
	<div class="timeline-item <?= $columnStatus; ?>">
		<div class="timeline-badge">
			<div class="timeline-icon">
				<i class="fa fa-truck"></i>
			</div>
		</div>
		<div class="timeline-body">
			<div class="timeline-body-arrow"> </div>
			<div class="timeline-body-head">
				<div class="timeline-body-head-caption">
					<span href="javascript:;" class="timeline-body-title font-blue-madison">
						<?php echo (!empty($trackingDet['tracking_description']))?$trackingDet['tracking_description']:""; ?>
					</span>
					<!--<span class="timeline-body-time font-grey-cascade">-->
				</div>
			</div>
			<?php if($trackingDet['third_party_status'] ==''){ ?>
				
				<div class="timeline-body-content">
					<span class="font-grey-cascade"></br>
					<?php if($authUser['role'] != 5){ ?>
					by <?php
						echo !empty($trackingDet['user']['name'])?ucwords($trackingDet['user']['name'])." (".$trackingDet['user']['phone'].")":"";
						?>
					<?php } ?>	
					</span>
					
					<span class="font-grey-cascade">
						on <?php
							if(!empty($trackingDet['third_party_status_date'])){
								echo $this->Common->dateConvert($trackingDet['third_party_status_date'], 'UTC', 'd/m/Y H:i:s', $timeZone, 'M jS, Y H:i:s');
								
							}
							/*echo !empty($trackingDet['third_party_status_date'])?(date('M jS, Y H:i:s', strtotime($trackingDet['third_party_status_date']))):"";*/
							?>
					</span>
					
					<span class="font-grey-cascade">
						<br><?php echo (!empty($trackingDet['location']))?$trackingDet['location']:""; ?> <?php /* echo (!empty($trackingDet['zip']))?$trackingDet['zip'].", ":""; ?><?php echo (!empty($trackingDet['state']))?$trackingDet['state'].", ":""; ?>  <?php echo (!empty($trackingDet['country']))?$trackingDet['country']:""; */ ?>
					</span>
				</div>
			
			<?php }else{ ?>
				
				<div class="timeline-body-content">
					<?php if($trackingDet['third_party_status']!="Started"){?>
					<span class="font-grey-cascade">
					Status(<b><?php
						echo !empty($trackingDet['third_party_status'])?ucwords($trackingDet['third_party_status']):"";
						?>) </b>
					</span>
					<?php } ?>
					<span class="font-grey-cascade">
					 <b><?php
						echo !empty($trackingDet['carrier'])?ucwords($trackingDet['carrier']):"";
						?></b>
					</span>
					
					<span class="font-grey-cascade">
						<b><?php
							if((!empty($trackingDet['third_party_status_date'])) && ($trackingDet['third_party_status_date']!= "1/1/70 12:00 AM")){

								echo "on ".$this->Common->dateConvert($trackingDet['third_party_status_date'], 'UTC', 'd/m/Y H:i:s', $timeZone, 'M jS, Y H:i:s');
								
							}						
							/*echo !empty($trackingDet['third_party_status_date'] && $trackingDet['third_party_status_date']!="1/1/70 12:00 AM" )? "on ".(date('M jS, Y H:i:s', strtotime($trackingDet['third_party_status_date']))):"";*/
							?></b>
					</span>
					
					<span class="font-grey-cascade">
						<br><b><?php echo (!empty($trackingDet['location']))?$trackingDet['location']:''; ?></b>
					</span>
				</div>
			
			<?php } ?>	
			
		</div>
	</div>
	
	<?php 
		$j++;
		}
	 }else{
	 ?>
	 <div class="timeline-item">
		<div class="timeline-badge">
			<div class="timeline-icon">
				<i class="fa fa-coffee"></i>
			</div>
		</div>	
		<div class="timeline-body">
			<div class="timeline-body-arrow"> </div>
			<div class="timeline-body-head">
				<div class="timeline-body-head-caption">
					<h3>Shipment not started yet.</h3>
				</div>
			</div>		
		</div>		
	</div>		
	 <?php		
	 }
	 ?>
</div>
