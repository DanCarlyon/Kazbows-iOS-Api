<? require_once('../wp-blog-header.php'); ?>
<?
$p = get_post($match['params']['id']);
    
$args = array(
   'post_type' => 'attachment',
   'numberposts' => -1,
   'post_status' => null,
   'post_parent' => $p->ID
);
$attachments = get_posts( $args );
 if ( $attachments ) {
    foreach ( $attachments as $attachment ) {
       /*echo '<li>';
       echo wp_get_attachment_image( $attachment->ID, 'full' );
       echo '<p>';
       echo apply_filters( 'the_title', $attachment->post_title );
       echo '</p></li>';*/
      }
 }

$product = array();
$product['title']=$p->post_title;
$product['status']=$p->post_status;
$product['description']=$p->post_content;
$product['image']=str_replace("http://","https://",wp_get_attachment_url( $attachment->ID ));
$product['price'] = '£'.get_post_meta( $pid, '_regular_price', true);
$product['weblink'] = post_permalink($p->ID);
//print_r($p);
$json[] = $product;

$letsEncode['data']=$json;
print_r(json_encode($letsEncode));
?>