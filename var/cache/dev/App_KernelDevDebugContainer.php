<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container44Z449j\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container44Z449j/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container44Z449j.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container44Z449j\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container44Z449j\App_KernelDevDebugContainer([
    'container.build_hash' => '44Z449j',
    'container.build_id' => '16d9109c',
    'container.build_time' => 1593167121,
], __DIR__.\DIRECTORY_SEPARATOR.'Container44Z449j');
