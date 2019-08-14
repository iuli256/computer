<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'cache_warmer' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\CacheWarmer\\CacheWarmerInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\CacheWarmer\\CacheWarmerAggregate.php';

return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(new RewindableGenerator(function () {
    yield 0 => ($this->privates['validator.mapping.cache_warmer'] ?? $this->load('getValidator_Mapping_CacheWarmerService.php'));
    yield 1 => ($this->privates['router.cache_warmer'] ?? $this->load('getRouter_CacheWarmerService.php'));
    yield 2 => ($this->privates['annotations.cache_warmer'] ?? $this->load('getAnnotations_CacheWarmerService.php'));
    yield 3 => ($this->privates['serializer.mapping.cache_warmer'] ?? $this->load('getSerializer_Mapping_CacheWarmerService.php'));
    yield 4 => ($this->privates['twig.cache_warmer'] ?? $this->load('getTwig_CacheWarmerService.php'));
    yield 5 => ($this->privates['twig.template_cache_warmer'] ?? $this->load('getTwig_TemplateCacheWarmerService.php'));
    yield 6 => ($this->privates['webpack_encore.entrypoint_lookup.cache_warmer'] ?? $this->load('getWebpackEncore_EntrypointLookup_CacheWarmerService.php'));
}, 7), true, ($this->targetDirs[0].'/srcApp_KernelDevDebugContainerDeprecations.log'));
