<? require_once('../wp-blog-header.php'); ?>


<?
$json = array();
$taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty,
         'number'       => "20",
         'orderby' => 'name',
  );
 $all_categories = get_categories( $args ); ?>
<? 
//print_r($all_categories);
foreach($all_categories as $category):
    $cat = array();
    $cat['term_id']=$category->term_id;
    $cat['name'] = $category->name;
    $cat['slug'] = $category->slug;
    //$cat['category_count'] = $catgory->category_count;
    $cat['category_count'] = "$category->category_count";

    $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
    $cat['image'] = wp_get_attachment_url( $thumbnail_id );
    $cat['image'] = str_replace('http://','https://', $cat['image']);
    if($cat['image']==false){
        $cat['image'] = 'https://www.kazbows.co.uk/api/category_placeholder.gif';
    }
    $json[] = $cat;
endforeach;

//print_r($cat);

$letsEncode['data']=$json;
print_r(json_encode($letsEncode)); 
?>