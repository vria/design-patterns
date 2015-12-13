Command pattern
========================================

See [https://en.wikipedia.org/wiki/Command_pattern](https://en.wikipedia.org/wiki/Command_pattern) for more information.

Given that `Invoker` calls `Receiver`'s method, you can decouple `Invoker` and `Receiver` by means of `Command` object: any requests to `Receiver` is carried out by `Command` generic method. You can think that you turned a method call to an object.

Encapsulate a request as an object, thereby letting you parameterize clients with different requests, queue or log requests, and support undoable operations. 

Commands are an object-oriented replacement for callbacks.

Example implementation simulates a game control schema: player aims to reach a goal by moving to left, right, top, bottom. In some way client issues requests (i.g. by pressing buttons, tapping screen): "left", "right", "top", "bottom". Each request is parametrized with a Command.

Participants:
- Command (`Command`): declares an interface for executing an operation (move)
- ConcreteCommand (`BottomCommand`, `LeftCommand`, `RightCommand`, `TopCommand`): defines a binding between a Receiver object (Field) and an action ("left", "right", "top", "bottom").
- Client (`GameApp`): creates and holds concrete commands (`GameApp::keyboard`), issues a requests ("left", "right", "top", "bottom"), usually holds receiver (Field)
- Invoker (`GameApp::keyboard`): asks the command to carry out the request
- Receiver (`Field`): knows how to perform the operations associated with carrying out a request. Any class may serve as a Receiver.

![Command UML](doc/Command.png)

An example can be enhanced by:
- macro commands