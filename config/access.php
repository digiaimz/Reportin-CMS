<?php

return [

    'level' => [
        'get' => array('Admin','Markazi'  , 'Zone' , 'District' , 'Tehsil') ,
        'Admin' => array( 'Markazi'  , 'Zone' , 'District' , 'Tehsil') ,
        'Markazi' => array('Zone' , 'District' , 'Tehsil') ,
        'Zone' => array(  'District' , 'Tehsil' ) ,
        'District' => array('Tehsil') ,
        'Tehsil' => array() ,
        'open' => array('Admin' , 'Markazi'   ) ,
        'limited' => array(  'Zone' , 'District' , 'Tehsil')
    ],
    'custom' => [
        'login' => array(1 , 5 , 40) ,
    ],

];
