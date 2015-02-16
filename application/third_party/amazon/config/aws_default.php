<?php
return array(
    'class' => 'Aws\Common\Aws',
    'services' => array(
        'default_settings' => array(
            'params' => array(
				'key'    => 'AKIAJBOTERTQWOPHBGXA',
                'secret' => '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',
                'region' => 'ap-southeast-1'
			)
        ),
        's3' => array(
            'alias'   => 'S3',
            'extends' => 'default_settings',
            'class'   => 'Aws\S3\S3Client',
        ),
    )
);
