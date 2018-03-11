Prototype
=========

The prototype pattern is about to create the necessary objects by cloning their prototypes. 
The prototype is just an already created and configured object.
For example, in the client code, it is necessary create objects of the `Product` class. 
To do this, the client code has access to the already created `Product` object and clones it as many times as needed.
Thus, this object is a prototype for new cloned objects.

As with any pattern, you need to think about flexibility and extensibility, the client code can work with any descendant 
of the `Product` class (or any class that implements the `Product` in case it is an interface). 
The client code stays dependent on the `Product` only. 

The Prototype pattern is an alternative to the Abstract factory pattern: 
instead of asking the factory to create a new `Product` object `$productFactory->getProduct()` the client code 
asks the existing instance of `Product` object to clone itself `clone $productPrototype`. 
Since the factory can create families of objects (`ProductA`, `ProductB`, `ProductC`),
in case of prototype pattern it is necessary to parameterize the client with three prototypes 
(`$productA`, `$productB`, `$productC`).
On the other hand, the abstract factory can be implemented using the Prototype pattern.

Also, the Prototype pattern is an alternative to the Factory method pattern. 
In this case the Prototype pattern allows to avoid the subclassing of client classes.

See [https://en.wikipedia.org/wiki/Prototype_pattern](https://en.wikipedia.org/wiki/Prototype_pattern) for more information.

## Implementation

![Prototype UML](doc/Prototype.png)

The implementation of this pattern is from the same area as for the [Abstract factory pattern].
This will emphasize the similarities and differences between these two patterns.

Imagine that the [Renderer] or any other client code needs to create a set of these html entities : 
- [AbstractButton] that can be [PlainButton], [BootstrapButton], etc.
- [AbstractTextInput] that can be [PlainTextInput], [BootstrapTextInput], etc.
- [AbstractPage] that can be [PlainPage], [BootstrapPage], etc. 
The page contains an array of [ElementInterface] objects (buttons, text inputs), which are also rendered when the page is displayed.

Through its constructor, the [Renderer] is parameterized with three prototype objects: a concrete button, a concrete text field, a concrete page.
When the new object is demanded the [Renderer] simply clones the proper prototype.

Note that when a page prototype is cloned, you must [clone all the elements] it contains.

[Abstract factory pattern]: ../AbstractFactory
[Renderer]: Renderer.php

[AbstractButton]: AbstractButton.php
[PlainTextInput]: Plain/PlainTextInput.php
[BootstrapTextInput]: Bootstrap/BootstrapTextInput.php

[AbstractTextInput]: AbstractTextInput.php
[PlainButton]: Plain/PlainButton.php
[BootstrapButton]: Bootstrap/BootstrapButton.php

[AbstractPage]: AbstractPage.php
[PlainPage]: Plain/PlainPage.php
[BootstrapPage]: Bootstrap/BootstrapPage.php
[clone all the elements]: AbstractPage.php#L46
