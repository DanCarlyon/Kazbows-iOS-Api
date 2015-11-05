<? require_once('../wp-blog-header.php'); ?>
<?php
$json = array();
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 12
);
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
    while ( $loop->have_posts() ) : $loop->the_post();
        $p = get_post();
        $product = array();
        $product['title']=$p->post_title;
        $product["id"]='"'.get_the_ID().'"';
        $product['status']=$p->post_status;
        $product['description']=$p->post_content;
        $product['image']=str_replace("http://","https://",wp_get_attachment_url( get_post_thumbnail_id() ));
        $product['price'] = '£'.get_post_meta( get_the_ID(), '_regular_price', true);
        //print_r($p);
        $json[] = $product;
    endwhile;
    //print_r($p);
} else {

}
$letsEncode['data']=$json;
print_r(json_encode($letsEncode));
?>