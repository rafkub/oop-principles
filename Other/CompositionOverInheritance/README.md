# Favor composition over inheritance
* class inheritance allows code reuse; object composition is another way of achieving it
* composition (HAS-A relationship) can be better than inheritance (IS-A relationship)

### Inheritance definition
[See inheritance](../../Basic/Inheritance)

### Composition
> _Assembling or composing objects to get more complex behavior._ - Design Patterns, GoF

> _Object composition is defined dynamically at run-time through objects **acquiring
references** to other objects._ - Design Patterns, GoF

### Aggregation
> _Aggregation implies that one object owns or is responsible for another object. Generally we
speak of an object having or being part of another object. Aggregation implies 
that an **aggregate object and its owner have identical lifetimes.**_ - Design Patterns, GoF

> _An object that's composed of subobjects. The subobjects are called the
aggregate's parts, and the aggregate is responsible for them._ - Design Patterns, GoF

The usage of these terms in _Design Patterns, GoF_ leads to the following short definitions:
### Composition definition
> When an object contains the other object and the contained object may exist without the other object.

### Aggregation definition
> When an object contains the other object and the contained object cannot exist without the other object.

## Note:
Compare above definitions with [Wikipedia](https://en.wikipedia.org/wiki/Object_composition#Aggregation):
> _Aggregation differs from ordinary composition in that it does not imply ownership.
> In composition, when the owning object is destroyed, so are the contained objects.
> In aggregation, this is not necessarily true._

which shows that UML meaning of these terms are exactly the opposite. However, the UML has been developed shortly
after the publication of _Design Patterns, GoF_.
  
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