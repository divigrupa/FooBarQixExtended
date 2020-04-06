import unittest

import Foobar
import Foobar_week2
import FooBarQix
import InfQixFoo
import InfQixFooWeek5


class TestStringMethods(unittest.TestCase):

    def test_week1(self):
        print("run_week1")
        foobar = Foobar.Foobar().foobar
        self.assertEqual(foobar(15), 'Foo, Bar')
        self.assertEqual(foobar(10), 'Bar')
        self.assertEqual(foobar(9), 'Foo')
        self.assertEqual(foobar(7), '7')

    def test_week2(self):
        print("run_week2")
        foobar = Foobar_week2.FoobarWeek2().foobar
        self.assertEqual(foobar(105), 'Foo, Bar, Qix')
        self.assertEqual(foobar(21), 'Foo, Qix')
        self.assertEqual(foobar(15), 'Foo, Bar')
        self.assertEqual(foobar(10), 'Bar')
        self.assertEqual(foobar(9), 'Foo')
        self.assertEqual(foobar(7), 'Qix')
        self.assertEqual(foobar(44), '44')

    def test_week3(self):
        print("run_week3")
        foobar = FooBarQix.FooBarQix().foobar
        multiples = FooBarQix.FooBarQix().multiples
        occurrences = FooBarQix.FooBarQix().occurrences
        # multiples
        self.assertEqual(multiples(105, False), 'Foo, Bar, Qix')
        self.assertEqual(multiples(21, False), 'Foo, Qix')
        self.assertEqual(multiples(15, False), 'Foo, Bar')
        self.assertEqual(multiples(10, False), 'Bar')
        self.assertEqual(multiples(9, False), 'Foo')
        self.assertEqual(multiples(7, False), 'Qix')
        self.assertEqual(multiples(44, False), '44')
        # occurrences
        self.assertEqual(occurrences(357, False), 'Foo, Bar, Qix')
        self.assertEqual(occurrences(573, False), 'Bar, Qix, Foo')
        self.assertEqual(occurrences(37, False), 'Foo, Qix')
        self.assertEqual(occurrences(35, False), 'Foo, Bar')
        self.assertEqual(occurrences(5, False), 'Bar')
        self.assertEqual(occurrences(3, False), 'Foo')
        self.assertEqual(occurrences(77, False), 'Qix, Qix')
        self.assertEqual(occurrences(44, False), '44')
        # both
        self.assertEqual(foobar(6), 'Foo')
        self.assertEqual(foobar(13), 'Foo')
        self.assertEqual(foobar(3), 'Foo, Foo')
        self.assertEqual(foobar(33), 'Foo, Foo, Foo')
        self.assertEqual(foobar(60), 'Foo, Bar')
        self.assertEqual(foobar(21), 'Foo, Qix')
        self.assertEqual(foobar(140), 'Bar, Qix')
        self.assertEqual(foobar(37), 'Foo, Qix')
        self.assertEqual(foobar(210), 'Foo, Bar, Qix')
        self.assertEqual(foobar(3578), 'Foo, Bar, Qix')
        self.assertEqual(foobar(5378), 'Bar, Foo, Qix')
        self.assertEqual(foobar(7538), 'Qix, Bar, Foo')
        self.assertEqual(foobar(105), 'Foo, Bar, Qix, Bar')
        self.assertEqual(foobar(357), 'Foo, Qix, Foo, Bar, Qix')
        self.assertEqual(foobar(630), 'Foo, Bar, Qix, Foo')
        self.assertEqual(foobar(44), '44')

    def test_week4(self):
        print("run_week4")
        foobar = InfQixFoo.InfQixFoo().foobar
        multiples = InfQixFoo.InfQixFoo().multiples
        occurrences = InfQixFoo.InfQixFoo().occurrences
        # multiples
        self.assertEqual(multiples(3, False), 'Foo')
        self.assertEqual(multiples(8, False), 'Inf')
        self.assertEqual(multiples(7, False), 'Qix')
        self.assertEqual(multiples(24, False), 'Inf; Foo')
        self.assertEqual(multiples(21, False), 'Qix; Foo')
        self.assertEqual(multiples(56, False), 'Inf; Qix')
        self.assertEqual(multiples(168, False), 'Inf; Qix; Foo')
        self.assertEqual(multiples(44, False), '44')
        # occurrences
        self.assertEqual(occurrences(3, False), 'Foo')
        self.assertEqual(occurrences(7, False), 'Qix')
        self.assertEqual(occurrences(8, False), 'Inf')
        self.assertEqual(occurrences(387, False), 'Foo; Inf; Qix')
        self.assertEqual(occurrences(873, False), 'Inf; Qix; Foo')
        self.assertEqual(occurrences(37, False), 'Foo; Qix')
        self.assertEqual(occurrences(38, False), 'Foo; Inf')
        self.assertEqual(occurrences(77, False), 'Qix; Qix')
        self.assertEqual(occurrences(44, False), '44')
        # both
        self.assertEqual(foobar(6), 'Foo')
        self.assertEqual(foobar(13), 'Foo')
        self.assertEqual(foobar(3), 'Foo; Foo')
        self.assertEqual(foobar(33), 'Foo; Foo; Foo')
        self.assertEqual(foobar(24), 'Inf; Foo')
        self.assertEqual(foobar(21), 'Qix; Foo')
        self.assertEqual(foobar(56), 'Inf; Qix')
        self.assertEqual(foobar(37), 'Foo; Qix')
        self.assertEqual(foobar(504), 'Inf; Qix; Foo')
        self.assertEqual(foobar(3578), 'Foo; Qix; Inf')
        self.assertEqual(foobar(5378), 'Foo; Qix; Inf')
        self.assertEqual(foobar(7538), 'Qix; Foo; Inf')
        self.assertEqual(foobar(168), 'Inf; Qix; Foo; Inf')
        self.assertEqual(foobar(5376), 'Inf; Qix; Foo; Foo; Qix')
        self.assertEqual(foobar(44), '44')

    def test_week5(self):
        print("run_week5")
        foobar = InfQixFooWeek5.InfQixFooWeek5().foobar
        multiples = InfQixFooWeek5.InfQixFooWeek5().multiples
        occurrences = InfQixFooWeek5.InfQixFooWeek5().occurrences
        # multiples
        self.assertEqual(multiples(3, False), 'Foo')
        self.assertEqual(multiples(8, False), 'Inf')
        self.assertEqual(multiples(7, False), 'Qix')
        self.assertEqual(multiples(24, False), 'Inf; Foo')
        self.assertEqual(multiples(21, False), 'Qix; Foo')
        self.assertEqual(multiples(56, False), 'Inf; Qix')
        self.assertEqual(multiples(168, False), 'Inf; Qix; Foo')
        self.assertEqual(multiples(44, False), '44')
        # occurrences
        self.assertEqual(occurrences(3, False), 'Foo')
        self.assertEqual(occurrences(7, False), 'Qix')
        self.assertEqual(occurrences(8, False), 'Inf')
        self.assertEqual(occurrences(387, False), 'Foo; Inf; Qix')
        self.assertEqual(occurrences(873, False), 'Inf; Qix; Foo')
        self.assertEqual(occurrences(37, False), 'Foo; Qix')
        self.assertEqual(occurrences(38, False), 'Foo; Inf')
        self.assertEqual(occurrences(77, False), 'Qix; Qix')
        self.assertEqual(occurrences(44, False), '44')
        # both
        self.assertEqual(foobar(8), 'Inf; InfInf')
        self.assertEqual(foobar(6), 'Foo')
        self.assertEqual(foobar(13), 'Foo')
        self.assertEqual(foobar(3), 'Foo; Foo')
        self.assertEqual(foobar(33), 'Foo; Foo; Foo')
        self.assertEqual(foobar(24), 'Inf; Foo')
        self.assertEqual(foobar(21), 'Qix; Foo')
        self.assertEqual(foobar(56), 'Inf; Qix')
        self.assertEqual(foobar(37), 'Foo; Qix')
        self.assertEqual(foobar(504), 'Inf; Qix; Foo')
        self.assertEqual(foobar(3578), 'Foo; Qix; Inf')
        self.assertEqual(foobar(5378), 'Foo; Qix; Inf')
        self.assertEqual(foobar(7538), 'Qix; Foo; Inf')
        self.assertEqual(foobar(168), 'Inf; Qix; Foo; Inf')
        self.assertEqual(foobar(5376), 'Inf; Qix; Foo; Foo; Qix')
        self.assertEqual(foobar(44), '44Inf')
        self.assertEqual(foobar(22), '22')


if __name__ == '__main__':
    unittest.main()