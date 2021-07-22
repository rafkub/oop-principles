# Program to interface, not to implementation
* manipulate objects solely in terms of the interface defined by abstract classes or interfaces

## Benefits
* clients remain unaware of the specific types of objects they use
* clients only know about the abstract class(es) defining the interface

## NOTE:
* "interface" in this context means an interface, or an abstract class
* concrete classes have to be instantiated somewhere in a system,
  but it is often better to rely on creational patterns to accomplish that goal
  (see [Gang of Four creational patterns](https://github.com/rafkub/oop-design-patterns/GangOfFour/Creational) and 
  [other creational patterns](https://github.com/rafkub/oop-design-patterns/Creational))