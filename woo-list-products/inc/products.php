<?php 



// İts adding "Woolist Setting Page" on wp-admin
function woolist_menu_page() {
	add_menu_page(
	__( 'Woolist Setting Page', 'woo-list-products' ),
	__( 'Woolist Setting Page', 'woo-list-products' ),
	'manage_options',
	'woolist_setting_page',
	'woolist_setting_page',
	
	);
	}
	add_action('admin_menu', 'woolist_menu_page');


function woolist_setting_page() {


global $woocommerce, $post;

$order_id= 62303 ;  // You can get dynamics order id but now i am set my order id from database for just test
$order = new WC_Order($order_id);

$order = wc_get_order( $order_id );

// you can print what you want order->info. 
$order_id  = $order->get_id(); // Get the order ID
$parent_id = $order->get_parent_id(); // Get the parent order ID (for subscriptions…)
$user_id   = $order->get_user_id(); // Get the costumer ID
$user      = $order->get_user(); // Get the WP_User object
$order_status  = $order->get_status(); // Get the order status (see the conditional method has_status() below)
$currency      = $order->get_currency(); // Get the currency used  
$payment_method = $order->get_payment_method(); // Get the payment method ID
$payment_title = $order->get_payment_method_title(); // Get the payment method title
$date_created  = $order->get_date_created(); // Get date created (WC_DateTime object)
$date_modified = $order->get_date_modified(); // Get date modified (WC_DateTime object)
$billing_country = $order->get_billing_country(); 
$order->get_discount_tax();
//echo $order->get_status();
$order_data = $order->get_data(); 
$order_billing_first_name = $order_data['billing']['first_name'];
$order_shipping_first_name = $order_items['shipping']['first_name'];

//print_r($order); //you can print all order information
/*
echo '<br><br>';
echo '<h3>THE ORDER OBJECT (Using the object syntax notation):</h3>';
echo '$order->order_type: ' . $order->order_type . '<br>';
echo '$order->id: ' . $order->id . '<br>'; 
echo '<h4>THE ORDER OBJECT (again):</h4>';
echo '$order->order_date: ' . $order->order_date . '<br>';
echo '$order->modified_date: ' . $order->modified_date . '<br>';
echo '$order->customer_message: ' . $order->customer_message . '<br>';
echo '$order->customer_note: ' . $order->customer_note . '<br>';
echo '$order->post_status: ' . $order->post_status . '<br>';
echo '$order->prices_include_tax: ' . $order->prices_include_tax . '<br>';
echo '$order->tax_display_cart: ' . $order->tax_display_cart . '<br>';
echo '$order->display_totals_ex_tax: ' . $order->display_totals_ex_tax . '<br>';
echo '$order->display_cart_ex_tax: ' . $order->display_cart_ex_tax . '<br>';
echo '$order->formatted_billing_address->protected: ' . $order->formatted_billing_address->protected . '<br>';
echo '$order->formatted_shipping_address->protected: ' . $order->formatted_shipping_address->protected . '<br><br>';
echo '- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - <br><br>';
*/


echo '<h4>Order Informations</h4>';

//if you work on local you dont need this line. But you work on live, you need this line beacuse some information or methods needs admin 
$line_items = $order->get_items( apply_filters( 'woocommerce_admin_order_item_types', 'line_item') ); 

foreach ($line_items as $item_id => $item ) {


					$product           = $item->get_product(); 
					$product_id        = $item->get_product_id(); 
					$variation_id      = $item->get_variation_id(); 
					$item_type         = $item->get_type(); 
					$item_name         = $item->get_name(); 
					$quantity          = $item->get_quantity();  
					$line_subtotal     = $item->get_subtotal(); 
					$line_subtotal_tax = $item->get_subtotal_tax(); 
					$line_total        = $item->get_total(); 
					$line_total_tax    = $item->get_total_tax(); 
					$line_stats_tax    = $item->get_tax_status();


					echo 'Item Name: '    . $item_name         . '<br>'; 
					echo 'Total Tax: '    . $line_total_tax    . '<br>';
					echo 'Total: '        . $line_total        . '<br>';
					echo 'Subtotal Tax: ' . $line_subtotal_tax . '<br>';
					echo 'Subtotal: '     . $line_subtotal     . '<br>';
					echo 'Quantity: '     . $quantity          . '<br>';
					echo 'Product id: '   . $product_id        . '<br>';
					echo 'Tax Status: '   . $line_stats_tax    . '<br>';
					echo 'Item Type: '    . $item_type         . '<br>';
					echo 'Variation id: ' . $variation_id      . '<br>';
					echo __('Item Name', 'woo-list-products');

					echo '</br>';
					echo '</br>';
				}


		



}