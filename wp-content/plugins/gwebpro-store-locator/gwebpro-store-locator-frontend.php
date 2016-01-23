<?php
	$lat = $store->get_queryvar('lat'); 
	$long = $store->get_queryvar('long');
	$dest = $store->get_queryvar('dest');
	$latlong=$store->getCurrentLatLng();
?>
<script language="javascript">
	var map,pin_lat,pin_long,lat,long,latlong=new Array();
	var markers = [];
	var currentLat = '<?php echo $latlong[0]?>';
	var currentLong = '<?php echo $latlong[1]?>';
	var geocoder = new google.maps.Geocoder();
	var bounds = new google.maps.LatLngBounds();
	
	lat='<?php if(isset($lat) && $lat!="") echo $lat;?>';
	long='<?php if(isset($long) && $long!="") echo $long;?>';
	if(!lat) lat=currentLat;
	//if(!lat) lat="-23.55052";
	if(!long) long=currentLong;
	//if(!long) long="-46.63331";
	var $j = jQuery.noConflict();
	$j(document).ready(function($){
		initialize(lat,long);
		<?php if($dest==""){?>
		geocodePosition(lat,long);		
		<?php }else{?>
		$('#searchTextField').val('<?php echo $dest?>');
		$('.locationname').html('<?php echo $dest?>');
		<?php }?>
	});
	google.maps.event.addDomListener(window, 'load', initiate);
	
	function initiate() 
	{
	  var input = document.getElementById('searchTextField');
	  autocomplete = new google.maps.places.Autocomplete(input);
	}
	
	function initialize(lat,long) 
	{
		var latlng = new google.maps.LatLng(lat,long);
		var myOptions = {
			zoom: 4,
			center: latlng,
			panControl: true,
			zoomControl: true,
			scaleControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		var marker1 = new google.maps.Marker({
			map: map,
			title: 'Meu Local',
			draggable:true,	
			icon: '<?php echo plugins_url( 'images/me_map.png' , __FILE__ ); ?>',
			position: latlng,
			animation: google.maps.Animation.DROP
		});
		setTimeout(function(){ placeStores(latlong); }, 1800);
		
		google.maps.event.addListener(marker1, 'dragend', function() {
			var point = marker1.getPosition();
			console.log(point);
			map.panTo(point);
			pin_lat=point.lat();
			pin_long=point.lng();
			document.location=formatUrl('lat='+pin_lat+'&long='+pin_long); 
		});
		google.maps.event.addListener(marker1, 'click', function() {
		  var e=this;
		  e.setAnimation(google.maps.Animation.BOUNCE);
		  setTimeout(function(){ e.setAnimation(null); }, 700);
		});
	}
	
	function placeStores(stores)
	{
		for (i = 0; i < stores.length; i++) {
			var position = new google.maps.LatLng(stores[i][0], stores[i][1]);
			bounds.extend(position);
			var markerOptions = {
				position: position,
				map: map,
				animation: google.maps.Animation.DROP
			}
			marker = new google.maps.Marker(markerOptions);
			markers.push(marker);
			map.fitBounds(bounds);
    		map.panToBounds(bounds);
    		map.setZoom(4);
			google.maps.event.addListener(marker, 'click', (function (marker, i) {
				return function () {
					var e=this;
				   e.setAnimation(google.maps.Animation.BOUNCE);
				   setTimeout(function(){ e.setAnimation(null); }, 700);
					var infoboxOptions =  {
					 content: '<img src="<?php echo plugins_url( 'images/top_arrow.png' , __FILE__ ); ?>" class="top_arrow"><div>'+stores[i][3]+'</div>',
					 closeBoxURL: '<?php echo plugins_url( 'images/close_button.png' , __FILE__ ); ?>',
					 pixelOffset: new google.maps.Size(-160, 20)
					};
					markers[i].infobox = new InfoBox(infoboxOptions);
					for (var j = 0; j < markers.length; j++) {
						if(typeof  markers[j].infobox!='undefined')
							markers[j].infobox.close();
					}
					markers[i].infobox.open(map, this);
				}
			})(marker, i));
		}
	}
	
	function launchInfoWindow(x) {
		markers[x].setAnimation(google.maps.Animation.BOUNCE);
		setTimeout(function(){ markers[x].setAnimation(null); }, 700);
		google.maps.event.trigger(markers[x], "click");
		$j('html,body').animate({scrollTop: $j("#map_canvas").offset().top-150},'slow');
	}

	
	function addressurls(address) {
		address = address.replace(/[`~!@#$%^&*()_|+\-=?;:'".<>\{\}\[\]\\\/]/gi, '');
		geocoder.geocode({'address': address}, function postcodesearch(results, status) 
		{   
		  console.log(status);
		  if (status == google.maps.GeocoderStatus.OK) 
		  {
			var lat = results[0].geometry.location.lat();
			var lng = results[0].geometry.location.lng();
			//ocument.location=formatUrl('dest='+encode(address)+'&lat='+lat+'&long='+lng);
			document.location=formatUrl('dest='+address+'&lat='+lat+'&long='+lng);
		  }
		  else {
			alert("Entered address not found.");
		  }
		});
	}
	
	function formatUrl(url)
	{
		var currUrl='<?php echo get_permalink()?>';
		if(currUrl.indexOf("?")==-1)
			return currUrl+'?'+url;
		else
			return currUrl+'&'+url;
	}
	
	function geocodePosition(lat,long) {
	  var latlng = new google.maps.LatLng(lat,long);
	  geocoder.geocode({
		latLng: latlng
	  }, function(responses) {
		if (responses && responses.length > 0) {
			var arrAddress=responses[0].address_components;
			var itemLocality="",address="",country="",place="";
			$j.each(arrAddress, function (i, address_component) {
				
				if (address_component.types[0] == "route" && (typeof  address_component.long_name!='undefined')){
					place = address_component.long_name+', ';
				}
				 if (address_component.types[0] == "locality" && (typeof  address_component.long_name!='undefined')){
					itemLocality = address_component.long_name+', ';
				}
				if (address_component.types[0] == "administrative_area_level_1" && (typeof  address_component.long_name!='undefined')){
					address = address_component.short_name+', ';
				}
				if (address_component.types[0] == "country" && (typeof  address_component.long_name!='undefined')){
					country = address_component.long_name;
				}
				
			});
			var str=place+itemLocality+address+country;
			$j('#searchTextField').val(responses[0].formatted_address);
			$j('.locationname').html(responses[0].formatted_address);
		} 
	  });
	}
	function direction(addr)
	{
		<?php if($dest){?>
			window.open('https://maps.google.ca/maps?saddr='+encode('<?php echo $dest?>')+'&daddr='+encode(addr),'_newtab');
		<?php }else{?>
			window.open('https://maps.google.ca/maps?saddr='+encode($j('#searchTextField').val())+'&daddr='+encode(addr),'_newtab');
		<?php }?>
	}
	function encode(str) {
		var result = "";
		for (i = 0; i < str.length; i++) {
			if (str.charAt(i) ==" ") result += "+";
			else result += str.charAt(i);
		}
		return escape(result);
	}
	window.onload = loadScript;
	function loadScript() {
        jQuery('html, body').animate({scrollTop: jQuery('.home_map').offset().top-50}, 2100);
    }
    
    
    
</script>

<div class="inner_wrap">
    <div class="inner_contarea">
        <div>
            <div class="inner_lsb">
                <div class="locationsearch_home">
                    <div class="location">
                    <?php /*
                        <div class="popupbox">
                            <div class="contbox">                        
		                        <?php
									$con = mysql_connect( 'mysql.v8brasil.com.br', 'v8brasil04', '0224d08' );
									mysql_select_db( 'v8brasil04', $con );
								?>
								<div id="estados">
									<label for="cod_estados">Estado:</label>
									<select name="cod_estados" id="cod_estados">
										<option value="">-- Escolha um estado --</option>
										<?php
											$sql = "SELECT cod_estados, sigla
													FROM estados
													ORDER BY sigla";
											$res = mysql_query( $sql );
											while ( $row = mysql_fetch_assoc( $res ) ) {
												echo '<option value="'.$row['cod_estados'].'">'.$row['sigla'].'</option>';
											}
										?>
									</option></select>
								</div>
								<div id="cidades">
									<label for="cod_cidades">Cidade:</label>
									<!--<span class="carregando">Aguarde, carregando...</span>-->
									<select name="cod_cidades" id="cod_cidades">
										<option value="">-- Escolha um estado --</option>
									</select>
								</div>
						        <div class="clear"></div>
                            </div>
                        </div> */?>
                        <div class="clear"></div>                
                        
    
<script src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load('jquery', '1.6.1');
</script>

<script type="text/javascript">
	$(function(){
		$('#cod_estados').change(function(){
			if( $(this).val() ) {
				$('#cod_cidades').hide();
				$('.carregando').show();
				
				$.getJSON('<?php echo plugins_url( 'cidades.ajax.php' , __FILE__ );?>?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
					var options = '<option value=""></option>';	
					for (var i = 0; i < j.length; i++) {
						options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
					}	
					$('#cod_cidades').html(options).show();
					$('.carregando').hide();
				});
			} else {
				$('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
			}
		});
	});
</script>


                        
                        <div class="popupbox">
                            <div class="contbox">
                                <p>Digite seu endereço ou cidade, clique em <span style="color:#5199dd">OK</span> e abaixo serão listadas as assistências técnicas mais próximas de você:</p>
                                <input id="searchTextField" type="text" />
                                <fieldset>
                                    <input type="button" onclick="addressurls($j('#searchTextField').val());" value="OK" />
                                </fieldset>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!--<div class="search">
                        <div class="field"><input id="search" type="text" placeholder="Pesquisar por palavra-chave" value="<?php echo $_GET['q']?>" /></div>
                        <div class="srch_btn"><a href="javascript:;" onclick="if($j('#search').val()!='') document.location=formatUrl('dest=<?php echo $dest?>&lat=<?php echo $lat?>&long=<?php echo $long?>&q='+$j('#search').val());">PESQUISAR</a></div>
                        <div class="clear"></div>
                    </div>-->
                    <div class="clear"></div>
                </div>
                <!--<div class="home_map"><div id="map_canvas" <?php if(get_option('map_width')!="" && get_option('map_height')!=""){?>style="width:<?php echo get_option('map_width')?>px;height:<?php echo get_option('map_height')?>px;"<?php }?>></div></div>-->
                
                <div>
                    <h2>Assistências Técnicas próximas de você</h2>
                    <div>
                        <div class="homelilst_wrap">
                            <div id="paging_container">
                                <div class="page_navigation" id="nav_clone"></div>
                                <div class="clear"></div>
                                <?php echo $store->storeLists();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
