# Dependency Inversion

* depend upon abstractions, not concretions (classes should only have direct relationships with high-level abstractions)
* high-level modules should not depend on low-level modules; both should depend on abstractions
* abstractions should not depend on details; details should depend on abstractions

> _The conventional dependency relationships established from high-level, policy-setting modules to low-level, 
> dependency modules are reversed, thus rendering high-level modules 
> independent of the low-level module implementation details._ - Wikipedia