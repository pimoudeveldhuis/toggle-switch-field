### Toggle Switch Field for Nova 4

## Features:
 - Set custom color using hex color code
 - Toggle or Icon align. Default (left)
 - Toggle Switch in Index to update value instead of icons. Default (true)
 - Toggle Switch in Detail to update value instead of icons. Default (true)

### Requirements
- PHP 8.0 or higher
- Nova 4

## Installation

You can install the package into a Laravel app that uses Nova via composer:

```bash
composer require pimoudeveldhuis/toggle-switch-field
```

## Usage

Table column migration
```
$table->boolean('toggle')->nullable()->default(true);
```
Add the field to Nova Resource
```
  public function fields(NovaRequest $request)
    {
        return [
           ToggleSwitchField::make('Toggle','toggle')
                ->color('#3AB95A')
                ->toggleAlign('center')
                ->indexToggle(false)
                ->detailToggle(false),
                ->formToggle(true),
        ];
    }
```

## Screenshots
### Custom hex color code
<img src="screenshots/img.png" width="150"><br>

### Detail Page Toggle Switch On
<img src="screenshots/detail-toggle-on.png" width="400"><br>
<img src="screenshots/dark-detail-toggle-on.png" width="400"><br>

### Detail Page Toggle Switch Off
<img src="screenshots/detail-toggle-off.png" width="400"><br>
<img src="screenshots/dark-detail-toggle-off.png" width="400"><br>

### Detail Page Icons On
<img src="screenshots/detail-on.png" width="100"><br>
<img src="screenshots/dark-detail-on.jpg" width="100"><br>

### Detail Page Icons Off
<img src="screenshots/detail-off.png" width="100"><br>
<img src="screenshots/dark-detail-off.png" width="100"><br>


### Edit Page Toggle Switch On
<img src="screenshots/img_1.png" width="400"><br>
<img src="screenshots/on.png" width="100"><br>
<img src="screenshots/dark-on.png" width="100"><br>

### Edit Page Toggle Switch Off
<img src="screenshots/img_2.png" width="400"><br>
<img src="screenshots/off.png" width="100"><br>
<img src="screenshots/dark-off.png" width="100"><br>


### Index Page Toggle Switch
<img src="screenshots/index-toggle.png" width="100"><br>
<img src="screenshots/dark-index-toggle.png" width="100"><br>

### Index Page icons 
<img src="screenshots/index.png" width="100"><br>
<img src="screenshots/dark-index.png" width="100"><br>



## Support:
naif@naif.io

https://naif.io

Bug Tracker:

https://github.com/naifalshaye/toggle-switch-field/issues

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
