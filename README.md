go-graphing
===========

Open Source graphing library plugin

## Libraries

This plugin allows for the enqueuing of [d3](http://d3js.org/) and [Rickshaw](http://code.shutterstock.com/rickshaw/) for use in WordPress plugins and themes.

## Usage

### Registering and enqueuing
Registering styles and scripts is done simply by calling the `go_graphing()` singleton.  The resources that get registered are as follows:

* __d3__ (script)
* __d3-layout__ (script)
* __rickshaw__ (script)
* __rickshaw__ (styles)

If you wish to use those libraries, simply set dependencies on your JS files:

```php
wp_register_script(
  'bacon',
	'js/bacon.js',
	array( 'rickshaw' ),
	1,
	TRUE
);
```

_Note:_ Dependencies between the above libraries is set up as part of the go-graphing plugin: `rickshaw` has a dependency on `d3-layout` which has a dependency on `d3`.

### Helpers

#### `array_to_series( $array )`

You can convert an array of key/value pairs to a series array (an array of x, y values)

```php
$data = array(
	'New York' => 20,
	'Boston' => 5001,
	'Las Vegas' => 8008,
);

$data = go_graphing()->array_to_series( $data );
```

Results in:

```
array(
  array(
    x => 'New York',
    y => 20
  ),
  array(
    x => 'Boston',
    y => 5001
  ),
  array(
    x => 'Las Vegas',
    y => 8008
  )
)
```
