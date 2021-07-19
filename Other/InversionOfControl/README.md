# Inversion of Control

* recommends inversion of different kinds of controls in object-oriented design to achieve loose coupling
  between application classes
  * control refers to any additional responsibilities a class has, other than its main responsibility
* control includes:
  * control over the flow of an application
  * control over the dependent object creation and binding
* also known as the **Hollywood Principle** ("Don't call us, we'll call you")

## Control flow
### Natural control flow of an application:
* console application (application flow is decided by the application itself)
* calling library classes (application code calls library code)

### Inversion of control over flow of an application:
* GUI application (application flow is decided by a user and events)
* using framework (application code is called by a framework code)

## Object creation
### Natural control flow of the dependent object creation:
* instantiation of objects by owning object

### Inversion of control over the dependent object creation:
* using a service locator pattern
* using [dependency injection pattern](https://github.com/rafkub/oop-design-patterns/DependencyInjection)
* using a contextualized lookup
* using template method design pattern
* using [strategy design pattern](https://github.com/rafkub/oop-design-patterns/GangOfFour/Behavioral/Strategy)

## Good to know
TDD (Test Driven Development) relies on applying Inversion of Control for object creation.