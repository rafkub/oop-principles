# Loose Coupling
* strive for loosely coupled designs between objects that interact
  * components can interact, but should have little or no knowledge of the definitions of other separate components
  * keep objects from referring to each other explicitly

> _Classes that are tightly coupled are hard to reuse in 
> isolation, since they depend on each other. Tight coupling leads to
> monolithic systems, where you can't change or remove a class without
> understanding and changing many other classes._ - Design Patterns, GoF, 2009

> _Loose coupling occurs when the dependent class contains a pointer only to an interface,
> which can then be implemented by one or many concrete classes.
> The dependent class's dependency is to a "contract" specified by the interface;
> a defined list of methods and/or properties that implementing classes must provide.
> Any class that implements the interface can thus satisfy the dependency of a dependent class
> without having to change the class._ - Wikipedia

## Benefits
* allows extensibility in design
  * components can be replaced with alternative implementations that provide the same services
* increases the probability that a class can be reused