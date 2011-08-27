<?php
	echo '<h3>Ürün Listesi</h3>'
	if(count($o) > 0) {
		echo '<ul style="list-style-type:none;">';
		foreach($o as $i) {
			echo '
			<li style="border:1px solid #f2f2f2;margin-top:5px;">
				<ul>
					<li>Ürün adı: '.$i['name'].'</li>
					<li>Fiyatı: '.$i['price'].'</li>
					'.(
						!$i['inBasket'] ? '
						<li>
							<form>
								<input type="hidden" name="formName" value="addToBasket" />
								<input type="hidden" name="id" value="'.$i['id'].'" />
								<input type="submit" name="submitAddToBasket" value="Sepete Ekle" />
							</form>
						</li>':''					
					:).'
				</ul>
			</li>';
		}
		echo '</ul>';
	}
	else {
		echo '<ul><li>Ürün listesi yok</li></ul>';
	}	
?>
