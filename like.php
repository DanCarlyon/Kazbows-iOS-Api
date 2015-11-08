<?
$info = array();
$info['id'] = $match['params']['id'];
$info['device'] = $match['params']['device'];
$json[] = $info;
$letsEncode['data']=$json;
print_r(json_encode($letsEncode));
?>