class FooBarQix:

    def foobar(self, a):
        result_check = len(self.multiples(a, True) + self.occurrences(a, True)) > 0
        separator_check = (1 if len(self.multiples(a, True)) > 0 else 0) + (1 if len(self.occurrences(a, True)) > 0 else 0)
        return self.multiples(a, True) + (', ' if separator_check == 2 else '') + self.occurrences(a, True) \
               + '' if result_check else str(a)

    def multiples(self, a, both):
        result = []
        if a % 3 == 0:
            result.append("Foo")
        if a % 5 == 0:
            result.append("Bar")
        if a % 7 == 0:
            result.append("Qix")
        if len(result) == 0 and not both:
            result.append(a)

        return ', '.join([str(elem) for elem in result])

    def occurrences(self, a, both):
        result = []
        for x in range(len(str(a))):
            temp = str(a)[x]
            if temp == "3":
                result.append("Foo")
            if temp == "5":
                result.append("Bar")
            if temp == "7":
                result.append("Qix")
            if len(result) == 0 and not both:
                result.append(a)

        return ', '.join([str(elem) for elem in result])
