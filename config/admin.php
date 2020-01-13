<?php
return[
    'extensions' => [
        'simditor' => [
            // Set to false if you want to disable this extension
            'enable' => true,
            // Editor configuration
            'config' => [
                'upload' => [
                    'url' => '/admin/api/upload', # example api route: admin/api/upload
                    'fileKey' => 'upload_file',
                    'connectionCount' => 3,
                    'leaveConfirm' => 'Uploading is in progress, are you sure to leave this page?'
                ],
                'tabIndent' => true,
                'toolbar' => ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment'],
                'toolbarFloat' => true,
                'toolbarFloatOffset' => 0,
                'toolbarHidden' => false,
                'pasteImage' => true,
                'cleanPaste' => false,
            ]
        ]
    ]
];
