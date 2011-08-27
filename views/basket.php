<?php
echo '<h3>Sepetiniz</h3>';
if(count($o) > 0) {
	echo '<ul style="list-style-type:none;">';
	foreach($o as $i) {
		echo '
			<li style="border:1px solid #f2f2f2;margin-top:5px;">
			<b>'.$i->name.'</b>
			<ul style="margin-left:25px;">
				<li>Tanım : '.$i->description.'</li>
				<li>Fiyatı: '.$i->price.'</li>
			</ul>
		</li>';
	}
	echo '</ul>';
}
else {
	echo '<ul><li>Sepetiniz boş</li></ul>';
}
?>
