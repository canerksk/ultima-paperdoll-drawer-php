<?php

require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

use Ultima\Domain\Item;
use Ultima\Domain\Layer;
use Ultima\PaperdollDrawer\PaperdollBuilder;
use Ultima\PaperdollDrawer\PaperdollDrawer;

$drawer = PaperdollDrawer::with(__DIR__ . '/../uofiles');

// Bu kısım veritabanından gelecek gibi düşün
$items = [
    // ['id' => 9860, 'hue' => 1109, 'layer' => Layer::NECK],
    ['id' => 0x1F03, 'hue' => 04, 'layer' => Layer::OUTER_TORSO],
    ['id' => 1357, 'hue' => 0, 'layer' => Layer::ARMS],
    ['id' => 0x13FE, 'hue' => 0, 'layer' => Layer::ONE_HANDED],
];

$builder = PaperdollBuilder::create('')->withTitle('');

foreach ($items as $item) {
    $builder->withItem(new Item($item['id'], $item['hue'], $item['layer']));
}

$paperdoll = $builder->build();

$paperdollImage = $drawer->drawPaperdoll($paperdoll);
imagepng($paperdollImage, 'mypaperdoll.png');

