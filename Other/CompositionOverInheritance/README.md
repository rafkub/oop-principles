# Favor composition over inheritance
* class inheritance allows code reuse; object composition is another way of achieving it
* composition (HAS-A relationship) can be better than inheritance (IS-A relationship)

### Composition definition
> When an object contains the other object and the contained object cannot exist without the other object.

### Aggregation definition
> When an object contains the other object and the contained object may exist without the other object.

#### Note:
* Aggregation differs from ordinary composition in that it does not imply ownership

### Inheritance definition
[See inheritance](../../Basic/Inheritance) 
  
## Benefits
* using composition gives more flexibility
  * inheritance is defined statically and thus is fixed; composition can be set up and changed dynamically at runtime
  * in inheritance change in the parent's implementation forces the subclass to change
  * if any aspect of the inherited implementation is not appropriate for new problem domains, 
    the parent class must be rewritten
* fewer implementation dependencies
* helps keeping class focused on one task (see Single Responsibility Principle)
* fewer classes
* in composition no internal details of objects are visible; with inheritance the internals of parent classes
  are often visible to subclasses (it breaks encapsulation)
  
## Drawbacks
* composition requires that the objects being composed have well-defined interfaces
* usually requires implementing a lot of methods that only forward operations to contained object
  * NOTE: in PHP it may be prevented by implementing the magic method `__call()`
* more objects
* inheritance is
  * straightforward to use 
  * supported directly by PHP
  * easier to modify the implementation being reused