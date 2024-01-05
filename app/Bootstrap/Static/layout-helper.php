<?php

 // extract the data so that the consumer can access the data in the form and with the name like how it's passed
// for the layout
global $data, $layout, $content;
$GLOBALS['state'] = ['data' => &$data, 'layout' => &$layout, 'content' => &$content ];
if(is_array($data) && !empty($data)) {
    extract($data);
}
// require the layout
require $layout;

function yieldContent()
{
    // extract the data so that the consumer can access the data in the form and with the name like how it's passed
    // for the content
    global $state;
    if(is_array($state['data']) && !empty($state['data'])) {
        extract($state['data']);
    }
    return require $state['content'];
}


