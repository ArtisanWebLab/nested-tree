## Nested Tree for Laravel

The [nested set model](https://en.wikipedia.org/wiki/Nested_set_model) is an advanced technique for maintaining hierachies among models using `parent_id`, `nest_left`, `nest_right`, and `nest_depth` columns. To use a nested set model, apply the `ArtisanWebLab\NestedTree\Database\Traits\NestedTreeTrait` trait.

```shell
composer require artisanweblab/nested-tree
```

```php
 $table->integer('parent_id')->nullable();
 $table->integer('nest_left')->nullable();
 $table->integer('nest_right')->nullable();
 $table->integer('nest_depth')->nullable();
```

```php
use ArtisanWebLab\NestedTree\Database\Traits\NestedTreeTrait;

class Category extends Model
{
    use NestedTreeTrait;

    // You can change the column names used by declaring    
    const PARENT_ID = 'my_parent_column';
    const NEST_LEFT = 'my_left_column';
    const NEST_RIGHT = 'my_right_column';
    const NEST_DEPTH = 'my_depth_column';
}
```

### Creating a root node

By default, all nodes are created as roots:

```php
$root = Category::create(['name' => 'Root category']);
```

Alternatively, you may find yourself in the need of converting an existing node into a root node:

```php
$node->makeRoot();
```

You may also nullify it's `parent_id` column which works the same as `makeRoot'.
```php
$node->parent_id = null;
$node->save();
```

### Inserting nodes

You can insert new nodes directly by the relation:

```php
$child1 = $root->children()->create(['name' => 'Child 1']);
```

Or use the `makeChildOf` method for existing nodes:

```php
$child2 = Category::create(['name' => 'Child 2']);
$child2->makeChildOf($root);
```

### Deleting nodes

When a node is deleted with the `delete` method, all descendants of the node will also be deleted. Note that the delete [model events](../database/model.md#model-events) will not be fired for the child models.

```php
$child1->delete();
```

### Getting the nesting level of a node

The `getLevel` method will return current nesting level, or depth, of a node.

```php
// 0 when root
$node->getLevel()
```

### Moving nodes around

There are several methods for moving nodes around:

- `moveLeft()`: Find the left sibling and move to the left of it.
- `moveRight()`: Find the right sibling and move to the right of it.
- `moveBefore($otherNode)`: Move to the node to the left of ...
- `moveAfter($otherNode)`: Move to the node to the right of ...
- `makeChildOf($otherNode)`: Make the node a child of ...
- `makeRoot()`: Make current node a root node.


---

Copyright (c) 2014-2020 Responsiv Pty Ltd, October CMS
