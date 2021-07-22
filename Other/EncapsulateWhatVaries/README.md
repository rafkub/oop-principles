# Encapsulate What Varies
* identify the aspects of an application that vary and separate them from what stays the same
  * what stays the same is isolated from what changes (or might change) often
  * lets one part of the system vary independently of another part
  * allows to change the isolated part of the system without redesign
    
## Benefits
* helps to handle frequently changing details

## NOTE:
Encapsulating the concept that varies is a theme of many design patterns.

Examples:

| Design Pattern | Aspect(s) that can vary |
| --- | --- |
| Abstract Factory | families of product objects |
| Builder | how a composite object gets created |
| Factory Method | subclass of object that is instantiated |
| Prototype | class of object that is instantiated |
| Adapter | interface to an object |
| Composite | structure and composition of an object |
| Decorator | responsibilities of an object without subclassing |
| Facade | interface to a subsystem |
| Proxy | how an object is accessed and its location |
| Chain of Responsibility | object that can fulfill a request |
| Command | when and how a request is fulfilled |
| Iterator | how an aggregate's elements are accessed and traversed |
| Mediator | how and which objects interact with each other |
| Observer | number of objects that depend on another object |
| State | states of an object |
| Strategy | an algorithm |
| Template Method | steps of an algorithm |
| Visitor | operations that can be applied to object(s) without changing their class(es) |