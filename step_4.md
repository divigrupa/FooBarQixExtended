Here is "Step 4":  
Our FooBarQix service is up and running. Based on feedback we have decided to create **new service InfQixFoo**.

So, we need to create another service InfQixFoo. FooBarQix service stays as it is, this is mandatory for our reputation!

InfQixFoo will take a number (positive integer) and provide :
- **"Inf" if this number is multiple of 8**
- "Qix" if this number is multiple of 7
- "Foo" if this number is multiple of 3

If number have several multiples, they appear in order **(Inf; Qix; Foo). We will use semicolon as separator.**

We will return the given number as a string if there is no transformation at all to do.

If the given number contains specific digit, we will append a word to the transformation in the order they appear in the number.
So if a number contains :
- 3, then we append "Foo"
- **8, then we append "Inf"**
- 7, then we append "Qix"

So we may have multiples followed by occurrences.


Let's go to [final step](./step_5.md).



