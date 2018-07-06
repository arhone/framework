<?php
/**
 * @var \arhone\controller\Controller $this
 */

$Builder = $this->Builder;

$this->Trigger->add('console:(--help|-h)?', function () use ($Builder) {
    return $Builder->make('ConsoleHelpController')->help();
});

return [
    'console:(--help|-h)?' => [
        [
            'class'  => 'ConsoleHelpController',
            'method' => 'help'
        ]
    ],
    'console:(cache:clear)' => [
        [
            'class'  => 'ConsoleCacheController',
            'method' => 'cacheClear'
        ]
    ],
    'console:test' => [
        [
            'class'    => 'ConsoleHelpController',
            'method'   => 'test',
            'argument' => ['ConsoleCacheController']
        ]
    ]
];
