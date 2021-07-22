# The Principle of Least Knowledge
* talk only to your immediate friends
* reduce the interactions between objects

This principle prevents creating designs that have many classes coupled together which results in changes cascading
from one part of the system to other parts.

## Guidelines:
Only invoke methods that belong to:
* The object itself
* Objects passed in as a parameter to the method
* Any object the method creates or instantiates
* Any components of the object

Do not invoke methods that belong to:
* objects that were returned from calling other methods
* anything else

## NOTE:
This principle is also known as the Law of Demeter.