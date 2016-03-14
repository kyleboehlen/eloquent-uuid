# eloquent-uuid
A Laravel Eloquent Model trait for adding and using a uuid with models

The trait listens to the `creating` event. It generates a new UUID and saves it in the uuid column on the model. 

## Installation

```
composer require jamesmills/eloquent-uuid
```

## Use

In order to use this trait, your **schema** must be something like:

```
<?php
	// ...
	Schema::create('users', function (Blueprint $table) {
		$table->primary('id');
		$table->uuid('uuid'); // this will create a CHAR(36) field
		$table->string('username', 32);
		$table->string('password', 50);
		// ...
	});
```

#### In your models

In order to use this in your models, just put `use HasUuidTrait;`:

```
<?php

namespace App;
use JamesMills\Uuid\HasUuidTrait;

class User extends Eloquent
{
	use HasUuidTrait;
}
```
