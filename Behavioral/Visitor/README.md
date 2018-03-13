Visitor
=======

Visitor pattern lets introduce a new method for a multiple element classes without changing that classes. 
These new methods (one for each element class) are encapsulated in the `Visitor` class. 
Then when it comes to executing this operation the visitor object is passed to a generic method `acceptVisitor($anyVisitor)` of an element object
which in turn calls the proper method of passed visitor.

So before: 

```
interface Element {
    public fucntion print();
    public fucntion sum();
    public fucntion do();
    // other methods
}

class First implements Element {
    public fucntion print() [ // printing first, may contain many lines };
    public fucntion sum() { // sum first, may contain many lines };
    public fucntion do() { // doing first, may contain many lines };
    // other methods
}

class Second implements Element {
    public fucntion print() [ // printing second, may contain many lines };
    public fucntion sum() { // sum second, may contain many lines };
    public fucntion do() { // doing second, may contain many lines };
    // other methods
}
```

As you can see, to add a new operation in the `Element` interface, you need to add its body to each class that implements it.
In that way you can end up with many big methods in your `First` and `Second` classes.
Moreover that operation are quite different: printing, sum, doing something, etc. 
The classes `First` and `Second` gets polluted very quickly with unrelated logic.

Let's see how visitors can enhance the architecture:
```
interface Element {
    // This could be any visitor performing any operation.
    public fucntion accept(Visitor $visitor);
}

class First implements Element {
    public fucntion accept(Visitor $visitor) {
        // Call the method intended for the First class.
        $visitor->visitFirst($this);
    };
}

class Second implements Element {
    public fucntion accept(Visitor $visitor) {
        // Call the method intended for the Second class.
        $visitor->visitSecond($this);
    };
}

interface Visitor {
    public function visitFirst(First $first);
    public function visitSecond(Second $second);
}

// Gather all pringing logic
class PrintVisitor implements Visitor {
    public function visitFirst(First $first) { // printing first, may contain many lines };
    public function visitSecond(Second $second) { // printing second, may contain many lines };
}

// Gather all sum logic
class SumVisitor implements Visitor {
    public function visitFirst(First $first) { // sum first, may contain many lines };
    public function visitSecond(Second $second) { // sum second, may contain many lines };
}

// Gather all doing logic
class DoVisitor implements Visitor {
    public function visitFirst(First $first) { // doing first, may contain many lines };
    public function visitSecond(Second $second) { // doing second, may contain many lines };
}

// other visitors
```
 
With the Visitor pattern, the methods that were in the `Element` (and `First` and `Second`) were in regrouped to the visitors.
In addition these methods are localized by its purpose: printing, sum, doing, etc.
To introduce a new operation to the `Element` and its implementators, you simply add a new visitor class
without changing anything else.

This architecture is a way much cleaner because it promotes a separation of concerns. 
Nevertheless it may affect encapsulation of `First` and `Second` classes 
because visitor's methods may require a lot of privilege.

See [https://en.wikipedia.org/wiki/Visitor_pattern](https://en.wikipedia.org/wiki/Visitor_pattern) for more information.

![Visitor pattern class diagram](doc/Visitor.png)

Consider a library for handling web form and its fields (like the Form component of Symfony).
The idea is that of each field in the form can be configured by an object of one of these classes: 
- [EmailField] for email text fields,
- [IntegerField] for integer fields,
- [CheckboxesField] for a group of checkboxes.

These classes inherit from [FormField] that contains common properties like `$value`, `$viewValue`, `$required` and `$error`.
 
To show a default value in a field when the form is rendered, the php model value (`$value`) is mapped to html value (`$viewValue`).
When the form is submitted the view value is mapped back to php model value. 

The view value must be validated before it gets transformed to php value: 
- email must be a valid email address, 
- integer can not contain nothing but digits,
- required field must not be empty,
- checkbox value must be allowed,
- etc.

We could add methods like `validate`, `transformModelToView`, `transformViewToModel` to [FormField] and redefine them is all its subclasses.
Another solution that Visitor pattern suggests is encapsulate these logic in separate classes, visitors :

- [VisitorInterface] a contract for all visitors, determines which form fields the visitors can process 
(`visitEmail(EmailField $emailField)`, `visitInteger(IntegerField $integerField)`, `visitCheckboxes(CheckboxesField $checkboxesField)`)
- [ValidatorVisitor] validates form fields, it sets the message in the `$error` property of form fields if its view value is not valid, 
- [ModelToViewTransformerVisitor] sets `$viewValue` of the form field by transforming `$value`,
- [ViewToModelTransformerVisitor] sets `$value` of the form field by transforming `$viewValue`.

As for form fields classes, the only addition is `accept(VisitorInterface $visitor)` method that accepts any visitor.
This method is very similar in all form fields - the visitor is requested to perform its logic.     

Visitor pattern implements so-called "double dispatch" when the actual called method depends on both the class of the form element
end the class of the visitor:

```
/**
 * @var $field FormField
 * @var $visitor VisitorInterface
 */
$field->accept($visitor);
```

Any method of any visitor can be called.

[FormField]: FormField.php
[EmailField]: FormFields/EmailField.php
[IntegerField]: FormFields/IntegerField.php
[CheckboxesField]: FormFields/CheckboxesField.php

[VisitorInterface]: VisitorInterface.php
[ValidatorVisitor]: Visitors/ValidatorVisitor.php
[ModelToViewTransformerVisitor]: Visitors/ModelToViewTransformerVisitor.php
[ViewToModelTransformerVisitor]: Visitors/ViewToModelTransformerVisitor.php
