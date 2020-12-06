?php
/*
Plugin Name: Custom fee Checkout	
Plugin URI: https://www.awazieikechi.com/web-developer-consultation/
Description:To Add Custom Fee checkout to Woocommerce cart
Version: 1.0
Author: Ikechi Awazie
Author URI: https://www.awazieikechi.com/web-developer-consultation/
License:: GPL2
*/


 add_action( 'woocommerce_cart_calculate_fees', 'ibile_add_checkout_fee' );
  
function ibile_add_checkout_fee($cart) {
    
    
// Now you have access to (see above)...
 
$total = $cart->subtotal;

if ($total<=2500){
    
    $feecharges = $total * 0.022;
}


elseif(($total+100)* 0.022>=2000){
    
    $feecharges = 2000;
}

elseif(WC()->customer->get_shipping_country()!="NG"){
    
    $feecharges = ($total+100)* 0.05;
}

else{
    
    $feecharges = ($total+100)* 0.022 ; //($total+100)/0.985
}
    
    
   // Edit "Fee" and "5" below to control Label and Amount
   WC()->cart->add_fee( 'Processing Fee', $feecharges );
}


 		
?>
