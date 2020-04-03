Here is "Step 3":  
With the money we earned, we are able to go on with our product, so keep up the good work!

We need to keep all previous functionalities, this is mandatory for our reputation!

So we need to keep previous rules for our API:
It will take a number (positive integer) and provide:
- "Foo" if this number is multiple of 3
- "Bar" if this number is multiple of 5
- "Qix" if this number is multiple of 7

If number have several multiples, they appear in natural order (Foo, Bar, Qix).

We will return the given number as a string if there is no transformation **at all** (not in the old rules, nor in the new rules) to do.

The new rules are :
If the given number contains specific digit, we will append a word to the transformation in the order they appear in the number.
So if a number contains :
- 3, then we append "Foo"
- 5, then we append "Bar"
- 7, then we append "Qix"

So we may have multiples followed by occurrences.

Here, you have to add test for the new functionality and add some to test numbers that triggers both functionality in order to know if they work well together.
You have two main options to do that :
1. Update existing tests with cases that trigger only the multiples, and add tests that triggers only occurrences (then ones that triggers both).
2. Update existing tests to call new services or package visible's methods : one dedicated to multiples, the other to occurrences, and original service will call both of them to integrate them (without regressions, of course).

Let's go to next step, the [step 4](./step_4.md) will be something new.


