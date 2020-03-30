class Foobar:

    def foobar(self, a):
        result = []
        if a % 3 == 0:
            result.append("Foo")
        if a % 5 == 0:
            result.append("Bar")
        if len(result) == 0:
            result.append(a)

        return ', '.join([str(elem) for elem in result])