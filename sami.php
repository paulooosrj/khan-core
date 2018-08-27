<?php

  require __DIR__ . '/vendor/autoload.php';

  use Sami\Sami;
  use Symfony\Component\Finder\Finder;

  $finder = Finder::create()
      ->files()
      ->name('*.php')
      ->in(__DIR__.'/src');

  $config = array(
      'title' => 'Khan framework Docs',
      'build_dir' => __DIR__.'/docs',
      'cache_dir' => __DIR__.'/cache',
  );

  $sami = new Sami($finder, $config);
  $sami = \nochso\SamiTheme\Theme::prepare($sami);

  return $sami;