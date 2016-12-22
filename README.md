# Placeholder
Laravel 5.3 Package for using a placeholder image service to add images to your application.

##Services supported

Currently supports [unsplash.it](https://unsplash.it/) and [placeimg.com](https://placeimg.com/).

##Getting Started
Currently, the package consists of two facades: Placeholder and Placeimage. Placeholder is strictly for outputing placeholder image tags, while Placeimage will attempt to use an existing image public path, but revert to a placeholder image if the images does not exist.

##Code Examples

###Using the Placeholder tag
```php
//Usage:
\Placeholder::make($width, $height = null, $tagAttributes = null, $imageOptions = null);

//Basic Example:
\Placeholder::make(200);
//outputs: <img src="https://unsplash.it/200/200?random"> using unsplash.it

//Full Example:
\Placeholder::make(200, 200, ['class' => 'img-responsive', 'id' => 'placeholder'], ['color' => 'grayscale']);
//outputs:
<img src="https://unsplash.it/g/200/200?random" class="img-responsive" id="placeholder"> using unsplash.it
```

###Using the Placeimage tag

```php
//Create an image tag that will revert to placeholder if the image does not exist:
//Usage:
\Placeimage::make($imagePath, $width, $height = null, $tagAttributes = null, $imageOptions = null);

//Basic Example:
\Placeimage::make('/img/test.jpg', 200);
//outputs: <img src="/img/test.jpg"> using unsplash.it
\Placeimage::make('/img/foo.jpg', 200, null, ['width' => '200', 'class' => 'img-responsive'], ['color' => 'grayscale']); //image does not exist

//outputs: <img src="https://unsplash.it/g/200/200?random" width="200" class="img-responsive"> using unsplash.it
```

##Installation
Add the package to composer.json
```
php composer.phar require intervention/image
```

Add the package provider to providers array in ```config/app.php```
```php
Rufhausen\Placeholder\PlaceholderServiceProvider::class,
```

Add the facades to the facades array in ```config/app.php```
```php
'Placeholder'  => Rufhausen\Placeholder\Placeholder::class,
'Placeimage'   => Rufhausen\Placeholder\PlaceImage::class,
```
Publish the config
```
php artisan vendor:publish --provider="Rufhausen\Placeholder\PlaceholderServiceProvider"
```

## License

Placeholder is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2016 Gary Taylor
