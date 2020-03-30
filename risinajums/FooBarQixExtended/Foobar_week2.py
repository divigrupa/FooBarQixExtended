class FoobarWeek2:

    def foobar(self, a):
        result = []
        if a % 3 == 0:
            result.append("Foo")
        if a % 5 == 0:
            result.append("Bar")
        if a % 7 == 0:
            result.append("Qix")
        if len(result) == 0:
            result.append(a)

        return ', '.join([str(elem) for elem in result])