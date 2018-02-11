Command pattern
========================================

See [https://en.wikipedia.org/wiki/Command_pattern](https://en.wikipedia.org/wiki/Command_pattern) for more information.

Given that one object (`Invoker`) calls a method of another object (`Receiver`), 
it is possible to decouple `Invoker` and `Receiver` by means of `Command` object. 
The `Receiver`'s method that the `Invoker` wants to call (and the `Receiver` itself) is hidden behind `Command` object.

So instead of 
```
Invoker {
    function() {
        /** @var $receiver Receiver */
        $receiver->someMethod();
    }
}
```

you get

```
Invoker {
    function() {
        /** @var $command Command */
        $command->execute();
    }
}

CommandReceiver extends Command {
    function execute() {
        /** @var $receiver Receiver */
        $receiver->someMethod();
    }
}
```

Encapsulating a specific method call in a generic object `Command`, you get the opportunity to parametrize the `Invoker` 
with absolutely any commands that result to calling an any specific `Receiver` method. 
The command pattern also brings additional opportunities like conserving the historiy of executed commands 
or undoing commands.

The interesting fact is that commands are an object-oriented replacement for callbacks.

Example implementation simulates a simple game control schema: 
a player aims to reach a goal by moving to left, right, top, bottom. 
The Joystick issues requests that are represented by strings "left", "right", "top", "bottom".
These strings are mapped to `Commands` that transmit the the joystick's requests to the `Field`.
The field stores the internal state of the game changing under the influence by joystick's requests.

Participants:
- [Field] (`Receiver`) really performs the operations and holds the current state of the game that changes when 
one of its methods are called `toLeft`, `toRight`, `toTop`, `toBottom`. This class knows nothing about other classes.
- [Command] (`Command`) declares the interface a generic operation `move` 
and the operation of undoing the last executed operation `moveBack`.
- [LeftCommand], [RightCommand], [BottomCommand], [TopCommand] (`ConcreteCommand`) 
are classes that directly call the methods of the `Field` and 
plays the role of a link between the `Joystick` and the `Field`.
- [Joystick] (`Invoker`): holds a mapping between the requests "left", "right", etc and the commands.
Note that `Joystick` is coupled only with `Command` interface and calls its generic methods `move` and `moveBack`.

![Command UML](doc/Command.png)

This example can be enhanced by macro commands.

[Field]: Field.php
[Command]: Command.php
[LeftCommand]: Command/BottomCommand.php
[BottomCommand]: Command/BottomCommand.php
[RightCommand]: Command/RightCommand.php
[TopCommand]: Command/TopCommand.php
[Joystick]: Joystick.php
