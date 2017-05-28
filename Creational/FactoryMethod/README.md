# Factory Method

Imagine a **Creator object** that creates a **Product object** for latter use.
According to [Open/closed principle](https://en.wikipedia.org/wiki/Open/closed_principle) 
it is usually important to facilitate subclassing of **Creator class** as well as **Product class**.
This pattern suggests encapsulate the creation of **Product object** in a *Factory method*. Thus
**Creator::getProduct** returns **Product object** and any **SubCreator::getProduct** returns appropriate 
**SubProduct**.

See [https://en.wikipedia.org/wiki/Factory_method_pattern] for more information.

## Notes



## Implementation

![Factory Method UML](doc/FactoryMethod.png)


[https://en.wikipedia.org/wiki/Factory_method_pattern]: (https://en.wikipedia.org/wiki/Factory_method_pattern)
