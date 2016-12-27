# Map pin generator

The first version of this library generates striped pins that point location of something represented by that pin.

## How to get dependency

By composer.
```
composer require ninoslavjaric/map-pin-generator dev-master
```
## Implementation

```
require_once "vendor/autoload.php";

use Logic\PinGenerator;

header("Content-type: image/png");
$pin = PinGenerator::getStripedPin("image.jpg",[
    "rgb(100,100,100)",
    "rgb(200,200,200)",
]);
echo $pin;
```

### PinGenerator
| Method        | Static | Parameters | Description |
| ------        | ------ | ---------- | ----------  |
| getStripedPin | true   | imageUrl, Array colors, pinWidth = null | Gets striped pin blob content according to rgb color expressions. |

### Example output
![alt tag](https://raw.githubusercontent.com/ninoslavjaric/map-pin-generator/master/src/Resources/example.png)
