<?php

return [
    'admin'=>[
        'state'=>[
            (int)true => '<span class="text-success">Normal</span>',
            (int)false => '<span class="text-danger">Forbidden</span>',
        ]
    ],
    'resource' =>[
        'type' =>[
            App\Resource::VIDEO =>'<i class="fa fa-video-camera" aria-hidden="true"></i>Video',
            App\Resource::DOC =>'<i class="fa fa-file-text" aria-hidden="true"></i>Document',
        ]
    ]
];
