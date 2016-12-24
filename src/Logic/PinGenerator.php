<?php
/**
 * Created by PhpStorm.
 * User: ninoslav.jaric
 * Date: 24-Dec-16
 * Time: 21:41
 */

namespace Logic;

use \Imagick;
use \ImagickPixel;

class PinGenerator
{
    public static function getStripedPin($resource, Array $colors, $width = null){
        $colNumber = count($colors);
        $image = realpath($resource);

        $wph = 8/11;

        $width = $width ? $width : 40;
        $height = $width/$wph;

        $pinMask = new Imagick(realpath("patterns/pin.png"));
        $circleMask = new Imagick(realpath("patterns/circle.png"));
        $image = new Imagick($image);

        $pinMask->scaleImage($width, $height);

        $container = new Imagick;
        $container->newImage($width, $height, new ImagickPixel("rgba(0,0,0,0)"));
        $container->setImageFormat("png");

        for ($i=0; $i < $colNumber; $i++){
            if(!preg_match('/^rgb\(\d{1,3},\d{1,3},\d{1,3}\)$/', $colors[$i]))
                throw new \Exception("No proper color format");
            
            $bar = new Imagick;
            $bar->newImage(
                $width/$colNumber,
                $height,
                new ImagickPixel($colors[$i])
            );
            $bar->setImageFormat("png");
            $container->compositeImage($bar, Imagick::COMPOSITE_DEFAULT, $i*$width/$colNumber, 0);
        }
        $container->compositeImage($pinMask, Imagick::COMPOSITE_COPYOPACITY, 0, 0);

        $circleMask->scaleImage($image->getImageWidth(), $image->getImageHeight());

        $image->setImageFormat("png");
        $image->compositeImage($circleMask, Imagick::COMPOSITE_COPYOPACITY, 0, 0);
        $compresionRate = 1.2;
        $image->scaleImage($width/$compresionRate, $width/$compresionRate);

        $container->compositeImage(
            $image,
            Imagick::COMPOSITE_DEFAULT,
            $width*($compresionRate-1)/($compresionRate*2),
            $width*($compresionRate-1)/($compresionRate*2)
        );
        return $container->getImageBlob();
    }

}