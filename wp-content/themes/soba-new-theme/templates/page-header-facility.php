<?php
  $json_string = file_get_contents("http://api.wunderground.com/api/5800558b6c024b48/geolookup/conditions/q/CA/Malibu.json");
  $json_string2 = file_get_contents("https://www.worldtides.info/api?heights&lat=34.019454&lon=-118.491191&key=764b7f45-339e-4992-9a6d-53f961e0eaed");
  $parsed_json = json_decode($json_string);
  $parsed_json2 = json_decode($json_string2);
  $wind = $parsed_json->{'current_observation'}->{'wind_mph'};
  $tide = $parsed_json2->{'heights'}->{'height'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  $swind = floor($wind);
  $stemp_f = floor($temp_f);

?>

<div class="tour-top-section">
	<div class="wrap-me">
		<div class="weather">
			<div class="item">
				<div class="icon">
					<?= img('sun.png') ?>
				</div>
				<div class="data">
					<span>Temp</span>
					<p><?php echo "${stemp_f}"; ?></p>
				</div>
			</div>
			<div class="item">
				<div class="icon">
					<?= img('wind.png') ?>
				</div>
				<div class="data">
					<span>Wind</span>
					<p><?php echo "${swind}"; ?><span class="small">mph</span></p>
				</div>
			</div>
				<div class="item">
				<div class="icon">
					<?= img('tide.png') ?>
				</div>
				<div class="data">
					<span>Tide</span>
					<p>1</p>
				</div>
			</div>
		</div>

		<div class="inner">
			<h2>Your Recovery Is Our Recovery.</h2>
			<p>SobaLiving is a social model recovery community that is based on individuals coming together with common experiences of both suffering and recovering. We provide a safe environment where people are encouraged to help others as they help themselves foster change. These life learning experiences are the lifeblood of soba living. The heartbeat is the community meetings where one can express the life learning processes free from judgement and to be held accountable. Recovery is expressed and measured by community participation.</p>
		</div>
	</div>
</div>