import unittest

import Foobar


class TestStringMethods(unittest.TestCase):

    def test_week1(self):
        print("run_week1")
        foobar = Foobar.Foobar().foobar
        self.assertEqual(foobar(15), 'Foo, Bar')
        self.assertEqual(foobar(10), 'Bar')
        self.assertEqual(foobar(9), 'Foo')
        self.assertEqual(foobar(7), '7')


if __name__ == '__main__':
    unittest.main()