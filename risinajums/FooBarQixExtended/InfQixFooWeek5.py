class InfQixFooWeek5:
    def foobar(self, a):
        result_check = len(self.multiples(a, True) + self.occurrences(a, True)) > 0

        separator_check = (1 if len(self.multiples(a, True)) > 0 else 0) + (
            1 if len(self.occurrences(a, True)) > 0 else 0)

        return self.multiples(a, True) + ('; ' if separator_check == 2 else '') + self.occurrences(a, True) \
               + ('' if result_check else str(a)) + self.digit_sum(a)

    def multiples(self, a, from_top):
        result = []

        if a % 8 == 0:
            result.append("Inf")
        if a % 7 == 0:
            result.append("Qix")
        if a % 3 == 0:
            result.append("Foo")
        if len(result) == 0 and not from_top:
            result.append(a)

        return '; '.join([str(elem) for elem in result])

    def occurrences(self, a, from_top):
        result = []

        for x in range(len(str(a))):
            temp = str(a)[x]
            if temp == "8":
                result.append("Inf")
            if temp == "3":
                result.append("Foo")
            if temp == "7":
                result.append("Qix")
            if len(result) == 0 and not from_top:
                result.append(a)
        return '; '.join([str(elem) for elem in result])

    def digit_sum(self, a):
        result = ''
        sum_of_digits = 0
        for x in range(len(str(a))):
            temp = str(a)[x]
            sum_of_digits = sum_of_digits + int(temp)

        if sum_of_digits % 8 == 0:
            result = "Inf"

        return result
