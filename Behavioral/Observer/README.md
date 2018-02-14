# Observer

Observer pattern defines the interaction between a `*Subject`* and its `*Observers`*
in a way that the `*Subject`* keeps the list of `*Observers`* and notifies them when
the event that they listen to happens.

The `*Subject`* doesn’t depend on concrete `*Observers`* classes but on the generic
interface (`*Observer`* or `*Listener`* or `*\SplObserver`*) that have the only method,
usually called `*notify`* or `*update`* or `*onEventName`*.

See [https://en.wikipedia.org/wiki/Observer_pattern] for more information.

Notes:

1. *Event*. The Subject evolves over the time, therefore the events that change the Subject's state
and provokes the notification of observers are always differents. 
It is a quite rare situation when an observer needs to be notified on all subject's events.
Mostly each particular observer should be attached to a particular subject (e.g. `Order`) 
AND a particular event (`Order::CREATED`, `Order::PAYED`, `Order::REFUSED`, `Order::SENT`, ...).

2. *Context*. An observer is permitted to observe any number of Subjects, therefore when the Observer
is called it must know a Subject that emitted the notification or any other useful information.
In the first case the observer's method `notify` must accept the only parameter of Subject's type.
In the second case the observer's method `notify` accepts en `Event` object the incapsulates the
information about the event (FormEvent, LifecycleEventArgs, GetResponseForExceptionEvent, ...).

3. *Infinite loop*. Make sure that your code doesn't run to infinite loop when the `notify` method 
of Observer calls some method of Subject that in turn broadcasts the notifications to Observers.

## Implementation

This example makes use of two SPL interfaces: [SplSubject] and [SplObserver].

![Command UML](doc/Observer.png)

In this case [Order] class as a `Subject` that evolves over the time:
from `INITIALIZED` to `FINALIZED` state.

Whenever `Order` changes its state it notifies all attached `Observers`. Note that `Order`
knows nothing about its `Observers` but the fact that they implement `\SplObserver` interface.
This ensures better reusability of both the `Order` class and `Observer subclasses`.

There are three `Observers`:
- [PersisterObserver] is a listener that reacts to any change of `Order` and "persists" it to database.
- [SendEmailObserver] is a listener that reacts to any change of Order object. 
When `Order` is finalized it "sends" an email.
- [LoggerObserver] is a listener that reacts to any state change of `Order` object and logs its new state.

`Observers` can be and usually wired to other services to achieve their goal: the persister
can be wired to `Doctrine`, the emailer can be wired to `SwiftMailer`, the logger can be wired to `Monolog`.

In this implementation all listeners are notified any time the state is changed even though
for exemple `SendEmailObserver` needs to be called only on `Order`'s finalization state. One
variation of Observer pattern assumes that `Observers` are subscribed to receive notifications
about particular event.

Check out [ObserverTest] the see the proper use of these classes.

[https://en.wikipedia.org/wiki/Observer_pattern]: (https://en.wikipedia.org/wiki/Observer_pattern)
[SplSubject]: (http://php.net/manual/fr/class.splsubject.php)
[SplObserver]: (http://php.net/manual/fr/class.splobserver.php)
[Order]: Order.php
[PersisterObserver]: PersisterObserver.php
[SendEmailObserver]: SendEmailObserver.php
[LoggerObserver]: SendEmailObserver.php
[ObserverTest]: Test/ObserverTest.php
