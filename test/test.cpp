#include "../src/main.h"
#include <gtest/gtest.h>

TEST(FooBarServiceTest, HandlesMultiplesOf3) {
    EXPECT_EQ(fooBarService(3), "FooFoo");
    EXPECT_EQ(fooBarService(6), "Foo");
    EXPECT_EQ(fooBarService(9), "Foo");
}

TEST(FooBarServiceTest, HandlesMultiplesOf5) {
    EXPECT_EQ(fooBarService(5), "BarBar");
    EXPECT_EQ(fooBarService(10), "Bar");
    EXPECT_EQ(fooBarService(20), "Bar");
}

TEST(FooBarServiceTest, HandlesMultiplesOf7) {
    EXPECT_EQ(fooBarService(7), "QixQix");
    EXPECT_EQ(fooBarService(14), "Qix");
    EXPECT_EQ(fooBarService(28), "Qix");
}

TEST(FooBarServiceTest, HandlesMultiplesOf3And5) {
    EXPECT_EQ(fooBarService(15), "FooBarBar");
    EXPECT_EQ(fooBarService(30), "FooBarFoo");
    EXPECT_EQ(fooBarService(45), "FooBarBar");
}

TEST(FooBarServiceTest, HandlesMultiplesOf3And7) {
    EXPECT_EQ(fooBarService(21), "FooQix");
    EXPECT_EQ(fooBarService(42), "FooQix");
    EXPECT_EQ(fooBarService(63), "FooQixFoo");
}

TEST(FooBarServiceTest, HandlesMultiplesOf5And7) {
    EXPECT_EQ(fooBarService(35), "BarQixFooBar");
    EXPECT_EQ(fooBarService(70), "BarQixQix");
    EXPECT_EQ(fooBarService(140), "BarQix");
}

TEST(FooBarServiceTest, HandlesMultiplesOf3And5And7) {
    EXPECT_EQ(fooBarService(105), "FooBarQixBar");
    EXPECT_EQ(fooBarService(210), "FooBarQix");
    EXPECT_EQ(fooBarService(315), "FooBarQixFooBar");
}

TEST(FooBarServiceTest, HandlesNumbersWithOnlyOccurrences) {
    EXPECT_EQ(fooBarService(53), "BarFoo");
    EXPECT_EQ(fooBarService(37), "FooQix");
    EXPECT_EQ(fooBarService(57), "FooBarQix");
}

TEST(FooBarServiceTest, HandlesNumbersThatAreNotMultiplesOrContainSpecialDigits) {
    EXPECT_EQ(fooBarService(1), "1");
    EXPECT_EQ(fooBarService(4), "4");
    EXPECT_EQ(fooBarService(11), "11");
}
